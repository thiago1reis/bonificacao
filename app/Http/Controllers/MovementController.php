<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovementStoreRequest;
use App\Services\EmployeeService;
use App\Services\MovementService;
use Exception;
use Illuminate\Http\Request;

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

    public function store(MovementStoreRequest $request, $id)
    {  
        $request->validated();
        try{

            #Busca saldo atual do funcionário.
            $employee = $this->employeeService->getBalance($id);

            #Converte valor recebido 
            $value = $this->movementService->treatValue($request->value);
            
            #Se a movimentação for de saída, verifica se funcionário possui saldo suficiete.
            if($request->movement_type == 'expense' && $employee->current_balance < $value){
                return redirect()->back()->withInput($request->all())->with('attention','Saldo insuficiente.');
            }

            #Salva os dados da movimentação.
            $this->movementService->store($id, $request->all());
             
            #Define um novo valor para o saldo.
            if($request->movement_type == 'income')
            {
                $data['current_balance'] =  $employee->current_balance + $value;
            }else{
                $data['current_balance'] =  $employee->current_balance - $value;
            }

            #Atualiza o valor do saldo
            $this->employeeService->updateBalance($id, $data);

        }catch (Exception $e){
            dd($e);
            return redirect()->back()->withInput($request->all())->with('error','Algo inesperado ocorreu, estamos trabalhando para resolver.');
        }
        return redirect()->route('employee.show', ['id' => $id])->with('success', 'Movimentação resgistrada com sucesso.');
    }
}
