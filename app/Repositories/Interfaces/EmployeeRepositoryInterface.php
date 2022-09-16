<?php

namespace App\Repositories\Interfaces;

use App\Models\Employee;
use Illuminate\Pagination\LengthAwarePaginator;

interface EmployeeRepositoryInterface extends BaseEloquentInterface
{
  public function __construct(Employee $employee);
  public function createEmployee(array $data);
}
