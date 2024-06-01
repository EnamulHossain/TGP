<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ExtraValues extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'extra_values';

    protected $guarded = ['id'];

}
