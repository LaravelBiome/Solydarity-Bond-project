<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Solidarity Bond</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="/about">
                        <i class="material-icons">supervised_user_circle</i> A propos
                    </a>
                </li>
                <li class="">
                    <a href="/contact">
                        <i class="material-icons">record_voice_over</i> Contact
                    </a>
                </li>
                <li class="">
                    <a href="/products">
                        <i class="material-icons">shopping_bag</i> Produits
                    </a>
                </li>
                @if (Route::has('login'))
                @auth
                @else
                <li >
                    <a href="{{ route('login') }}">
                        <i class="material-icons">fingerprint</i> Login
                    </a>
                </li>
                @if (Route::has('register'))
                <li class="">
                    <a href="{{ route('register') }}">
                        <i class="material-icons">person_add</i> Register
                    </a>
                </li>
                @endif
                @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

