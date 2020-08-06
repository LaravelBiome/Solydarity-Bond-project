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
    <div class="col-md-12" style="margin-top : 50px ;">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="blue">
                <i class="material-icons">shopping_basket</i>
            </div>
            <h4 class="card-title">Listes des achats</h4>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>

                                <th class="text-center">Produit</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Quantité</th>
                                <th class="text-center">Vendeur</th>
                                <th class="text-center">tel_Vendeur</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($achats as $achat)
                        <tr class=" @isset($item) {{ $item == $achat->id ? 'success'  : ''}} @endisset">
                                <td class="text-center" >{{$achat->product()->name}}</td>
                                <td class="text-center" >{{$achat->description}}</td>
                                <td class="text-center" > {{$achat->quantity}}</td>
                                <td class="text-center" > {{$achat->seller()->firstname}} {{$achat->seller()->lastname}}</td>
                                <td class="text-center" > {{$achat->seller()->phone}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
