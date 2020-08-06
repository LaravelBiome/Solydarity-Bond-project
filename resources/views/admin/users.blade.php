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
                <i class="material-icons">people</i>
            </div>
            <h4 class="card-title">Listes des utilisateurs</h4>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prenom</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Role</th>
                                <th class="text-right">Modifier</th>
                                <th class="text-right">Supprimer</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="text-center" contenteditable="true">{{$user->firstname}}</td>
                                <td class="text-center" contenteditable="true">{{$user->lastname}}</td>
                                <td class="text-center" contenteditable="true">{{$user->email}}</td>
                                <form action="/admin/users/{{$user->id}}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <td class="text-center dropdown" contenteditable="true">
                                        @csrf
                                        <select name="right" id="right" class="btn btn-sm btn-info dropdown-toggle ">
                                            <option class="dropdown-item" value={{$user->right}}>{{$user->right == 1 ? "Acheteur" : "Vendeur"}}</option>
                                            <option  class="dropdown-item" value={{$user->right == 1 ? 2 : 1}}>{{$user->right == 2 ? "Acheteur" : "Vendeur"}}</option>
                                        </select>
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="submit" rel="tooltip" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </button>
                                    </td>
                                </form>
                                <td class="td-actions text-right"><!-- Button trigger modal -->
                                    {!!Form::open(['action'=>['AdminController@DestroyUser', $user->id],'method'=>'POST' , 'class'=>'deleteForm'])!!}
                                    @csrf
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::button('<i class="material-icons">close</i>',['type'=>'submit' , 'rel'=>'tooltip', 'class'=> 'btn btn-danger btn-simple'])}}
                                    {!!Form::close()!!}
                                </td>
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


