<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class personne extends Model
{
    public $table = 'personnes1';

    public $fillable = [
        'nom',
        'prenom'
    ];

    protected $casts = [
        'nom' => 'string',
        'prenom' => 'string'
    ];

    public static array $rules = [
        'prenom' => 'tel integer text'
    ];

    
}
