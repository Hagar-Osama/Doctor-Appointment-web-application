<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'doctor_id', 'checkedUp', 'time', 'date'];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
