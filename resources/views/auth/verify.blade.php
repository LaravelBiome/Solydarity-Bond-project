@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="red">
                    <i class="material-icons">warning</i>
                </div>

                <div class="card-content">
                    <div class="card-title text-center text-warning">
                        {{ __('Verifier votre Addresse E-Mail') }}
                    </div>

                    <div class="card-body text-center">
                        @if (session('resent'))
                        {{ __('Vous venez de recevoir un mail de verification ,Verifier votre boite mail') }}
                        @endif
                        {{ __('Avant de commencer , veuillier cliquer sur le lien que vous venez de recevoir.') }}
                        {{ __('Si vous avez rien recu ') }},


                        <form  method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-default">
                                <span class="btn-label">
                                    <i class="material-icons">priority_high</i>
                                </span>
                                {{ __('cliquer ici pour recevoir un nouveau ') }}
                                <div class="ripple-container"></div>
                            </button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
