<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $table = 'visits';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'schedule',
        'convoy_type',
        'agent_id',
        'customer_id',
        'property_id',
        'approval_status',
    ];
}
