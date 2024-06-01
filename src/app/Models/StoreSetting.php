<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class StoreSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'store_settings';

    protected $guarded = ['id'];


    protected $fillable = [
        'store_name',
        'store_url',
        'app_name',
        'token',
        'private_key',
        'public_key',
        'host',
        'is_active',
    ];

    public static $rules = [
        'store_name' => 'required|string|max:255',
        'store_url' => 'required|url|max:255',
        'app_name' => 'required|string|max:255',
        'token' => 'required|string|max:255',
        'private_key' => 'required|string',
        'public_key' => 'required|string',
        'host' => 'required|string|max:255',
    ];

    public static $messages = [
        'store_name.required' => 'The store name field is required',
        'store_name.max' => 'The store name may not be greater than :max characters',
        'store_url.required' => 'The store URL field is required',
        'store_url.url' => 'The store URL must be a valid URL',
        'store_url.max' => 'The store URL may not be greater than :max characters',
        'app_name.required' => 'The app name field is required',
        'app_name.max' => 'The app name may not be greater than :max characters',
        'token.required' => 'The token field is required',
        'token.max' => 'The token may not be greater than :max characters',
        'private_key.required' => 'The private key field is required',
        'public_key.required' => 'The public key field is required',
        'host.required' => 'The host field is required',
        'host.max' => 'The host may not be greater than :max characters',
    ];



}
