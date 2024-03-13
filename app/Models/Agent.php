<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $table = 'agents';
    protected $fillable = [
        'id',
        'user_id',
        'broker_id',
        'name',
        'phone_number',
        'address',
        'sex',
        'birthdate',
        'created_at',
        'updated_at',
    ];
}
