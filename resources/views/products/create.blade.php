@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1" style="margin-top : 50px ;">
        <div class="card">
            <div class="card-header card-header-text" data-background-color="blue">
                <h4 class="card-title">Ajouter un produit</h4>
            </div>
            <div class="card-content">
                <div class="card-description">
                    <form method="POST" action="/products" enctype="multipart/form-data">
                        @csrf
                        <div class="card-content">
                            <div class="row">
                                <label for="name" class="col-sm-2 label-on-left">Nom</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <label for="description" class="col-sm-2 label-on-left">Description</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <textarea id="description"  class="form-control @error('description') is-invalid @enderror" name="description" placeholder="{{ old('description') }}"  required autocomplete="description" rows="3" autofocus >
                                        </textarea>
                                    </div>
                                </div>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row">
                                <label for="price" class="col-sm-2 label-on-left">Prix</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input id="price" type="number" max="999999" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price">
                                    </div>
                                </div>
                                @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <label for="quantity" class="col-sm-2 label-on-left">Quantité</label>
                                <div class="col-sm-10">
                                    <div class="form-group label-floating is-empty">
                                        <label class="control-label"></label>
                                        <input id="quantity" type="number" max="999999" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity') }}" required autocomplete="quantity">
                                    </div>
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group row">
                                    <label for="category" class="col-md-4 col-form-label text-md-right">Categorie</label>

                                    <div class="col-md-6">
                                        <select name="category" id="category" class="btn btn-sm btn-info dropdown-toggle ">
                                            @foreach($categories as $category)
                                                <option class="dropdown-item" value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group row">
                                    <div class="col-md-4 col-sm-4">
                                        <legend>Selectionner une image</legend>
                                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail">
                                                <img src="{{asset ('images/random.jpg')}}" alt="...">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                            <div>
                                                <span class="btn btn-info btn-round btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>
                                                </span>
                                                @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group row ">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-round btn-success pull-right">
                                            Ajouter
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
