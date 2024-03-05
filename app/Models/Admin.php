<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'name',
        'phone_number',
        'address',
        'sex',
        'birthdate',
        'created_at',
        'updated_at',
    ];
}
