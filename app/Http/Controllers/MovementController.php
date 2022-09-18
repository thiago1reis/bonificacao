<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use App\Services\MovementService;

class MovementController extends Controller
{
    protected $movementService;
    protected $employeeService;

    public function __construct(
        MovementService $movementService,
        EmployeeService $employeeService
    ) 
    {
      $this->movementService = $movementService;
      $this->employeeService = $employeeService;
    }

    //Lista de todas as movimentações.
    public function index()
    {
        $movements = $this->movementService->getAll();
        $types = $this->movementService->getTypes();
        return view('admin.movement.index', [
            'movements' => $movements,
            'types' => $types
        ]); 
    }

    //Formulario para registrar movimentação.
    public function create($id)
    {
        $employee = $this->employeeService->findById($id);
        $types = $this->movementService->getTypes();
        return view('admin.movement.create', [
            'types' => $types,
            'employee' => $employee
        ]);
    }
}
