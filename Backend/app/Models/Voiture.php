<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    public $table = 'voitures';

    public $fillable = [
        'name',
        'address',
        'email',
        'password',
        'created_by'
    ];

    protected $casts = [
        'name' => 'string',
        'address' => 'string',
        'phone' => 'string',
        'email' => 'string',
        'password' => 'string',
        'created_by' => 'string'
    ];

    public static array $rules = [
        'name' => 'required',
        'email' => 'required|unique:Voitures',
        'password' => 'required'
    ];

    
}
