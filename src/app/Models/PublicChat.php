<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicChat extends Model
{
    use HasFactory;


    protected $table = 'public_chat';

    protected $guarded = ['id'];

    protected $fillable = ['title','chat','chat_script','google_analytics_title','google_analytics_chat','google_analytics_chat_script'];

    public static $rules = [
        'title' => 'required|string|max:255',
        'chat_script' => 'required',
    ];

    public static $messages = [
        'title.required' => 'The title field is required.',
        'title.string' => 'The title field must be a string.',
        'title.max' => 'The title field may not be greater than :max characters.',
        'chat_script.required' => 'The chat script field is required.',
    ];


    
    public static $rule = [
        'google_analytics_title' => 'required|max:255',
        'google_analytics_chat' => 'required|max:255',
        'google_analytics_chat_script' => 'required',
    ];

    public static $message = [
        'google_analytics_title.required' => 'The Google Analytics Title field is required.',
        'google_analytics_title.max' => 'The Google Analytics Title may not be greater than :max characters.',
        'google_analytics_chat.required' => 'The Google Analytics Chat field is required.',
        'google_analytics_chat.max' => 'The Google Analytics Chat may not be greater than :max characters.',
        'google_analytics_chat_script.required' => 'The Google Analytics Chat Script field is required.',
    ];

    public $timestamps = false;
}
