<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @mixin Builder
 */
class ProfileLocationMap extends AdminModel
{
    use HasFactory;

    protected $table = 'profile_locations_map';

    protected $guarded = ['id'];

    protected $fillable = ['province_id', 'profile_id'];
}
