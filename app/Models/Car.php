<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Car extends Model
{
    use HasFactory;

    public function reports(): BelongsTo
    {
        return $this->belongsTo(Report::class);
    }

    public function maintenances(): BelongsTo
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function carModels(): HasMany
    {
        return $this->hasMany(CarModel::class);
    }
}
