<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Client
 * @mixin Builder
 */
class Interest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['title', 'slug', 'is_active'];
}
