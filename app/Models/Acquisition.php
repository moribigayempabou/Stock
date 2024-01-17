<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acquisition extends Model
{
    use HasFactory;

    protected $fillable  = ['type_acquisitions_id','source','description'];

     // Relations
    public function type_acquisitions()
    {
        return $this->belongsTo(TypeAcquisition::class);
    }
    public function materiels()
    {
        return $this->hasMany(Materiel::class, 'acquisitions_id');
    }



}

