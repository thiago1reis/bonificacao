@extends('layout.app')
@section('content')
@include('layout.menu')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin')}}">Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ route('employee.index')}}">Funcionários</a></li>
            <li class="breadcrumb-item active" aria-current="page">Extrato</li>
            <li class="breadcrumb-item active" aria-current="page">{{ $employee->full_name }}</li>
        </ol>
    </nav>
    <div class="card bg-white mb-3 shadow-lg " >
        <div class="card-body text-secondary">
            <a href="{{ route('employee.index')}}" type="button" class="btn btn-primary mb-3">Voltar</a>
            <a href="{{ route('employee.create')}}" type="button" class="btn btn-outline-primary mb-3"><i class="icofont-plus-circle"></i> Novo Registro</a>
            <span class="fs-4 float-end">Saldo {{"R$ ".number_format($employee->current_balance, 2, ",", "."); }}</span>
            <div class="table-responsive">
              <table class="table table-striped mb-3">
                <thead>
                  <tr class="text-nowrap bd-highlight">
                    <th width="300">Data da Movimentação</th>
                    <th width="300">Tipo</th>
                    <th width="300">Valor</th>
                    <th width="300">Observação</th>
                  </tr>
                </thead>
                <tbody>
                 @if(count($employee->movements) > 0)
                 @foreach($employee->movements as $movement)
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle">{{date('d/m/Y H:i:s', strtotime($movement->created_at))}}</td>
                    <td class="align-middle">
                      @if($movement->movement_type == 'income')
                        Entrada
                      @else
                        Saída
                      @endif
                    </td>
                    <td class="align-middle">
                      @if($movement->movement_type == 'income')
                        <span class="text-success"> + {{"R$ ".number_format($movement->value, 2, ",", "."); }}</span>
                      @else
                        <span class="text-danger"> - {{"R$ ".number_format($movement->value, 2, ",", "."); }}</span>
                      @endif
                    </td>
                    <td class="align-middle">{{ $movement->note }}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle text-center" colspan="5"><span>Ainda não existe movimentação para esse funcionário.</span></td>
                  </tr>
                  @endif 
                </tbody>
              </table>
            </div>  
        </div>
    </div>
</div> 
@endsection