<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Client
 * @mixin Builder
 */
class PricingProperty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pricing_properties';

    protected $guarded = ['id'];

    protected $fillable = ['name', 'is_active'];

    public static $rules = ['name' => 'required'];

    public static $errors = [
        'name.required' => 'Please provide a pricing plan propertty name.'
    ];
    public $timestamps = false;
}
