<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAcquisition extends Model
{
    use HasFactory;


    protected $table = 'type_acquisitions'; // Le nom de la table associée au modèle

    protected $fillable = ['libelle'];


    public function materiels()
    {

        return $this->hasMany(Materiel::class);
    }
    public function acquisitions()
    {

        return $this->hasMany(Acquisition::class);
    }

    public function roles()
    {
        return $this->hasMany(Role::class);
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
