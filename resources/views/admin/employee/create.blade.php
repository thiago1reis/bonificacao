@extends('layout.app')
@section('content')
@include('layout.menu')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin')}}">Admin</a></li>
          <li class="breadcrumb-item"><a href="{{ route('employee.index')}}">Funcionários</a></li>
          <li class="breadcrumb-item active" aria-current="page">Resgistrar</li>
        </ol>
    </nav>
    <div class="card bg-white mb-3 shadow-lg " >
        <div class="card-body text-secondary">
            <form>
                <div class="mb-3">
                    <label for="full_name" class="form-label">Nome Completo</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Digite o nome completo do funcionário">
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Login</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Digite o nome de usuário do funcionário">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite a senha">
                </div>
                <div class="mb-3 float-end">
                    <a href="{{ route('employee.index') }}" type="button" class="btn btn-danger px-3 me-3">Cancelar</a>
                    <button type="submit" class="btn btn-success px-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection  