<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookingUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'booking_id'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function Booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }
}
