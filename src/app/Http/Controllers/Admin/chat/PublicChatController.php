<?php

namespace App\Http\Controllers\Admin\chat;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use App\Models\PublicChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicChatController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chat = PublicChat::first();
        $latestChat = PublicChat::skip(1)->take(1)->get()->first();
        return $this->view('chat.index', compact('chat','latestChat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = PublicChat::$rules;
        $messages = PublicChat::$messages;

        $this->validate($request, $rules, $messages);


        PublicChat::updateOrCreate(
            ['chat' => 'chat-snippet'],
            [
                'title' => $request->input('title'),
                'chat_script' => $request->input('chat_script')
            ],
        );
        return redirect()->back()->with('success','Created Chat Snippets successfully.');
    }

    public function store2(Request $request)
    {

        $rule = PublicChat::$rule;
        $message = PublicChat::$message;

        $this->validate($request, $rule, $message);


        PublicChat::updateOrCreate(
            ['google_analytics_chat' => 'google_analytics_snippet'],
            [
                'google_analytics_title' => $request->input('google_analytics_title'),
                'google_analytics_chat_script' => $request->input('google_analytics_chat_script')
            ],
        );
        return redirect()->back()->with('succes','Created Chat Snippets successfully.');
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
