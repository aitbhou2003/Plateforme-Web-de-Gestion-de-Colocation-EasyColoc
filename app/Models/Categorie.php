<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    //

    protected $fillable = [
        'name',
        'collocation_id'
    ];

    public function collocation(): BelongsTo
    {
        return $this->belongsTo(Collocation::class);
    }

    public function depenses(): HasMany
    {
        return $this->hasMany(Depense::class);
    }


}
