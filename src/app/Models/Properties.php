<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Properties extends AdminModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'properties';

    protected $guarded = ['id'];

    protected $fillable=[
        'type',
        'display_name',
        'column_name',
        'is_active',
    ];
    /**
     * Validation rules for this model
     */
    public static $rules = [
        'type'=> 'required|min:3|max:191',
        'display_name'=> 'required|min:3|max:191',
        'column_name'=> 'required|min:3|max:191',
    ];
}
