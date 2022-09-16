<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Painel Admin
    public function index(){
        return view('admin.admin');
    }
}
