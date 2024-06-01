<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Mail\GrantWriter as MailGrantWriter;
use App\Mail\IAmAGrantWriter;
use App\Models\GrantWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GrantWriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website.i-am-a-grant-writer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.i-am-a-grant-writer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(GrantWriter::$rules);

        $input = $request->all();
        $grantwriter = GrantWriter::create($input,GrantWriter::$Messages);
        try {
            Mail::to('promeroaccounting@promero.com')->send(new IAmAGrantWriter($grantwriter));
            // $grantwriter->status = '1';
            // $grantwriter->save();
            return back()->with('success', 'Thank you for your submissions. We will be in contact with you shortly');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to send email.Grant Writer created successfully.');
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
