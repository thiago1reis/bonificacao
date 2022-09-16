@extends('layout.app')
@section('content')
@include('layout.menu')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin')}}">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page">Funcionários</li>
        </ol>
    </nav>
    <div class="card bg-white mb-3 shadow-lg " >
        <div class="card-body text-secondary"> 
            <div class="mb-3">
                <a href="{{ route('employee.create')}}" type="button" class="btn btn-outline-primary "> <i class="icofont-plus-circle"></i> Novo Registro</a>
            </div>
            <div class="mb-3 row">
                <div class="col-lg-7">
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Buscar por nome">
                </div>
                <div class="col-lg-3">
                    <input type="date" class="form-control" id="create_at" name="create_at" >
                </div>
                <div class="col-lg-2 ">
                    <button type="submit" class="btn btn-primary ms-2 me-3">Buscar</button>
                    <a href="#" type="button" class="btn btn-primary ">Limpar</a>
                </div>  
            </div>
            @php
                $data = false
            @endphp
            <div class="table-responsive">
              <table class="table table-striped mb-3">
                <thead>
                  <tr class="text-nowrap bd-highlight">
                    <th width="80">ID</th>
                    <th width="300">Nome</th>
                    <th width="300">Saldo Atual</th>
                    <th width="300">Data de Criação</th>
                    <th width="120"></th>
                  </tr>
                </thead>
                <tbody>
                 @if($data)
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle">1</td>
                    <td class="align-middle">Thiago Alexandre Reis</td>
                    <td class="align-middle">R$ 0,00</td>
                    <td class="align-middle">16/09/2022 - 01:19:59 </td>
                    <td class="align-middle">
                        <a href="{{ route('employee.index') }}" type="button" class="btn btn-primary btn-sm me-2"><i class="icofont-ui-edit"></i> Editar</a>
                        <a href="{{ route('employee.index') }}" type="button" class="btn btn-primary btn-sm me-2"><i class="icofont-ui-file"></i> Extrato</a>
                        <a href="{{ route('employee.index') }}" type="button" class="btn btn-danger btn-sm"><i class="icofont-ui-delete"></i> Deletar</a>
                    </td>
                  </tr>
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle">1</td>
                    <td class="align-middle">Thiago Alexandre Reis</td>
                    <td class="align-middle">R$ 0,00</td>
                    <td class="align-middle">16/09/2022 - 01:19:59 </td>
                    <td class="align-middle">
                        <a href="{{ route('employee.index') }}" type="button" class="btn btn-primary btn-sm me-2"><i class="icofont-ui-edit"></i> Editar</a>
                        <a href="{{ route('employee.index') }}" type="button" class="btn btn-primary btn-sm me-2"><i class="icofont-ui-file"></i> Extrato</a>
                        <a href="{{ route('employee.index') }}" type="button" class="btn btn-danger btn-sm"><i class="icofont-ui-delete"></i> Deletar</a>
                    </td>
                  </tr>
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle">1</td>
                    <td class="align-middle">Thiago Alexandre Reis</td>
                    <td class="align-middle">R$ 0,00</td>
                    <td class="align-middle">16/09/2022 - 01:19:59 </td>
                    <td class="align-middle">
                        <a href="{{ route('employee.index') }}" type="button" class="btn btn-primary btn-sm me-2"><i class="icofont-ui-edit"></i> Editar</a>
                        <a href="{{ route('employee.index') }}" type="button" class="btn btn-primary btn-sm me-2"><i class="icofont-ui-file"></i> Extrato</a>
                        <a href="{{ route('employee.index') }}" type="button" class="btn btn-danger btn-sm"><i class="icofont-ui-delete"></i> Deletar</a>
                    </td>
                  </tr>
                  @else
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle text-center" colspan="5"><span>Nenhum registro encontrado.</span></td>
                  </tr>
                  @endif 
                </tbody>
              </table>
            </div>  
        </div>
    </div>
</div> 
@endsection  