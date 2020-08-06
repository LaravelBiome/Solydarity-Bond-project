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
                <i class="material-icons">person_add</i>
            </div>
            <h4 class="card-title">Listes des inscriptions</h4>
            <div class="card-content">
                <div class="table-responsive">
                    <table class="table">

                        <thead>
                            <tr>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prenom</th>
                                <th class="text-center">Email</th>
                                <th class="text-right">Accepter</th>
                                <th class="text-right">Refuser</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach($inscriptions as $inscription)
                            <tr>
                                <td class="text-center" contenteditable="true">{{$inscription->user()->firstname}}</td>
                                <td class="text-center" contenteditable="true">{{$inscription->user()->lastname}}</td>
                                <td class="text-center" contenteditable="true">{{$inscription->user()->email}}</td>
                                <form action="/admin/inscriptions/{{$inscription->id}}" method="POST">
                                    @csrf
                                    <select hidden name="right" id="right">
                                        <option value=2></option>
                                    </select>
                                    <td class="td-actions text-right">
                                        <button type="submit" rel="tooltip" class="btn btn-success btn-simple"><i class="material-icons">done</i></button>
                                    </td>
                                </form>
                                <td class="td-actions text-right"><!-- Button trigger modal -->
                                    {!!Form::open(['action'=>['AdminController@deleteInscription', $inscription->id],'method'=>'POST' , 'class'=>'deleteForm'])!!}
                                    @csrf
                                    {{Form::hidden('_method','DELETE')}}
                                    {{Form::button('<i class="material-icons">close</i>',['type'=>'submit','rel'=>'tooltip', 'class'=> 'btn btn-danger btn-simple'])}}
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
