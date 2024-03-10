<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $table = 'properties';
    protected $fillable = [
        'id',
        'admin_id',
        'developer',
        'price',
        'address',
        'property_type',
        'block',
        'unit',
        'description',
        'rooms',
        'sqm',
        'cr',
        'status',
        'image_path', 
    ];
}
