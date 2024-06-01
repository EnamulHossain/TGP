<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FeedbackContactUs extends Model
{
    protected $table = 'feedback_contact_us';

    protected $guarded = ['id'];

    public function getFullnameAttribute()
    {
        return $this->attributes['firstname'] . ' ' . $this->attributes['lastname'];
    }

    /**
     * Validation custom messages for this model
     */
    static public $rules = [
        'firstname' => 'required|min:2|max:191',
        'lastname'  => 'required|min:2|max:191',
        'email'     => 'required|min:2|max:191|email',
        'content'   => 'required|min:2|max:1000',
        'phone'     => 'nullable|max:20',
    ];


    static public $messages = [
        'firstname.required' => 'The first name field is required.',
        'firstname.min' => 'The first name must be at least :min characters.',
        'firstname.max' => 'The first name may not be greater than :max characters.',
        'lastname.required' => 'The last name field is required.',
        'lastname.min' => 'The last name must be at least :min characters.',
        'lastname.max' => 'The last name may not be greater than :max characters.',
        'email.required' => 'The email field is required.',
        'email.min' => 'The email must be at least :min characters.',
        'email.max' => 'The email may not be greater than :max characters.',
        'email.email' => 'The email must be a valid email address.',
        'content.required' => 'The message field is required.',
        'content.min' => 'The message must be at least :min characters.',
        'content.max' => 'The message may not be greater than :max characters.',
        'phone.max' => 'The phone may not be greater than :max characters.',
        ];
    /**
     * Get the parent contactable model (pages or articles).
     */
    public function contactable()
    {
        return $this->morphTo();
    }
}
