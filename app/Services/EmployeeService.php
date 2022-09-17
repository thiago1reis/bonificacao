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

    //Metodo para listar funcionários
    public function getAll(){
      return $this->employeeRepository->getEmployees();
    }

    //Metodo para filtrar funcionários
    public function search($name, $date){
      return $this->employeeRepository->searchEmployees($name, $date);
    }

    //Metodo para verificar se login está disponivle
    public function verifyLogin($login){
      return $this->employeeRepository->verifyLoginEmployee($login);
    }

    //Metodo para salvar dados do funcionário 
    public function store($data)
    {
      $data['password'] = bcrypt($data['password']);
      $data['administrator_id'] = auth()->user()->id;
      return $this->employeeRepository->createEmployee($data);
    }
}

    