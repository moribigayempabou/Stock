<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;
    /* const ADMIN = 'Admin'; // Assurez-vous que les valeurs correspondent à celles dans votre base de données
     const DAF = 'DAF'; // Assurez-vous que les valeurs correspondent à celles dans votre base de données
     const CSAF = 'CSAF'; // Assurez-vous que les valeurs correspondent à celles dans votre base de données
 */
    protected $fillable = ['type_utilisateur '];

    public function users()
    {
        return $this->hasMany(User::class);

    }
    /* public function users()
     {
         return $this->belongsToMany(User::class);
     }*/
    public function affectations()
    {
        return $this->hasMany(Affectation::class);

    }
    public function demandes()
    {
        return $this->hasMany(Demande::class);

    }


    public function structures()
    {
        return $this->hasMany(Structure::class);
    }

}
