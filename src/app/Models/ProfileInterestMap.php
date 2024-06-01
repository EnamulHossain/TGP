<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @mixin Builder
 */
class ProfileInterestMap extends AdminModel
{
    use HasFactory;

    protected $table = 'profile_interest_map';

    protected $guarded = ['id'];

    protected $fillable = ['profile_id', 'interest_id'];
}
