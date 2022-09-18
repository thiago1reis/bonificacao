<?php

namespace App\Services;

use App\Models\Movement;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Repositories\Interfaces\MovementRepositoryInterface;
use Illuminate\Support\Collection;

class MovementService
{
    protected $movementRepository;
    protected $employeeRepository;

    public function __construct(
        MovementRepositoryInterface $movementRepository, 
        EmployeeRepositoryInterface $employeeRepository
    ){
        $this->movementRepo = $movementRepository;
        $this->employeeRepository = $employeeRepository;
    }


}
