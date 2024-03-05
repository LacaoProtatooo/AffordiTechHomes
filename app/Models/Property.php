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
        'agent_id',
        'price',
        'address',
        'property_type',
        'description',
        'rooms',
        'sqm',
        'cr',
        'parking',
        'status',
        'image_path', 
    ];
}
