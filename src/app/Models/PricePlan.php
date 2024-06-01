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
class PricePlan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'price_plans';

    protected $guarded = ['id'];

    protected $fillable = [
        'plan_name',
        'sku',
        'period',
        'plan_slug',
        'plan_description',
        'plan_properties',
        'is_free',
        'plan_price',
        'plan_tag',
        'save_price',
        'order',
    ];
    /**
     * Validation rules for this model
     */
    public static $rules = [

        'plan_name' => 'required',
        'sku' => 'required',
        'plan_slug' => 'required',
        'order' => 'required',
        'plan_tag' => 'required',
        // 'plan_properties' => 'required',
    ];

    public static $message = [
        'plan_name.required' => 'Please provide a name for the plan',
        'sku.required' => 'Please provide a SKU for the plan',
        'plan_slug.required' => 'Please provide a slug for the plan',
        'order.required' => 'Please provide an order for the plan',
        'plan_tag.required' => 'Please provide a tag for the plan',
    ];
    

    protected $casts = [
        'plan_properties' => 'array',
    ];

        /**
     * Get all the rows as an array (ready for dropdowns)
     *
     * @return array
     */
    public static function getAllLists()
    {
        return self::orderBy('plan_name')->get()->pluck('plan_name', 'id')->toArray();
    }
}
