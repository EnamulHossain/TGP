<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @mixin Builder
 */
class FundingAgency extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['name', 'is_active'];
}
