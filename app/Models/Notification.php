<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable =["structures_id","message","link"];


    
   // Relations
    public function type_acquisitions()
    {
        return $this->belongsTo(TypeAcquisition::class);

    }
    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }
}
