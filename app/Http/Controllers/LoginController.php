<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Efetua o login 
    public function login(Request $request){
       
        $credentials = [
            'login' => $request->login,
            'password' => $request->password
        ];
      
        if(Auth::attempt($credentials)){
            return redirect()->route('painel');
        }
        return redirect()->back()->withInput($request->input())->with('error', 'Login e senha estão incorretos, verifique e tente novamente.');

    }


}
