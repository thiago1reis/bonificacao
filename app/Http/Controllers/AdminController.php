<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    //Painel Admin
    public function index(){
        return view('admin.admin');
    }
}
