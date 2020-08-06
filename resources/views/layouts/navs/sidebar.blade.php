<div class="sidebar" data-active-color="blue" data-background-color="black" data-image="{{asset('assets/img/sidebar-1.jpg')}}">
    <!--
Tip 1: data-active-color="purple | blue | green | orange | red | rose"
Tip 2:  data-image tag
Tip 3: color of the sidebar with data-background-color="white | black"
-->
    <div class="logo">
        <a href="#" class="simple-text">
            Solidarity
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="#" class="simple-text">
            <img src="{{asset('images/logo.png')}}" style="max-width: 50px">
        </a>
    </div>
    <div class="sidebar-wrapper">
        @guest
        <ul class="nav">
            <!-- Authentication Links -->
            <li >
                <a  href="{{ route('login') }}">
                    <i class="material-icons">login</i>
                    <p>{{ __('Login') }}</p>
                </a>
            </li>
            @if (Route::has('register'))
            <li>
                <a  href="{{ route('register') }}">
                    <i class="material-icons">fact_check</i>
                    <p>{{ __('Resgister') }}</p>
                </a>
            </li>
            @endif
        </ul>
        @else
        <div class="user">
            <div class="photo">
                <img src="{{asset('assets/img/default-avatar.png')}}" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    {{ strtoupper(Auth::user()->firstname)}} {{Auth::user()->lastname}}
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li>
                            <a href="{{ url('/edit/profile/') }}">{{ __('Profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endguest
        <ul class="nav">
            @can('buyer-only')
            <li>
                <a href="{{ url('/achats') }}">
                    <i class="material-icons">shopping_bag</i>
                    <p>Achats</p>
                </a>
            </li>
            @endcan
            @can('seller-only')
            <li>
                <a href="{{ url('/commandes') }}">
                    <i class="material-icons">library_books</i>
                    <p>Commandes</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/achats') }}">
                    <i class="material-icons">shopping_bag</i>
                    <p>Achats</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/my_products') }}">
                    <i class="material-icons">
                        text_snippet
                    </i>
                    <p>Gerer les produits</p>
                </a>
            </li>
            @endcan
            @can('admin-only')
            <li>
                <a href="{{ url('/admin/users') }}">
                    <i class="material-icons">people</i>
                    <p>Utilisateurs</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/inscriptions') }}">
                    <i class="material-icons">group_add</i>
                    <p>Inscriptions</p>
                </a>
            </li>
            @endcan
              <!-- Authentication Links -->
        </ul>
    </div>
</div>
