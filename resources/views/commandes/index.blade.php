@extends('layouts.app')
@section('content')
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

<div class="row">
    @can('seller-only')
    <div class="col-md-12" style="margin-top : 50px ;">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="blue">
                <i class="material-icons">library_books</i>
            </div>
            <h4 class="card-title">Commandes des clients</h4>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>
                                <th class="text-center">Produit</th>
                                <th class="text-center">Quantité</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Client</th>
                                <th class="text-center">Telephone</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($commandes as $commande)
                            <tr>
                                <td class="text-center" >{{$commande->product()->name}} </td>
                                <td class="text-center" >{{$commande->quantity}}</td>
                                <td class="text-center" >{{$commande->description}}</td>
                                <td class="text-center" >{{$commande->buyer()->firstname}} {{$commande->buyer()->lastname}}</td>
                                <td class="text-center" >{{$commande->buyer()->phone}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endcan
</div>
@endsection
