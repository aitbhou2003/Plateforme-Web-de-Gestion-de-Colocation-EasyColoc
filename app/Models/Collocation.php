<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Collocation extends Model
{
    //

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function categorie(): HasMany
    {
        return $this->hasMany(Categorie::class);
    }

    public function depense(): HasMany
    {
        return $this->hasMany(Depense::class);
    }


}
