<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends AdminModel
{
    use HasFactory, SoftDeletes;
    protected $appends = ['fullname'];

    const COUNTRY_MAP = [
        1 => 'Canada',
        2 => 'Israel',
        3 => 'United States',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'user_id',
        'site_id',
        'company',
        'job_title',
        'country',
        'state',
        'subscription_level_id',
        'address_line_1',
        'address_line_2',
        'city',
        'is_active',
        'created_by',
        'updated_by',
        'postal_code'
    ];

    protected $hidden = [];

    protected $casts = [];

    static public $messages = [];


    static public $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'country' => 'required',
        'state'  => 'required',
        'address_line_1'  => 'required',
        'postal_code'  => 'required',
        'city'  => 'required',
    ];

    public static $message = [
        'country.required' => 'Country field is required',
        'state.required' => 'State field is required',
        'address_line_1.required' => 'Address Line 1 field is required',
        'postal_code.required' => 'Postal Code field is required',
        'city.required' => 'City field is required',
    ];

    static public $rulesClient = [
        'first_name' => ['required', 'string', 'max:191'],
        'last_name'  => ['required', 'string', 'max:191'],
    ];

    static public $rulesProfile = [
        'first_name' => 'required',
        'last_name'  => 'required',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }


    public function interests()
    {
        return $this->belongsToMany(Interest::class, 'profile_interest_map', 'profile_id', 'interest_id')->withTimestamps();
    }

    public function states()
    {
        return $this->belongsToMany(Province::class, 'profile_locations_map', 'profile_id', 'province_id')->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(Province::class);
    }
    public static function getProfileByUserID($user_id = "")
    {
        if ($user_id == "") {
            return null;
        }
        $profile = Profile::where('user_id', $user_id)->first();
        if ($profile) {
            return $profile;
        }
        return null;
    }
}
