<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date'];

    public function time()
    {
        return $this->hasMany(Time::class, 'appointment_id');
    }
    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
