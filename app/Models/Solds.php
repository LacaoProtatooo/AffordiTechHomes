<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solds extends Model
{
    use HasFactory;
    protected $table = 'solds';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'customer_id',
        'property_id',
        'payment_method',
        'proof_payment',
         
    ];
}
