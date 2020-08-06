@extends('layouts.app')


@section('second-navbar')
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
    <div class="col-md-12" style="margin-top : 50px ;">
        <div class="card card-blog">

            <div class="card-image" style="max-width: 250px">
                <a href="#">
                    <img class="img" src="{{asset('uploads/' . $product->image)}}" />
                </a>

            </div>

            <div class="card-content">
                <h6 class="category text-gray">Fournisseur / {{$product->user()->firstname}} {{$product->user()->lastname}}</h6>
                <h4 class="card-title">{{$product->name}}</h4>
                <p class="description">
                    Description: {{$product->description}}
                </p>

                @can('buy-product' , $product)
                <a href="/products/{{$product->id}}/buy"  class="btn btn-info btn-round">
                    <i class="material-icons" aria-hidden="true">
                        shopping_cart
                    </i>
                </a>
                @endcan
                @can('update-product' , $product)
                <a href="/products/{{$product->id}}/edit"  class="btn btn-info btn-round">
                    <i class="material-icons" aria-hidden="true">edit</i>
                </a>
                @endcan
                @can('delete-product' , $product)
                <form action="/products/{{$product->id}}" method="POST">
                    @csrf
                    @method('delete')
                <button type="submit" id="submit" class="btn btn-danger btn-round">
                    <i class="material-icons" aria-hidden="true">delete</i>
                </button>
                </form>
                @endcan

            </div>

            <div class="card-footer">
                <div class="price">
                    <h4>{{$product->price}} DA</h4>
                </div>
                <div class="stats pull-right">
                    <p class="category" title="Quantité"><i class="material-icons" title="Quantité">style</i> {{$product->quantity}}</p>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/autocomplete.js')}}"></script>
@endsection
