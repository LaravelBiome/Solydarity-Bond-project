@extends('layouts.app')


@section('style')
<style>
    /* width */
    ::-webkit-scrollbar {
      width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track:horizontal {
      box-shadow: inset 0 0 5px grey;
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb:horizontal {
      background: cyan;
      border-radius: 10px;
    }


    </style>
@endsection


@section('content')
<div class="row">
    <div class="col-md-12" style="margin-top : 50px ;">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="blue">
                <i class="material-icons">
                    shopping_cart
                </i>

            </div>

            <div class="alert alert-info">
                <span>
                    <b> Info - </b>
                    Le vendeur {{$product->user()->firstname}} {{$product->user()->lastname}} recevra les informations suivantes liées à votre compte :
                    <dl>
                        <ol>Nom et Prenom</ol>
                        <ol>Numéro de telephone</ol>
                    </dl>
                </span>
            </div>

            <div class="card-content">

                <h5> Nom du produit: {{$product->name}}</h5>
                <h5> Description: {{$product->description}}</h5>
                <h4 class="card-title">Effectuer une commande</h4>
                <form action="/products/{{$product->id}}/buy" method="post">
                    @csrf
                    <div class="form-group label-floating is-empty">
                        <label class="control-label" for="description">Description (optionnel)</label>
                        <textarea class="form-control" id="description" name="description" id="description" rows="3"></textarea>
                    </div>
                    <div class="form-group label-floating is-empty">
                        <label class="control-label" for="quantity">Quantité</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" step="0.01" required>
                    </div>

                    <br>
                    <button type="submit" class="btn btn-success pull-right">Effectuer la commande</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
