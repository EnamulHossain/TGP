<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Client
 * @mixin Builder
 */
class GrantsInfoFavorite extends Model
{
    use HasFactory;

    protected $table = 'grants_info_favorite';

    protected $guarded = ['id'];

    protected $fillable = ['grants_info_id', 'user_id', 'invoked'];
}
