<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function bookingUser(): HasMany {
        return $this->hasMany(BookingUser::class);
    }

    public function journey(): HasOne {
        return $this->hasOne(Journey::class);
    }

    public function model(): HasOne {
        return $this->hasOne(Model::class);
    }

    public function car(): HasOne {
        return $this->hasOne(Car::class);
    }

    public function customer(): HasOne {
        return $this->hasOne(User::class);
    }
}
