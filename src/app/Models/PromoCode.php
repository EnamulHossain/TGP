<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoCode extends AdminModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'promo_codes';

    protected $guarded = ['id'];
    protected $fillable=[
        'properties_names',
        'properties_general',
        'properties_sorting',
        'properties_search_engine',
        'properties_teaser',
        'properties_whats_new',
        'properties_advanced',
        'properties_options',
        'properties_custom',
        'properties_dynamic',
        'tags',
        'display_security',
        'workflow_assingments',
        'promo_code_info',
    ];
    /**
     * Validation rules for this model
     */
    public static $rules = [

        'properties_names'=> 'required',
'properties_general'=> 'required',
'properties_sorting'=> 'required',
'properties_search_engine'=> 'required',
'properties_teaser'=> 'required',
'properties_whats_new'=> 'required',
'properties_advanced'=> 'required',
'properties_options'=> 'required',
'properties_custom'=> 'required',
'properties_dynamic'=> 'required',
'tags'=> 'required',
'display_security'=> 'required',
'workflow_assingments'=> 'required',
'promo_code_info'=> 'required',
    ];

    /**
     * Get the Country
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get all the rows as an array (ready for dropdowns)
     *
     * @return array
     */
    public static function getAllLists()
    {
        return self::orderBy('name')->get()->pluck('name', 'id')->toArray();
    }
}
