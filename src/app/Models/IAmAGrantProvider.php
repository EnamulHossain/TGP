<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IAmAGrantProvider extends Model
{
    use HasFactory;

    protected $table = 'i_am_a_grant_providers';

    protected $guarded = ['id'];

    protected $fillable = [
        'legal_Structure',
        'other_eligible_for_grant_provider',
        'short_description1',
        'short_description2',
        'job_title',
        'country',
        'first_name',
        'last_name',
        'addressline1',
        'addressline2',
        'city',
        'zipcode',
        'company',
        'businessphone',
        'altphone',
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
