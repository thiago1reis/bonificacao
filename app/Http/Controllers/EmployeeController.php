<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    //Lista de todos os funcionários
    public function index(){
        return view('admin.employee.index');
    }

    //Formulario para registrar funcionário
    public function create(){
        return view('admin.employee.create');
    }
}
