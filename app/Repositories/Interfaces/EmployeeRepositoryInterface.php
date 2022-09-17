<?php

namespace App\Repositories\Interfaces;

use App\Models\Employee;
use Illuminate\Pagination\LengthAwarePaginator;

interface EmployeeRepositoryInterface extends BaseEloquentInterface
{
  public function __construct(Employee $employee);
  public function createEmployee(array $data);
  public function getEmployees();
  public function searchEmployees($name, $date);
  public function verifyLoginEmployee($login);
}
