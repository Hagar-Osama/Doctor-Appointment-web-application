<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'gender'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}
