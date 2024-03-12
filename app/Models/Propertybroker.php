<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propertybroker extends Model
{
    use HasFactory;
    protected $table = 'property_has_broker';
    protected $fillable = [
        'property_id',
        'broker_id', 
        'created_at',
        'updated_at',
    ];
}
