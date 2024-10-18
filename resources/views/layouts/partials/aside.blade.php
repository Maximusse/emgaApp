<!-- Debut Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('frontend/logos/emga.png') }}" alt="LOGO EMGA" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">EMGA APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
          <h6 style="text-align:center;font-weight:bolder;color:#fff;">{{ auth()->user()->typeUserData() }}</h6>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="{{ route('/') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>
          {{-- Utilisateur --}}
          <li class="nav-item">
            <a href="{{ route('dorh.utilisateurs') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Utilisateurs
              </p>
            </a>
          </li>
          {{-- Cartes --}}
          <li class="nav-item">
            <a href="{{ route('/') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Cartes
              </p>
            </a>
          </li>
          {{-- Divisions --}}
          <li class="nav-item">
            <a href="{{ route('/') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Divisions
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Fin Main Sidebar Container -->