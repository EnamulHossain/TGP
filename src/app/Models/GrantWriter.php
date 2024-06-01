<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrantWriter extends Model
{
    use HasFactory;

    protected $table = 'grant_writers';

    protected $guarded = ['id'];

    protected $fillable = [
        'job_title',
        'country',
        'first_name',
        'last_name',
        'addressline1',
        'addressline2',
        'city',
        'state',
        'company',
        'businessphone',
        'altphone',
        'zipcode',
        'email',
        'website',

        'expertise_area1',
        'experience_year1',
        'describe_experience1',
        'expertise_area2',
        'experience_year2',
        'describe_experience2',
        'expertise_area3',
        'experience_year3',
        'describe_experience3',

        'grant1_awarded_grant',
        'grant1_awarded_amount',
        'grant1_funding_source',
        'grant1_writing_sample',

        'grant2_awarded_grant',
        'grant2_awarded_amount',
        'grant2_funding_source',
        'grant2_writing_sample',

        'grant3_awarded_grant',
        'grant3_awarded_amount',
        'grant3_funding_source',
        'grant3_writing_sample',

        'grant4_awarded_grant',
        'grant4_awarded_amount',
        'grant4_funding_source',

        'grant5_awarded_grant',
        'grant5_awarded_amount',
        'grant5_funding_source',

        'ref_job_title',
        'ref_organization',
        'ref_first_name',
        'ref_last_name',
        'ref_phone_or_email',
        'ref_capacity',

        'ref2_job_title',
        'ref2_organization',
        'ref2_first_name',
        'ref2_last_name',
        'ref2_phone_or_email',
        'ref2_capacity',

        'ref3_job_title',
        'ref3_organization',
        'ref3_first_name',
        'ref3_last_name',
        'ref3_phone_or_email',
        'ref3_capacity',
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
}
