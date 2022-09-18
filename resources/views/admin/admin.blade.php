@extends('layout.app')
@section('content')
@include('layout.menu')
<div class="container">
    <nav aria-label="breadcrumb" class="mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Admin</li>
        </ol>
    </nav>
    <div class="row mt-3" > 
        <div class="col-sm-6 col-md-12 col-lg-3">
            <a href="{{ route('employee.create')}}" class="nav-link admin-option">
                <div class="card bg-white text-bg-light mb-3 py-5 shadow-lg " >
                    <div class="card-body text-center text-secondary">
                        <i class="icofont-plus-circle icofont-3x"></i>
                        <h4 class="card-title fw-light mt-3">Registrar Funcinário</h4>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-12 col-lg-3"> 
            <a href="{{ route('employee.index')}}" class="nav-link admin-option">
                <div class="card bg-white text-bg-light mb-3 py-5 shadow-lg " >
                    <div class="card-body text-center text-secondary">
                        <i class="icofont-listing-number icofont-3x"></i>
                        <h4 class="card-title fw-light mt-3">Todos Funcinários</h4>
                    </div>
                </div>
            </a>
        </div> 
        <div class="col-sm-6 col-md-12 col-lg-3">
            <a href="{{ route('movement.index') }}" class="nav-link admin-option">
                <div class="card bg-white text-bg-light mb-3 py-5 shadow-lg " >
                    <div class="card-body text-center text-secondary">
                        <i class="icofont-ui-rotation icofont-3x"></i>
                        <h4 class="card-title fw-light mt-3">Movimentações</h4>
                    </div>
                </div>
            </a>
        </div>    
    </div> 
</div>    
@endsection  