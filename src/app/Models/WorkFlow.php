<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkFlow extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'work_flow',
        'roles',
    ];

    public static $rules = [
        'work_flow' => 'required',
        'roles' => 'required',
    ];

    public static $Messages = [
        'work_flow.required' => 'Please select at least one work flow.',
        'roles.required' => 'Please select roles.',
    ];

    public $timestamps = false;
}
