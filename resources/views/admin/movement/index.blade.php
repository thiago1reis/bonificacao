@extends('layout.app')
@section('content')
@include('layout.menu')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('admin')}}">Admin</a></li>
          <li class="breadcrumb-item active" aria-current="page">Movimentações</li>
        </ol>
    </nav>
    <div class="card bg-white mb-3 shadow-lg " >
        <div class="card-body text-secondary">
            <form method="get" action="{{ route('movement.search') }}" >             
                <div class="mb-3 g-3 row">
                  <div class="col-sm-6 col-md-4 col-lg-5 col-xl-5">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Buscar por nome do funcionário" 
                        value="{{ isset($search['name']) ? $search['name'] = $search['name'] : $search['name'] = '' }}">
                  </div>
                  <div class="col-sm-6 col-md-2 col-lg-3 col-xl-3">
                      <input type="date" class="form-control" id="date" name="date" 
                        value="{{ isset($search['date']) ? $search['date'] = $search['date'] : $search['date'] = '' }}">
                  </div>
                  <div class="col-sm-6 col-md-2 col-lg-2 col-xl-2">
                    <select class="form-select" aria-label="Default select example" id="type" name="type"  >
                        <option value="">Tipo...</option>
                        @foreach($types as  $key => $value )
                            <option value="{{ $key }}" {{ isset($search['type']) && $search['type'] == $key ? 'selected': '' }}>{{ $value == 'Income' ? 'Entrada' : 'Saída' }}</option>
                        @endforeach 
                    </select>
                  </div>
                  <div class="col-sm-6 col-md-2 col-lg-1 col-xl-1 d-grid">
                      <button type="submit" class="btn btn-primary ">Buscar</button>
                  </div>
                  <div class="col-sm-6 col-md-2 col-lg-1 col-xl-1 d-grid">
                    <a href="{{ route('movement.index')}}" type="button" class="btn btn-primary ">Limpar</a>
                  </div>
                </div>
            </form>
            <div class="table-responsive">
              <table class="table table-striped mb-3">
                <thead>
                  <tr class="text-nowrap bd-highlight">
                    <th width="50">ID</th>
                    <th width="100">Tipo</th>
                    <th width="200">Valor</th>
                    <th width="300">Funcionário</th>
                    <th width="350">Observação</th>
                    <th width="200">Data de Criação</th>
                  </tr>
                </thead>
                <tbody>
                 @if(count($movements) > 0)
                 @foreach($movements as $movement)
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle">{{ $movement->id }}</td>
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
                    <td class="align-middle">{{ $movement->full_name }}</td>
                    <td class="align-middle">{{ $movement->note }}</td>
                    <td class="align-middle">{{date('d/m/Y H:i:s', strtotime($movement->created_at))}}</td>
                  </tr>
                  @endforeach
                  @else
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle text-center" colspan="6"><span>Nenhum registro encontrado.</span></td>
                  </tr>
                  @endif 
                </tbody>
              </table>
              @if(isset($search))
                {{ $movements->appends($search)->links('vendor.pagination.bootstrap-4') }}
              @else
                {{ $movements->links('vendor.pagination.bootstrap-4') }}
              @endif
            </div>  
        </div>
    </div>
</div> 
@endsection
