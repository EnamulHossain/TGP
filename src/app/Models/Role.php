<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @mixin \Eloquent
 */
class Role extends AdminModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'roles';

    protected $guarded = ['id'];

    // base user
    public static $USER = 'user'; // 1

    public static $ADMIN = 'admin'; // 2

    public static $ADMIN_NOTIFY = 'admin_notify'; // 3

    public static $DEVELOPER = 'developer'; // 4
    public static $UserAdmins = 'useradmins'; // 5
    public static $CMSAdmins = 'cmsadmins'; // 6
    public static $SmartSearchAdmins = 'smartsearchadmins'; // 7
    public static $ContentAdmins = 'contentadmins'; // 8
    public static $GrantPortalSubscribers = 'grant-portal-subscribers'; // 9
    public static $GrantPortalPaidSubscribers = 'grant-portal-paid-subscribers'; // 10
    public static $Grantors = 'grantors'; // 11

    /**
     * Validation rules for this model
     */
    static public $rules = [
        'name'    => 'required|min:3|max:191',
        'slug'    => 'required|min:1|max:191',
        'keyword' => 'required|min:3|max:191',
    ];

    public function getIconTitleAttribute()
    {
        return '<i class="fa fa-' . $this->attributes['icon'] . '"</i> ' . $this->attributes['name'];
    }

    public function getNameSlugAttribute()
    {
        return $this->attributes['name'] . ' (' . $this->attributes['slug'] . ')';
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
