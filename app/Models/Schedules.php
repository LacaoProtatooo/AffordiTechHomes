<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedules extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $fillable = [
        'id',
        'agent_id',
        'property_id',
        'time_schedule',
        'created_at',
        'updated_at',
    ];
}
