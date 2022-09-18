<?php

namespace App\Services;

use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\MovementRepositoryInterface;

class MovementService
{
    protected $movementRepository;
    protected $employeeRepository;

    public function __construct(MovementRepositoryInterface $movementRepository)
    {
        $this->movementRepository = $movementRepository;
    }

    //Método para listar movimentações
    public function getAll()
    {
      return $this->movementRepository->getMovements();
    }

    //Método para buscar tipos de movimentação
    public function getTypes()
    {
        return $this->movementRepository->getTypes();
    }
    
    //Método para salvar dados da movimentação 
    public function store(int $id, array $data)
    {
        $data['value'] = $this->treatValue($data['value']); 
        $data['employee_id'] = $id;
        $data['administrator_id'] = auth()->user()->id; 
        $movement = $this->movementRepository->createMovement($data);
        return $movement;
    }

    //Método para transformar valor em decimal 
    public function treatValue($value)
    {
         return doubleval(strtr((string) $value, ['.' => '', ',' => '.']));
    }


}
