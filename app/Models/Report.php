<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    use HasFactory;

    public function damages(): BelongsTo
    {
        return $this->belongsTo(Damage::class);
    }

    public function car(): HasMany // Penser à changer ça

    {
        return $this->hasMany(Car::class);
    }
}
