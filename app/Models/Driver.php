<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends User
{
    use HasFactory;

    public int $id;
    protected $hidden = [
      'agency_id'
    ];
}
