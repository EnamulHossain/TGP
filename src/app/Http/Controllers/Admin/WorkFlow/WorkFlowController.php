<?php

namespace App\Http\Controllers\Admin\WorkFlow;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Role;
use App\Models\WorkFlow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WorkFlowController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::query()->get();
        $workFlow = WorkFlow::first();
        $workFlowRoles = [];
        if (isset($workFlow)) {
            $workFlowRoles = json_decode($workFlow->roles);
        }

        return $this->view('work-flow.create', compact(
            'roles',
            'workFlow',
            'workFlowRoles'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(WorkFlow::$rules);

        $workflow = WorkFlow::first();
        if ($workflow) {
            $workflow->update(
                [
                    'work_flow' => $request->work_flow,
                    'roles' => json_encode($request->input('roles')),
                ]
            );
        } else {
            $workflow = new WorkFlow();
            $workflow->work_flow = $request->work_flow;
            $workflow->roles = json_encode($request->input('roles'));
            $workflow->save();
        }

        return Redirect::back()->with('success', 'Work follow have been saved successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
