@extends('layouts.pages')

@section('style')
    <style>
        html , body {
            background: linear-gradient(#52a2e4 , #e66465 );
        }
    </style>
@endsection

@section('content')

<div id="myDiv" style="display: none" >

    <div class="row" style="margin-top: 100px;">
        <div class="col-md-6 col-md-offset-3 text-center">
            <h1 class="title text-light" style="color: azure">{{ __('Contactez nous') }}</h1>
            <h5 class="description text-light" style="color: beige">
                SOLIDARITYBOND ORGANISATION (Alger) <br>
                60 rue du Kadous Tixeraine BIRKHADEM– ALGER.، 60 CW 116, Birkhadem <br>
                Tel: 021 40 55 00 <br>
                Site web: "www.cesi-algerie.com/" <br>
                Adresse email: Cesi-Algérie@viacesi.fr <br>
            </h5>
        </div>
    </div>

</div><!----endmydiv----->
@endsection

@section('scripts')

@endsection
