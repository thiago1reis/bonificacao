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

    
    public static function typesMovement()
    {
      return collect([
        'income' => 'Income',
        'expense' => 'Expense',
      ]);
    }

    public function employee()
    {
      return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}
