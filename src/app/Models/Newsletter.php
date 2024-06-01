<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = [
        'grant_id',
        'opportunity_name',
        'last_changed',
        'member_id',
        'first_name',
        'last_name',
        'email_address',
        'paid_subscriber',
        'page_url',
        'opportunity_teaser',
        'grant_funding_amount',
        'deadline',
        'snog',
        'snof',
        'created_at',
        'updated_at',
    ];
}
