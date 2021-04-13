<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Barra de navegação esquerda -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Pesquisa -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Busca" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Barra de navegação direita -->
    <ul class="navbar-nav ml-auto">

        <!-- Menu de acessibilidade -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-wheelchair"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <span class="dropdown-item dropdown-header">Acessibilidade</span>

                <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    <a href="#"> <i class="fas fa-search-minus mr-2"></i> </a>
                    <a href="#"> <i class="fas fa-search-plus mr-2"></i> </a> Zoom
                </a>

                <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    <i class="fas fa-adjust mr-2"></i> Modo noturno
                </a>

                <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    <i class="fa fa-language mr-2"></i> Linguagem
                </a>

                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">Ver todas as configurações</a>
            </div>
        </li>

        <!-- Menu de Configurações -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-cogs"></i>
            </a>

            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                <span class="dropdown-item dropdown-header">Configurações</span>

                <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                    <i class="fas fa-power-off mr-2"></i> Sair
                </a>

            </div>
        </li>

        {{-- SIDEBAR DIREITO --}}
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
        </li>

    </ul>
  </nav>
