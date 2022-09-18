@extends('layout.app')
@section('content')
@include('layout.menu')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Movimentação</li>
            <li class="breadcrumb-item"><a href="{{ route('employee.show', ['id' => $employee->id ]) }}">{{ $employee->full_name }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registrar</li>
        </ol>
    </nav>
    <div class="card bg-white mb-3 shadow-lg " >
        <div class="card-body text-secondary">
            <p class="fs-4 text-end ">Saldo {{"R$ ".number_format($employee->current_balance, 2, ",", "."); }}</p>
            @include('layout.alerts')
            <form method="post" action="{{ route('movement.store', ['id' => $employee->id ]) }}" >
                @csrf
                <div class="mb-3 g-3 row">
                    <div class="col-sm-4 ">
                        <label for="movement_type" class="form-label">Tipo</label>
                        <select class="form-select" aria-label="Default select example" name="movement_type">
                                <option value="">Selecione...</option>
                                @foreach($types as  $key => $value )
                                    <option value="{{ $key }}" >{{ $value == 'Income' ? 'Entrada' : 'Saída' }}</option>
                                @endforeach 
                        </select>
                        @error('movement_type')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-sm-4 ">
                        <label for="value" class="form-label">Valor</label>
                        <input type="text" class="form-control money2" id="value" name="value" placeholder="R$ 0,00" value="{{ old('value') }}">
                        @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="col-sm-4 ">
                        <label for="note" class="form-label">Descrição</label>
                        <input type="text" class="form-control" id="note" name="note" placeholder="Digite a descrição da movimentação" value="{{ old('note') }}">
                        @error('note')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>    
                <div class="mb-3 float-end">
                    <a href="{{ route('employee.show', ['id' => $employee->id ]) }}" type="button" class="btn btn-danger px-3 me-3">Cancelar</a>
                    <button type="submit" class="btn btn-success px-4">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function(){
        $('.money2').mask('000.000.000.000.000,00', {reverse: true});
    });
</script>
@endpush    