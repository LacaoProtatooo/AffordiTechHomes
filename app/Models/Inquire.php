<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquire extends Model
{
    use HasFactory;
    protected $table = 'inquiries';
    public $timestamps = false;
    protected $fillable = [
        'property_id',
        'customer_id',
        'broker_id',
        'agent_id',
        
    ];
}
