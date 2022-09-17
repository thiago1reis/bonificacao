<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employee;
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

    //Lista de todos os funcionários.
    public function index(){
        $employees = $this->employeeService->getAll();
        return view('admin.employee.index', compact('employees'));
    }

    //Busca funcionários de acordo o filtro.
    public function search(Request $request){
        $employees = $this->employeeService->search($request->query('name'), $request->query('date'));
        return view('admin.employee.index', [
            'employees' => $employees,
            'search' => $request->query()
        ]);   
    }

    //Formulario para registrar funcionário.
    public function create(){
        return view('admin.employee.create');
    }

    //Registra funcionário.
    public function store(EmployeeStoreRequest $request){ 
        $request->validated();
        try{
            //Verifica se o login informado está diponível.
            if($this->employeeService->verifyLogin($request->login)){
                return redirect()->back()->withInput($request->all())->with('attention','Esse login não está disponível.');
            }
            $this->employeeService->store($request->all());
        }catch (Exception $e){
            // dd($e);
            return redirect()->back()->withInput($request->all())->with('error','Algo inesperado ocorreu, estamos trabalhando para resolver.');
        }
        return redirect()->route('employee.index')->with('success', 'Funcionário resgistrado com sucesso.');
    }

    //Formulario para editar funcionário.
    public function edit($id){
        $employee = $this->employeeService->findById($id);
        return view('admin.employee.edit', compact('employee'));
    }

    //Atualiza funcionário.
    public function update(EmployeeUpdateRequest $request, $id){
        $request->validated();
        try{
            $employee = $this->employeeService->findById($id);
            //Compara se valor de login recebido é diferente do que está cadastrado.
            if($request->login != $employee->login){
                //Verifica se o login informado está diponível.
                if($this->employeeService->verifyLogin($request->login)){
                    return redirect()->back()->withInput($request->all())->with('attention','Esse login não está disponível.');
                }
            }
            //Entra aqui caso tenha informado nova senha.
            if($request->password){
                $this->employeeService->update($employee->id, $request->all());
            }
            //Caso não tenha informado nova senha o campo password é ignorado.
            $this->employeeService->update($employee->id, $request->except('password'));
        }catch (Exception $e){
            dd($e);
            return redirect()->back()->withInput($request->all())->with('error','Algo inesperado ocorreu, estamos trabalhando para resolver.');
        }
        return redirect()->route('employee.index')->with('success', 'Funcionário editado com sucesso.');
    }
}