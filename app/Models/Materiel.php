<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
protected $fillable =["nom","type_materiel","description","quantite","quantite_reste","etat","source","acquisitions_id"];

   // Relations
    public function type_acquisitions()
    {
        return $this->belongsTo(TypeAcquisition::class);

    }
    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function acquisitions()
    {
        return $this->belongsTo(Acquisition::class);
    }
// Mutateur pour la colonne "quantite"
public function setQuantiteAttribute($value)
{
    $this->attributes['quantite'] = $value;
    $this->attributes['quantite_reste'] = $value;
}
}


