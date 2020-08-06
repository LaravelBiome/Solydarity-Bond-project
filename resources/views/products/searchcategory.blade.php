@extends('layouts.app')


@section('search')
       <!------search test----->
       <form class="navbar-form navbar-right" method="POST" action="/search/products" role="search">
            @csrf
            <div class="form-group form-search is-empty">
                <input  id="search" name="search" type="text" class="form-control" placeholder="Search">
                <span class="material-input"></span>
            </div>

            <button type="submit" class="btn btn-white btn-round btn-just-icon" id="searchButton">
                <i class="material-icons">search</i>
                <div class="ripple-container"></div>
            </button>
        </form>
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="col-md-9" style="margin-top : 50px ;">
            <legend>Categories</legend>
            <div class="bootstrap-tagsinput">
                    @foreach ($categories as $category)
                    <span class="tag label labe label-default">
                        <a href="/category/{{$category->name}}" class="text-light" style="color: aliceblue">
                            {{$category->name}}
                        </a>
                    </span>
                    @endforeach
            </div>
        </div>
        <div class="col-md-3">
        @can('seller-only')
        <a href="/products/create" class="btn btn-round btn-success">
            <span class="btn-label">
                <i class="material-icons">add</i>
            </span>
            Ajouter un produit
        </a>
        <hr>
        @endcan
        </div>
    </div>
</div>


<div class="row">
    @if(isset($products))
    @if(count($products) > 0)
    <h3>les produits de la Categorie : {{$categor}}</h3>
    <br>

    @foreach($products as $product)
        <div class="col-md-4">
            <div class="card card-product" style="height:45rem;">
                <div class="card-image" data-header-animation="true">
                    <a href="/products/{{$product->id}}">
                        <img class="img" src="{{asset ('uploads/' . $product->image)}}">
                    </a>
                </div>
                <div class="card-content">
                    <div class="card-actions">
                        @can('admin-only')
                        <button type="button" class="btn btn-danger btn-simple fix-broken-card">
                            <i class="material-icons">build</i> Fix Header!
                        </button>
                        @endcan
                        <a href="/products/{{$product->id}}" class="btn btn-default btn-simple" rel="tooltip" data-placement="bottom" title="Details produits">
                            <i class="material-icons">art_track</i>
                        </a>
                        @can('buy-product' , $product)
                        <a href="/products/{{$product->id}}/buy"  class="btn btn-info btn-simple" rel="tooltip" data-placement="bottom" title="Acheter">
                            <i class="material-icons" aria-hidden="true">
                                shopping_cart
                            </i>
                        </a>
                        @endcan
                        @can('update-product' , $product)
                        <a href="/products/{{$product->id}}/edit" class="btn btn-success btn-simple" rel="tooltip" data-placement="bottom" title="Modifier">
                            <i class="material-icons">edit</i>
                        </a>
                        @endcan
                    </div>

                    <!---nom produit ---->
                    <h4 class="card-title">
                        <a href="/products/{{$product->id}}">{{$product->name}}</a>
                    </h4>
                    <div class="card-description">
                        <p class="card-text text-center">
                            Categorie: {{$product->category()->name}}
                        </p>
                        <p class="card-text text-center">
                            Vendeur: {{$product->user()->firstname}} {{$product->user()->lastname}}
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="price">
                        <h4>{{$product->price}} DA</h4>
                    </div>
                    <div class="stats pull-right">
                        <p class="category"><i class="material-icons">style</i> {{$product->quantity}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @else
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="alert alert-warning">
                <span>
                    <p><i class="material-icons" style="color: white">sentiment_very_dissatisfied</i></p>
                     <p>
                         Aucun produit dans la catégorie: {{$categor}}
                    </p>
                </span>
            </div>
        </div>
    </div>
    @endif
    @endif

</div>

@endsection

@section('scripts')
 <script type="text/javascript" src="{{asset('js/autocomplete.js')}}"></script>
@endsection
