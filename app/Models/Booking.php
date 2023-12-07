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

    protected $fillable = [
        'number',
        'status',
        'beginDate',
        'endDate',
        'startAgency',
        'endAgency',
        'nbPassenger',
        'car_model_id',
        'car_id',
        'customer',

    ];
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

    public function carModel(): BelongsTo {
        return $this->belongsTo(CarModel::class);
    }

    public function car(): BelongsTo {
        return $this->belongsTo(Car::class);
    }

    public function customer(): HasOne {
        return $this->hasOne(User::class);
    }
}
