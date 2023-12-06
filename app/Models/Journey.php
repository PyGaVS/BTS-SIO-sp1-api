<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Journey extends Model
{
    use HasFactory;

    public function agencies(): HasMany
    {
        return $this->hasMany(Agency::class);
    }
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
