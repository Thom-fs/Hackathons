<?php

namespace App\Models;

use App\Http\Controllers\AbilitiesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EventUserController;
use App\Http\Controllers\GroupUserController;
use App\Http\Controllers\ProfilController;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lastname',
        'firstname',
        'email',
        'password',
        'linkedIn',
        'website',
        'github',
        'portfolio',
        'bio',
        'password',
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
    ];



    // Lien vers la table des compétences utilisateur "abilities"
    public function abilities(): HasOne
    {
        return $this->hasOne(Abilities::class);
    }

    // Lien vers la table des rôles "roles"
    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }

    // Lien vers la table de liens entre événements et participants "event_user"
    public function event_users(): HasMany
    {
        return $this->hasMany(EventUser::class);
    }

    // Lien vers la table de liens entre groupes et participants "group_user"
    public function group_users(): HasMany
    {
        return $this->hasMany(GroupUser::class);
    }

    // Test relation Adrien entre User et Profil pour afficher les donées d'un profil
    public function Profil()
    {
        return $this->belongsTo(Profil::class, 'user_id', 'id');
    }
}
