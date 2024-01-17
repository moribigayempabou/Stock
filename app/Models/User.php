<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes th at are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'prenom',
        'adresse',
        'telephone',
        'email',
        'password',
        'structures_id',
        'roles_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function structures()
    {
        return $this->belongsTo(Structure::class); // Relation Many-to-One
    }
    // Dans le modèle User
    public function demandesEmises()
    {
        return $this->hasMany(Demande::class, 'emetteur_id');
    }


    public function roles()
    {
        return $this->belongsTo(Role::class); // Relation Many-to-One
    }

    /*public function roles()
{
    return $this->belongsToMany(Role::class);
}*/



}
