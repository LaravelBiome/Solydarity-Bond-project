@extends('layouts.welcome')
@section('autentification')
<div class="row ">
    <div class="col-md-10 col-md-offset-1">
        <div class="card card-signup">
            <h2 class="card-title text-center">Rejoignez solidarity Bond</h2>
            <div class="row">
                <div class="col-md-5 col-md-offset-1">
                    <div class="card-content">
                        <div class="info info-horizontal">
                            <div class="icon icon-rose">
                                <i class="material-icons">shopping_basket</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Medecine</h4>
                                <p class="description">
                                    trouver le materiel medical dont vous avez besoin
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-primary">
                                <i class="material-icons">code</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title"></h4>
                                <p class="description">
                                    le site a etait developer entierement en html , css, php et javascript
                                </p>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-default">
                                <i class="material-icons">group</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">A qui s'adresse cette application</h4>
                                <p class="description">
                                    C'est pour les entreprises qui vendent directement des produits ou services aux consommateurs finaux
                                    ou bien des entreprises dont les clients finaux sont d’autres entreprises ou d’autres organisations.
                                </p>
                                </p>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-info">
                                <i class="material-icons">info</i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Parcitiper à la vente</h4>
                                <p class="description">
                                    Vendez vos produits aux ogranisations ou aux entreprises qui le veulent.
                                    Pour devenir vendeur vous devez être accepté, un administrateur vous contactera
                                    par email.
                                </p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-5">

                    <form class="form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="card-content">


                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input id="firstname" placeholder="Nom" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname"  autofocus>

                                @error('firstame')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">face</i>
                                </span>
                                <input id="lastname" placeholder="Prenom"  type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">email</i>
                                </span>
                                <input id="email" placeholder="Email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">phone</i>
                                </span>

                                <input id="phone" placeholder="Tel" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password" type="password" placeholder="Mot de passe.." class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">lock_outline</i>
                                </span>
                                <input id="password-confirm" placeholder="Confirmez mot de passe.."  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">accessibility</i>
                                </span>
                                <select class="form-control" name="type" id="type">
                                    <option value=1>Acheteur</option>
                                    <option value=2>Vendeur</option>
                                </select>

                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- If you want to add a checkbox to this form, uncomment this code -->
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" checked> I agree to the
                                    <a href="{{asset('doc/cgu.pdf#toolbar=0')}}" class="text-light text-info">
                                        Solidarity Bond cgu
                                    </a>
                                </label>
                            </div>

                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-info btn-round">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
