<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Client
 * @mixin Builder
 */
class Site extends AdminModel
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    protected $fillable = ['name', 'slug', 'is_active'];
}
