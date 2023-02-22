<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class costumer extends Model
{
    public $table = 'costumers';

    public $fillable = [
        'name',
        'email',
        'phone'
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'phone' => 'integer'
    ];

    public static array $rules = [
       // 'email' => 'required|unique'
    ];

    
}
