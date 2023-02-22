<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public $table = 'connections';

    public $fillable = [
                'TYPE_HEB', 'PROMISE', 'link', 'ip','ip_wan','ip_lan','port','username','password','remember_token'
    ];

    protected $casts = [
        
    ];

    public static array $rules = [
        
    ];

    
}
