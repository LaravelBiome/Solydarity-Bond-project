<nav class="navbar navbar-transparent navbar-absolute">
    <div class="container-fluid">

        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
        </div>

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}"> Home </a>
            <a class="navbar-brand" href="{{ url('/products') }}"> Produits </a>
            <a class="navbar-brand" href="{{ url('/about') }}">A propos de nous</a>
            <a class="navbar-brand" href="{{ url('/contact') }}">Contact</a>
        </div>
        <div class="collapse navbar-collapse">
            @yield('search')
        </div><!-----collaps ----->
    </div><!------container------>
</nav><!-------navbar------>




