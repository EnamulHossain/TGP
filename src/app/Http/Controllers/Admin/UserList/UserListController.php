<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Exports\GrantsExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Admin\AdminController;
use App\Mail\UpdatePasswordNotification;
use App\Mail\WelcomeEmail;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserListController extends AdminController
{

   public function index(Request $request)
   {
      $search = $request->input('search');
      $sortBy = $request->input('sort_by', 'id');
      $sortDirection = $request->input('sort_direction', 'asc');

      $total = User::count();
      $users = User::with('roles')
         ->where(function ($query) use ($search) {
            $query->where('firstname', 'like', "%$search%")
               ->orWhere('lastname', 'like', "%$search%")
               ->orWhere('email', 'like', "%$search%");
         })
         ->orderBy($sortBy, $sortDirection)
         ->paginate(10);

      $roles = Role::all();

      return $this->view('user-list.index', compact('users', 'roles', 'search', 'sortBy', 'sortDirection','total'));
   }



   public function show(User $user)
   {
      return $this->view('user-list.show')->with('item', $user);
   }

   public function edit(User $user)
   {
      $roles = Role::query()->get();
      $currentRole = $user->roles;
      return $this->view('user-list.edit', [
         'user' => $user,
         'roles' => $roles,
         'currentRole' => $currentRole,
      ]);
   }

   public function editPassword(User $user)
   {
      return $this->view('user-list.edit-password', [
         'user' => $user,
      ]);
   }
   public function resendVerification(User $user)
   {
      Mail::to($user->email)->send(new WelcomeEmail($user));
      return redirect()->back();
   }


   public function update(User $user, Request $request)
   {
      $request->validate([
         'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
      ]);

      $user->firstname = $request->input('firstname');
      $user->lastname = $request->input('lastname');
      $user->email = $request->input('email');
      $user->is_mfa_verified = $request->input('is_mfa_verified');
      if ($request->input('is_mfa_verified') == 1) {
         $user->email_verified_at = Carbon::now();
      } else {
            $user->email_verified_at = null;
      }
      $user->save();

      $roles = Role::query()->get();
      foreach ($roles as $role) {
         $user->roles()->detach([$role->id]);
      }

      $roleList = $request->input('roles');
      foreach ($roleList as $role) {
         $user->roles()->attach($role);
      }

      return redirect()->route('users.index')->with('success', 'User updated successfully.');
   }


   public function updatePassword(User $user, Request $request)
   {
      $request->validate([
         'password' => 'required|min:8',
      ]);
      $password = $request->password;
      if ($request->has('checkbox')) {
         Mail::to($user->email)->send(new UpdatePasswordNotification($user, $password));

      }
      $user->update([
         'password' => Hash::make($request->password),
      ]);
      return redirect()->route('users.index')->with('success', 'User Password updated successfully.');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param price_plans  $promo_codes
    * @param Request $request
    * @return Response
    */
    public function destroy(User $user, Request $request)
    {
        if ($user->forceDelete()) {
            notify()->success('Successfully', 'The ' . $user->name . ' has been permanently removed');
        } else {
            notify()->error('Oops', 'We could not find the ' . $user->name . ' to delete');
        }
        return back()->with('success', 'User deleted successfully.');
    }    


   public function export(Request $request)
   {
      $search = $request->input('search');
      return Excel::download(new UsersExport($search), 'user.xlsx');
   }
}
