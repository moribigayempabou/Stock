<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;
    protected $fillable = ['nom'];
    public function users()
    {
        return $this->hasMany(User::class); // Relation One-to-Many
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class); // Relation One-to-Many
    }

    public function demandes()
    {
        return $this->hasMany(demande::class); // Relation One-to-Many
    }
}
