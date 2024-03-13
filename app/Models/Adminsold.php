<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminsold extends Model
{
    use HasFactory;
    protected $table = 'admin_has_sold';
    protected $fillable = [
        'admin_id',
        'solds_id', 
        'created_at',
        'updated_at',
    ];
}
