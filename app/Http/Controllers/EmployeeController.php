<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Services\EmployeeService;
use Exception;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService) 
    {
      $this->employeeService = $employeeService;
    }

    //Lista de todos os funcionários
    public function index(){
        $employees = $this->employeeService->getAll();
        return view('admin.employee.index', compact('employees'));
    }

    //Busca funcionários de acordo o filtro
    public function search(Request $request){
        $employees = $this->employeeService->search($request->query('name'), $request->query('date'));
        return view('admin.employee.index', [
            'employees' => $employees,
            'name' => $request->query('name'),
            'date' => $request->query('date'),
        ]);   
    }

    //Formulario para registrar funcionário
    public function create(){
        return view('admin.employee.create');
    }

    //Registra funcionário
    public function store(EmployeeRequest $request){
      try{
          $this->employeeService->store($request->validated());
      }catch (Exception $e){
          // dd($e);
          return redirect()->back()->withInput($request->all())->with('error','Algo inesperado ocorreu, estamos trabalhando para resolver.');
      }
      return redirect()->route('employee.index')->with('success', 'Funcionário resgistrado com sucesso.');
    }
}
