<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address'
    ];

    // One-to-many relationship with Design
    public function designs()
    {
        return $this->hasMany(Design::class);
    }

    // One-to-one relationship with Measurement
    public function measurement()
    {
        return $this->hasOne(Measurement::class);
    }
}

