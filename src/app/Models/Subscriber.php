<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends AdminModel
{
    use HasFactory;
    use SoftDeletes;

    protected $hidden = [
        'password',
    ];
    protected $fillable = [
        'password',
        'first_name',
        'last_name',
        'email',
        'user_id',
        'company',
        'address_line_1',
        'address_line_2',
        'city',
        'postal_code',
        'state',
        'order_key',
        'customer_id',
        'status',
        'is_active',
    ];

    public static $rules = [
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'address_line_1' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'postal_code' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'order_key' => 'required|string|max:255',
        'customer_id' => 'required|string|max:255',
        'is_active' => 'required|string|max:255',
    ];

    public static $messages = [
        'first_name.required' => 'Please enter your first name.',
        'last_name.required' => 'Please enter your last name.',
        'email.required' => 'Please enter your email address.',
        'email.email' => 'Please enter a valid email address.',
        'company.required' => 'Please enter your company name.',
        'address_line_1.required' => 'Please enter your address.',
        'city.required' => 'Please enter your city.',
        'postal_code.required' => 'Please enter your postal code.',
        'state.required' => 'Please enter your state.',
        'order_key.required' => 'Please enter your order key.',
        'customer_id.required' => 'Please enter your customer id.',
        'is_active.required' => 'Please enter your status.',
    ];
    public static function getSubscriberByUserID($user_id = "")
    {
        if ($user_id == "") {
            return null;
        }
        $subscriber = Subscriber::where('user_id', $user_id)->first();
        if ($subscriber){
            return $subscriber;
        }
        return null;
    }
}
