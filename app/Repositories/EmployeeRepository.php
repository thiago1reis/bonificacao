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

    public function getEmployees()
    {
        return $this->eloquentEmployee->select(
          'id',
          'full_name',
          'current_balance',
          'created_at'
          )
          ->orderBy(
            'id',
            'DESC'
          )
          ->paginate(10);
    }

    public function searchEmployees($name, $date)
    {
      return $this->eloquentEmployee->select(
        'id',
        'full_name',
        'current_balance',
        'created_at'
        )
        ->where(
          'full_name', 
          'LIKE', 
          "{$name}%"
        )
        ->where(
          'created_at', 
          'LIKE', 
          "{$date}%"
        )
        ->orderBy(
          'id',
          'DESC')
        ->paginate(10);
    }

    public function createEmployee(array $data)
    {
        return $this->eloquentEmployee->create($data);
    }

}