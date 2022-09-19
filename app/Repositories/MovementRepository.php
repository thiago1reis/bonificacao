<?php

namespace App\Repositories;

use App\Models\Movement;
use App\Repositories\Abstract\BaseEloquentRepository;
use App\Repositories\Interfaces\MovementRepositoryInterface;

class MovementRepository extends BaseEloquentRepository implements MovementRepositoryInterface
{
    protected $model = Movement::class;
   
    private $eloquentMovement;
  
    public function __construct(Movement $movement)
    {
      $this->eloquentMovement = $movement;
    }

    public function getMovements()
    {
        return $this->eloquentMovement->join(
          'employee', 
          'employee.id', 
          '=', 
          'movement.employee_id'
        )
        ->select(
          'movement.id',
          'movement.movement_type',
          'movement.value',
          'movement.employee_id',
          'movement.note',
          'movement.created_at', 
          'employee.full_name',
          'employee.current_balance'
        )
        ->orderBy(
            'movement.id',
            'DESC'
        )
        ->paginate(10);
    }

    public function searchMovements($name, $date, $type)
    {
      return $this->eloquentMovement->join(
        'employee', 
        'employee.id', 
        '=', 
        'movement.employee_id')
        ->select(
          'movement.id',
          'movement.movement_type',
          'movement.value',
          'movement.employee_id',
          'movement.note',
          'movement.created_at', 
          'employee.full_name',
          'employee.current_balance'
        )
        ->where(
          'employee.full_name', 
          'LIKE', 
          "{$name}%"
        )
        ->where(
          'movement.created_at', 
          'LIKE', 
          "{$date}%"
        )
        ->where(
          'movement.movement_type', 
          'LIKE', 
          "{$type}%"
        )
        ->orderBy(
          'movement.id',
          'DESC')
        ->paginate(10);
    }

    public function getTypes()
    {
      return $this->eloquentMovement->typesMovement();
    }

    public function createMovement(array $data)
    {
      return $this->eloquentMovement->create($data);
    }

}