<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_path', 'description', 'customer_id'
    ];

    // Many-to-one relationship with Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
