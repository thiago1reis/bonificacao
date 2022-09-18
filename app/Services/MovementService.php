<?php

namespace App\Services;

use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\MovementRepositoryInterface;

class MovementService
{
    protected $movementRepository;
    protected $employeeRepository;

    public function __construct(
        MovementRepositoryInterface $movementRepository, 
        
    ){
        $this->movementRepository = $movementRepository;
      
    }

    //Método para listar movimentações
    public function getAll()
    {
      return $this->movementRepository->getMovements();
    }

}
