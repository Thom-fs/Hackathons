<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Lien vers la table des événements "events"
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    //--- ci-dessous : la manière "belongsToMany", qui devrait simplifier la tâche et utiliser directementla table intermédiaire
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_users', 'group_id','user_id');
    }
    // INUTILE SI LE "belongsToMany" FONCITONNE ** Lien vers la table de liens entre groupes et participants "group_user"
    public function group_users(): HasMany
    {
        return $this->hasMany(GroupUser::class);
    }
}
