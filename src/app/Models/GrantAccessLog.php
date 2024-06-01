<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrantAccessLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'grant_access_logs';

    protected $fillable = [
        'id',
        'user_id',
        'grant_id',
        'visited_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grant()
    {
        return $this->belongsTo(Grant::class);
    }

}
