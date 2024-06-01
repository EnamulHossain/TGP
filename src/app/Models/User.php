<?php

namespace App\Models;

use App\Models\ShippingAddress;
use App\Models\Traits\UserAdmin;
use App\Models\Traits\UserRoles;
use App\Models\Traits\UserHelper;
use App\Models\UserRoles as ModelsUserRoles;
use Google\Service\Dfareporting\UserRole;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, UserHelper, UserRoles, UserAdmin;

    protected $appends = ['fullname'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'store_hash',
        'firstname',
        'lastname',
        'gender',
        'cellphone',
        'image',
        'born_at',
        'logged_in_as',
        'security_level',
        'session_token',
        'logged_in_at',
        'is_mfa_verified',
        'disabled_at',
        'email_verification_token',
        'profile_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'deleted_by',
        'deleted_at',
        'logged_in_at',
        'disabled_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'deleted_at'        => 'datetime',
        'logged_in_at'      => 'datetime',
        'activated_at'      => 'datetime',
    ];

    static public $messages = [];

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'firstname' => ['required', 'string', 'max:191'],
        'lastname'  => ['required', 'string', 'max:191'],
        //'gender'    => 'required|in:male,female',
        'cellphone' => ['nullable', 'string', 'max:191'],
        'email'     => ['required', 'string', 'email', 'max:191', 'unique:users'],
        'password'  => ['required', 'string', 'min:4', 'confirmed'],
        //'token'     => 'required|exists:user_invites,token',
        //'photo'     => 'required|max:6000|mimes:jpg,jpeg,png,bmp',
    ];

    /**
     * Validation rules for this model
     */
    static public $rulesClient = [
        'firstname' => ['required', 'string', 'max:191'],
        'lastname'  => ['required', 'string', 'max:191'],
        //'gender'    => 'required|in:male,female',
        'cellphone' => ['nullable', 'string', 'max:191'],
        'email'     => ['required', 'string', 'email', 'max:191', 'unique:users'],
        'password'  => ['required', 'string', 'min:4', 'confirmed'],
        'roles'     => ['required', 'array'],
    ];

    /**
     * Validation rules for this model
     */
    static public $rulesProfile = [
        'firstname' => 'required',
        'lastname'  => 'required',
        'gender'    => 'required|in:male,female',
        'telephone' => 'nullable|min:9',
        'password'  => 'nullable|min:4|confirmed',
        'photo'     => 'required|max:6000|mimes:jpg,jpeg,png,bmp',
    ];

    /**
     * Get the shippingAddress
     */
    public function shippingAddress()
    {
        return $this->hasOne(ShippingAddress::class, 'user_id', 'id')->whereNull('transaction_id');
    }

    /**
     * Get the shippingAddress
     */
    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }
    /**
     * Get the getUserIdByEmail
     */
    public static function getUserIdByEmail($email = "")
    {
        if ($email == "") {
            return 0;
        }
        $user = User::select('id')->where('email', $email)->first();
        if ($user){
            return $user->id;
        }
        return 0;
    }
    /**
     * Get the getUsrsByEmail
     */
    public static function getUsrsByEmail($email = "")
    {
        if ($email == "") {
            return null;
        }
        $user = User::where('email', $email)->first();
        if ($user){
            return $user;
        }
        return null;
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
