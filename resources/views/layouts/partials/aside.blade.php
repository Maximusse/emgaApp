<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('frontend/logos/emga.png') }}" alt="LOGO EMGA" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">EMGA APP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                <h6 class="text-center font-weight-bolder text-white">{{ auth()->user()->typeUserData() }}</h6>
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
                <!-- Home Link -->
                <li class="nav-item">
                    <a href="{{ route('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Accueil</p>
                    </a>
                </li>

                <!-- MENU ADMIN DORH -->
                @if(auth()->user()->isDorhUser())
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>DORH <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('dorh.utilisateurs') }}" class="nav-link"><i class="nav-icon fas fa-th"></i><p>utilisateur</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dorh.cartes') }}" class="nav-link"><i class="nav-icon fas fa-th"></i><p>cartes</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('dorh.divisions') }}" class="nav-link"><i class="nav-icon fas fa-th"></i><p>divisions</p></a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- MENU ADMIN DIVISION -->
                @if(auth()->user()->isDivisionUser())
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>DIVISIONS <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="nav-icon fas fa-th"></i><p>permanence list</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('division.personnel') }}" class="nav-link"><i class="nav-icon fas fa-th"></i><p>personnel list</p></a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- MENU ADMIN MESSE -->
                @if(auth()->user()->isMesseUser())
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>MESSE <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="nav-icon fas fa-th"></i><p>repas</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="nav-icon fas fa-th"></i><p>distributions</p></a>
                            </li>
                        </ul>
                    </li>
                @endif

                <!-- MENU ADMIN COMPAGNIE -->
                @if(auth()->user()->isCompagnieUser())
                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>COMPAGNIE <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="nav-icon fas fa-th"></i><p>historique</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="nav-icon fas fa-th"></i><p>Entrer</p></a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link"><i class="nav-icon fas fa-th"></i><p>Sortie</p></a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- End Sidebar Menu -->
    </div>
    <!-- End Sidebar -->
</aside>
