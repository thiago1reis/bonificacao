<?php

namespace App\Repositories\Interfaces;

use App\Models\Employee;
interface EmployeeRepositoryInterface extends BaseEloquentInterface
{
  public function __construct(Employee $employee);
  public function createEmployee(array $data);
  public function getEmployees();
  public function searchEmployees($name, $date);
  public function verifyLoginEmployee(string $login);
  public function findEmployee(int $id);
  public function updateEmployee(int $id, array $data);
  public function deleteEmployee(int $id);
}
