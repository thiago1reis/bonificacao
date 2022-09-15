@extends('layout.app')
@section('content')
@include('layout.header')
<div class="container">
    <div class="row" style="margin-top: 10rem"> 
        <div class="col-sm-6 col-md-12 col-lg-4">{{-- Lado esquerdo --}}</div>
        <div class="col-sm-6 col-md-12 col-lg-4">
            <div class="card bg-white text-bg-light mb-3 shadow-lg " >
                <div class="card-body">
                    <h3 class="card-title text-secondary mb-3 text-center fw-light">Login</h3>
                    @include('layout.alerts')
                    <form action="{{ route('login')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control text-secondary" id="login" name="login" placeholder="Digite o login" value="{{ old('login') }}">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control text-secondary" id="password"name="password" placeholder="Digite a senha" value="{{ old('password') }}">
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn btn-primary" type="submit">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
        <div class="col-sm-6 col-md-12 col-lg-4">{{-- Lado direito --}}</div>    
    </div> 
@endsection  