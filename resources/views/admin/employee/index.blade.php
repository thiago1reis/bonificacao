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
            <a href="{{ route('employee.create')}}" type="button" class="btn btn-outline-primary mb-3"> <i class="icofont-plus-circle"></i> Novo Registro</a>
            @include('layout.alerts')
            <form method="get" action="{{ route('employee.search') }}" >             
                <div class="mb-3 g-3 row">
                  <div class="col-sm-6 col-md-5 col-lg-5 col-xl-7">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Buscar por nome" 
                        value="{{ isset($search['name']) ? $search['name'] = $search['name'] : $search['names'] = '' }}">
                  </div>
                  <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3">
                      <input type="date" class="form-control" id="date" name="date" 
                        value="{{ isset($search['date']) ? $search['date'] = $search['date'] : $search['date'] = '' }}">
                  </div>
                  <div class="col-sm-6 col-md-2 col-lg-2 col-xl-1 d-grid">
                      <button type="submit" class="btn btn-primary ">Buscar</button>
                  </div>
                  <div class="col-sm-6 col-md-2 col-lg-2 col-xl-1 d-grid">
                    <a href="{{ route('employee.index')}}" type="button" class="btn btn-primary ">Limpar</a>
                  </div>
                </div>
            </form>
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
                 @if(count($employees) > 0)
                 @foreach($employees as $employee)
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle">{{ $employee->id }}</td>
                    <td class="align-middle">{{ $employee->full_name }}</td>
                    <td class="align-middle">{{"R$ ".number_format($employee->current_balance, 2, ",", "."); }}</td>
                    <td class="align-middle">{{date('d/m/Y H:i:s', strtotime($employee->created_at))}}</td>
                    <td class="align-middle">
                        <a href="{{ route('employee.edit', ['id' => $employee->id ]) }}" type="button" class="btn btn-primary btn-sm me-2"><i class="icofont-ui-edit"></i> Editar</a>
                        <a href="{{ route('employee.show', ['id' => $employee->id ]) }}" type="button" class="btn btn-primary btn-sm me-2"><i class="icofont-ui-file"></i> Extrato</a>
                        <a type="submit" data-bs-toggle="modal" data-id="{{$employee->id}}" data-bs-target="#confirmDelete" class="btn btn-danger btn-sm remover-icon"><i class="icofont-ui-delete"></i> Deletar</a>
                    </td>
                  </tr>
                  @endforeach
                  @else
                  <tr class="text-nowrap bd-highlight">
                    <td class="align-middle text-center" colspan="5"><span>Nenhum registro encontrado.</span></td>
                  </tr>
                  @endif 
                </tbody>
              </table>
              @if(isset($search))
                {{ $employees->appends($search)->links('vendor.pagination.bootstrap-4') }}
              @else
                {{ $employees->links('vendor.pagination.bootstrap-4') }}
              @endif
            </div>  
        </div>
    </div>
      {{-- Modal para confirmar a exclusão do registro --}}
        <div  class="modal fade" id="confirmDelete" tabindex="-1" aria-hidden="true" role="dialog" data-bs-backdrop="static">
          <div class="modal-dialog modal-md  text-secondary" >
            <div class="modal-content">
                <div class="modal-header">
                    <span class="modal-title">Deletar Funcionário</span>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form id="delete-form" method="post">
                    @method('delete')
                    @csrf
                    <div class="my-2 d-flex align-items-center">
                          <i class="icofont-warning icofont-3x me-2"></i> <span class="fs-5"> Tem certeza que deseja deletar ?</span>
                    </div>
                    <div class=" my-2 float-end ">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger m">Cancelar</button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                  </form> 
                </div>
            </div>
        </div>
      </div> 
</div> 
@endsection
@push('js')
    <script>
        const remover_icon = document.querySelectorAll('.remover-icon');
        remover_icon.forEach(item => {
          item.addEventListener('click', event => {
              const remover = document.getElementById('delete-form');
              try {
                id = item.getAttribute('data-id'); 
                remover.setAttribute('action', `/admin/funcionario/deletar/${id}`)
              } catch (e) {
                console.warn(e);
              }
          })
        })
    </script>
@endpush  