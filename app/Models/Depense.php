<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Depense extends Model
{
    //

     protected $fillable = [
        'titre',
        'description',
        'prix',
        'categorie_id',
        'collocation_id'
    ];

    public function categorie(): BelongsTo
    {
        return $this->belongsTo(Categorie::class);
    }

    public function collocation(): BelongsTo
    {
        return $this->belongsTo(Collocation::class);
    }

    public function payments(): HasMany 
    {
        return $this->hasMany(Payment::class);
    }

}
