<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    //
     protected $fillable = [
        'montant',
        'status',
        'depense_id',
        'user_id'
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function depense(): BelongsTo
    {
        return $this->belongsTo(Depense::class);
    }


}
