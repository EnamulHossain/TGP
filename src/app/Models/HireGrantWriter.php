<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HireGrantWriter extends Model
{
    use HasFactory;

    protected $table = 'hire_grant_writers';

    protected $guarded = ['id'];

    protected $fillable = [
        'have_grant_application',
        'purpose',
        'need_grant_writer',
        'cms_forms_when_begin_work',
        'describe',
        'additional_details',
        'choose_date',
        'cms_forms_first_time_applying_for_funds',
        'cms_forms_previously_received',
        'cms_forms_copy_previous_application',
        'cms_forms_agency_mission',
        'cms_forms_fundraising_packet',
        'legal_Structure',
        'other',
        'description',
        'generate_revenue',
        'company_existence_year',
        'company_existence_month',
        'geographic_areas',
        'additional_details_for_apply',
        'describe_your_grant_history',
        'details_previous_grant_application',
        'fundraising_details',
        'details_missing_statement',
        'job_title',
        'country',
        'first_name',
        'last_name',
        'address_line1',
        'address_line2',
        'city',
        'state',
        'zipcode',
        'company',
        'business_phone',
        'alt_phone',
        'website',
        'email',
    ];
    public static $rules = [
        'job_title' => 'required',
        'email' => 'required|email',
    ];
    
    public static $Messages = [
        'job_title.required' => 'Please provide your job title.',
        'email.required' => 'Please provide your email address.',
        'email.email' => 'Please provide a valid email address.',
    ];
    public $timestamps = false;



    public function setlegal_Structure($value)
    {
        $this->attributes['legal_Structure'] = json_encode($value);
    }

    public function getlegal_Structure($value)
    {
        return $this->attributes['legal_Structure'] = json_decode($value);
    }


}
