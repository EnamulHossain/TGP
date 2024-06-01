<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @mixin Builder
 */
class GrantInfoLocationMap extends AdminModel
{
    use HasFactory;

    protected $table = 'grants_info_locations_map';

    protected $guarded = ['id'];

    protected $fillable = ['grant_info_id', 'province_id'];
}
