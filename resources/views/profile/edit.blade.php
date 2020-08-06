@extends('layouts.app')
@section('style')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="blue">
                <i class="material-icons">perm_identity</i>
            </div>
            <div class="card-content">

                <h4 class="card-title">
                    {{Auth::user()->firstname}} {{Auth::user()->lastname}}
                    <!----role----->
                    <span class="tag label label-info pull-right">
                        @if(Auth::user()->right == 3) Admin
                        @elseif(Auth::user()->right == 2) Vendeur
                        @else Acheteur
                        @endif
                    </span>
                    <div class="text-center">
                        <!------date d'enregistrement------>
                        <small class="category">
                            A rejoint Solidarity le : {{Auth::user()->created_at}}
                        </small>
                    </div>
                </h4>

                <form class="form" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('POST')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Nom</label>
                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{Auth::user()->firstname}}" required>
                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Prenom</label>
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{Auth::user()->lastname}}" required>
                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Tel</label>
                                <input class="form-control @error('phone') is-invalid @enderror" type="number"  name="phone" id="phone" value="{{Auth::user()->phone}}" required>
                                 @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">
                                    @if(Auth::user()->email_verified_at === NULL)
                                    <a href="/edit/profile/email" style="color: red">
                                        <i class="material-icons">warning</i>Email non verifié (<a href="/edit/profile/email">Renvoyer l'email de confirmation</a>.)
                                    </a>
                                    @else
                                    Addresse email
                                    @endif
                                </label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"  name="email" id="email" value="{{Auth::user()->email}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label">Mot de passe actuelle </label>
                                <input class="form-control  {!! !empty($old_password_error) ? 'is-invalid' : '' !!}" name= "old_password" type="password" >
                                @isset($old_password_error)
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $old_password_error }}</strong>
                                            </span>
                               @endisset
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                    <label class="control-label">Nouveau mot de passe</label>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password">
                                    @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group label-floating">
                                <label class="control-label"><span class="d-none d-xl-inline">Confirmer mot de passe</span></label>
                                <input class="form-control" type="password" name=password_confirmation>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-info pull-right">Update Profile</button>
                    <form  action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <button type="submit" class="btn btn-default pull-left">
                            <i class="fa fa-sign-out"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    <div class="clearfix"></div>
                </form>

            </div>
        </div>
    </div>
</div>


@endsection
