<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Categorie extends Model
{
    //

    public function collocation(): BelongsTo
    {
        return $this->belongsTo(Collocation::class);
    }

    public function depense(): BelongsTo
    {
        return $this->belongsTo(Depense::class);
    }


}
