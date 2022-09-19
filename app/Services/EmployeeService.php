<?php

namespace App\Services;

use App\Repositories\Interfaces\EmployeeRepositoryInterface;
class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
      $this->employeeRepository = $employeeRepository;
    }

    //Método para listar funcionários
    public function getAll()
    {
      return $this->employeeRepository->getEmployees();
    }

    //Método para filtrar funcionários
    public function search($name, $date)
    {
      return $this->employeeRepository->searchEmployees($name, $date);
    }

    //Método para verificar se login está disponivle
    public function verifyLogin(string $login)
    {
      return $this->employeeRepository->verifyLoginEmployee($login);
    }

    //Método para salvar dados do funcionário 
    public function store(array $data)
    {
      $data['password'] = bcrypt($data['password']);
      $data['administrator_id'] = auth()->user()->id;
      return $this->employeeRepository->createEmployee($data);
    }

    //Método para buscar um funcionário expecífico
    public function findById(int $id)
    {
      return $this->employeeRepository->findEmployee($id);
    } 

    //Método para atualizar dados do funcionário 
    public function update(int $id, array $data)
    {
      if(isset($data['password'])){
          $data['password'] = bcrypt($data['password']);
      } 
      return $this->employeeRepository->updateEmployee($id, $data);
    }

    //Método para excluir funcionário.
    public function destroy(int $id)
    {
      return $this->employeeRepository->deleteEmployee($id);
    }

    //Método para buscar saldo do funcionário
    public function getBalance(int $id)
    {
      return $this->employeeRepository->balanceEmployee($id);
    }

    //Método para atualizar saldo autual do funcionário
    public function updateBalance(int $id, array $data)
    {
       return $this->employeeRepository->updateEmployee($id, $data);
    }
}

    