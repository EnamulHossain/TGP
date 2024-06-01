<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ShippingAddress
 * @mixin \Eloquent
 */
class Subscription extends AdminModel
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = [
        'site_id',
        'type',
        'status',
        'user_name',
        'order_number',
        'subtotal',
        'tax',
        'shipping',
        'service_fee',
        'discount',
        'discount_code',
        'total',
        'provider_customer_id',
        'transaction_id',
        'expired_at',
    ];

    public static $rules = [
        'user_name' => 'required|string',
        'order_number' => 'required|string|unique:your_table_name_here',
        'subtotal' => 'required|numeric',
        // 'tax' => 'required|numeric',
        'shipping' => 'required|numeric',
      ];
      
      public static $messages = [
        'user_name.required' => 'The user name field is required.',
        'order_number.required' => 'The order number field is required.',
        'order_number.unique' => 'The order number must be unique.',
        'subtotal.required' => 'The subtotal field is required.',
        'subtotal.numeric' => 'The subtotal field must be a number.',
        // 'tax.required' => 'The tax field is required.',
        // 'tax.numeric' => 'The tax field must be a number.',
        'shipping.required' => 'The shipping field is required.',
      ];
      
}