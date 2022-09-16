<?php

namespace App\Repositories;


use App\Models\Employee;
use App\Repositories\Abstract\BaseEloquentRepository;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;


class EmployeeRepository extends BaseEloquentRepository implements EmployeeRepositoryInterface
{
    protected $model = Employee::class;
   
    private $eloquentEmployee;
  
    public function __construct(Employee $employee)
    {
      $this->eloquentEmployee = $employee;
    }

    public function createEmployee(array $data)
    {
        return $this->eloquentEmployee->create($data);
    }
}