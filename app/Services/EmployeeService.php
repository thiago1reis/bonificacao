<?php

namespace App\Services;

use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Collection;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
      $this->employeeRepository = $employeeRepository;
    }

    // public function verifyEmployee($login){
    // }

    //Metodo para salvar dados do funcionário 
    public function store($data)
    {
      $data['password'] = bcrypt($data['password']);
      $data['administrator_id'] = auth()->user()->id;
      $employee = $this->employeeRepository->createEmployee($data);
      return $employee;
    }
}