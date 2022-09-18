<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="nav-link" href="{{ route('admin') }}"><span class="navbar-brand fs-3" ><i class="icofont-money fs-4"></i> Bonificação</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown px-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="icofont-ui-user-group"></i> 
                Funcionários
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="{{ route('employee.create')}}">Registar Funcionário</a></li>
              <li><a class="dropdown-item" href="{{ route('employee.index')}}">Todos Funcionários</a></li>
            </ul>
          </li>
          <li class="nav-item px-3">
            <a class="nav-link" href="{{ route('movement.index') }}"><i class="icofont-ui-rotation"></i> Movimentações</a>
          </li>
        </ul>
        <div class="d-flex">
          <ul class="navbar-nav">
            <li class="nav-item dropdown px-3">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="icofont-ui-user"></i> 
                {{ auth()->user()->full_name }}
              </a>
              <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('logout') }}">Sair</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
</nav>