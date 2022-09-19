<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Efetua o login 
    public function login(Request $request)
    {
        $credentials = [
            'login' => $request->login,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials)){
            return redirect()->route('admin');
        }
        return redirect()->back()->withInput($request->input())->with('error', 'Login e senha estão incorretos, verifique e tente novamente.');
    }

    //Verifica se a sessão do login esta ativo
    public function checkAuth()
    {
        if(Auth::check() === true){
            return redirect()->route('admin');
        }
        return redirect()->route('home')->with('attention', 'Sessão expirada, faça login novamente.');
    }

    //Efetua o logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
