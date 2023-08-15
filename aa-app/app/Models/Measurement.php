<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'customer_id',
        'height', 
        'weight', 
        'bust', 
        'waist', 
        'hips', 
        'back_waist_length', 
        'front_waist_length', 
        'shoulder_to_shoulder',
        'chest_depth',
        'armhole_depth',
        'inseam',
        'crotch_depth',
        'neck_circumference',
        'sleeve_length',
        'bicep_circumference',
        'forearm_circumference',
        'thigh_circumference',
        'knee_circumference',
        'calf_circumference',
        'ankle_circumference',
    ];

    /**
     * Get the customer that owns the measurement.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
