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
        'description',
        'rooms',
        'sqm',
        'cr',
        'block',
        'unit',
        'status',
        'image_path', 
    ];

    public function propertyBrokers()
    {
        return $this->hasMany(PropertyBroker::class, 'property_id');
    }
}
