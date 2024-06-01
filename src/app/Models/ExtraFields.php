<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ExtraFields extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'extra_fields';

    protected $guarded = ['id'];

}
