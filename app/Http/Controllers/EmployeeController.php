<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Repositories\Interfaces\EmployeeRepositoryInterface;
use App\Services\EmployeeService;
use Exception;
class EmployeeController extends Controller
{

    protected $employeeService;

    public function __construct(EmployeeService $employeeService) 
    {
      $this->employeeService = $employeeService;
    }

    //Lista de todos os funcionários
    public function index(){
        return view('admin.employee.index');
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
      return redirect()->route('employee.create')->with('success', 'Funcionário resgistrado com sucesso.');
    }
}
