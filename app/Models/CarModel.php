<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CarModel extends Model
{
    use HasFactory;

    public function cars(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    public function bookings(): HasMany {
        return $this->hasMany(Booking::class);
    }
}
