<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Demande extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['emetteur_id', 'destinataire_id', 'message', 'demande_statut_id'];

    public function emetteur()
    {
        return $this->belongsTo(User::class, 'emetteur_id');
    }

    public function destinataire()
    {
        return $this->belongsTo(User::class, 'destinataire_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($demande) {
            $demande->emetteur_id = auth()->id(); // Utilise l'ID de l'utilisateur actuellement authentifié
        });
    }
    public function roles()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    public function structures()
    {
        return $this->belongsTo(Structure::class, 'structures_id');
    }

    public function type_acquisitions()
    {
        return $this->belongsTo(TypeAcquisition::class, 'type_acquisitions_id');
    }
}
