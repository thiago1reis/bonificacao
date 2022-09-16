<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $table = 'movement';
    
    protected $fillable = [
      'movement_type',
      'value',
      'note',
      'employee_id',
      'administrator_id',
    ];
}
