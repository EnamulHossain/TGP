<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwoFactor extends Model
{
    use HasFactory;

    protected $table = 'user_codes';

    protected $guarded = ['id'];

    protected $fillable = [
        'code',
    ];
}
