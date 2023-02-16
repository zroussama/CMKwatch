<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;



class Connexion extends Model
{
    use HasFactory;

    protected $fillable = [
        'TYPE_HEBERGEMENT', 'PROMISE_CASE', 'STATUS', 'name','domain','port','username','password','remember_token'
    ];




    /**
    * Get the user's full name.
    *
    * @return string
    */
    public function getLink()
    {
        return "{$this->name}.{$this->domain}:{$this->port}";
    }

    public function connexions()
{
    $connexions = Connexion::get();

    foreach ($connexions as $key => $value) {
         echo $value->getLink;
    }
}

}
