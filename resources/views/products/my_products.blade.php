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
    @can('seller-only')
    <div class="col-md-12" style="margin-top : 50px ;">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="blue">
                <i class="material-icons">text_snippet</i>
            </div>
            <h4 class="card-title">Listes des produits</h4>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>
                                <th class="text-center">Nom du produit</th>
                                <th class="text-center">Quantité</th>
                                <th class="text-center">Prix</th>
                                <th class="text-right">Modifier</th>
                                <th class="text-right">Supprimer</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($products as $product)

                            <tr>
                                <td class="text-center">{{$product->name}}</td>
                                <td class="text-center">{{$product->quantity}}</td>
                                <td class="text-center">{{$product->price}}</td>
                                <td class="td-actions text-right">
                                    @can('update-product' , $product)
                                    <a href="/products/{{$product->id}}/edit"  class="card-link">
                                        <button type="button" class="btn btn-info btn-simple">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </a>
                                    @endcan
                                </td>
                                <td class=" td-actions text-right">
                                    @can('delete-product' , $product)
                                    <form action="/products/{{$product->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                        <button type="submit" id="submit" class="btn btn-danger btn-simple">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                           </a>
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
