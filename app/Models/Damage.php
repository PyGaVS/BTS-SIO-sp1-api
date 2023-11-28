<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Damage extends Model
{
    use HasFactory;

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }
}
