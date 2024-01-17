<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Affectation extends Model
{
    use HasFactory, Notifiable;

    // app/Models/Affectation.php
    protected $fillable = ['reference', 'quantite_affecte', 'description', 'structures_id'];

    public function materiels()
    {
        return $this->belongsTo(Materiel::class);
    }

    public function structures()
    {
        return $this->belongsTo(Structure::class);
    }


    public function roles()
    {
        return $this->belongsTo(Role::class);
    }


    public function users()
    {
        return $this->belongsTo(User::class);
    }
}


