<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes; use Illuminate\Database\Eloquent\Factories\HasFactory;
class Avion extends Model
{
     use SoftDeletes;    use HasFactory;    public $table = 'avions';

    protected $dates = ['Effacer'];

    const CREATED_AT = 'Ajouter';

    const UPDATED_AT = 'Modifier';

    public $fillable = [
        'nom',
        'taille',
        'places',
        'ficheClient'
    ];

    protected $casts = [
        'nom' => 'string',
        'taille' => 'integer',
        'places' => 'integer',
        'ficheClient' => 'string'
    ];

    public static array $rules = [
        
    ];

    
}
