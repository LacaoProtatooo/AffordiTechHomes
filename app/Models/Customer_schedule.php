<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_schedule extends Model
{
    use HasFactory;
    protected $table = 'customer_schedules';
    protected $fillable = [
        'customer_id',
        'schedule_id',
        'created_at',
        'updated_at',
    ];
}
