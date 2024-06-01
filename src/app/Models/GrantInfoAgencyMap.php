<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @mixin Builder
 */
class GrantInfoAgencyMap extends AdminModel
{
    use HasFactory;

    protected $table = 'grants_info_agency_map';

    protected $guarded = ['id'];

    protected $fillable = ['grant_info_id', 'agency_id'];
}
