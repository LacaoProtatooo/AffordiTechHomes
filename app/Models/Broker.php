<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broker extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'Name',
        'Phone_number',
        'Address',
        'Sex',
        'Birthdate',
        'created_at',
        'updated_at',
    ];
}
