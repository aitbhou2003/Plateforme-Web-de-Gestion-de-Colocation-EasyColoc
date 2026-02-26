<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collocation extends Model
{
    //
    protected $fillable = [
        'status',
        'description',
        'titre'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
        ->withTimestamps()
        ->withPivot(['is_owner', 'status']);
    }

    public function categories(): HasMany
    {
        return $this->hasMany(Categorie::class);
    }

    public function owner(){
        return $this->users()->wherePivot('is_owner',true)->first();
    }

    public function depenses(): HasMany
    {
        return $this->hasMany(Depense::class);
    }


}
