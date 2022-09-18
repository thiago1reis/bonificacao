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
        return $this->eloquentMovement->select(
          'id',
          'movement_type',
          'value',
          'employee_id',
          'note',
          'created_at'
          )
          ->orderBy(
            'id',
            'DESC'
          )
          ->paginate(10);
    }

    public function getTypes()
    {
      return $this->eloquentMovement->typesMovement();
    }

}