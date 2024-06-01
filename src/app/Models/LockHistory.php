<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LockHistory extends Model
{
    use HasFactory;

    protected $fillable = ['page_url', 'user_id', 'is_locked', 'expires_at'];
}
