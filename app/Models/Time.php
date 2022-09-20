<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = ['appointment_id', 'time', 'status'];

    public function appointments()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

}
