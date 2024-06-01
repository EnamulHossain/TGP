<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\GrantProvider;
use App\Models\IAmAGrantProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GrantProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.i-am-a-grant-provider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(IAmAGrantProvider::$rules);

        $input = $request->all();
        $input['legal_Structure'] = $request->input('legal_Structure');
        
        // Convert all values in $input to strings
        foreach ($input as &$value) {
            if (is_array($value) || is_object($value)) {
                $value = json_encode($value);
            } else {
                $value = strval($value);
            }
        }
        
        $grantprovider = IAmAGrantProvider::create($input, IAmAGrantProvider::$Messages,IAmAGrantProvider::$rules);

        try {
            Mail::to('promeroaccounting@promero.com')->send(new GrantProvider($grantprovider));
            // $grantprovider->status = '1';
            // $grantprovider->save();
            return back()->with('success', 'Thank you for your submissions. We will be in contact with you shortly');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email.Grant Provider created successfully.');
        }
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
