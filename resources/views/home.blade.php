@extends('layouts.app')

@section('content')
<div class="row ">
    <div class="col-md-12">
        <div class="alert alert-success">
            <span>
                <b> Success - </b> You are logged in! </span>
        </div>
    </div>
</div>
@endsection



       <!-----test alert notification
                    if (session('status'))
                        <div class="alert alert-success" role="alert">
                            { session('status') }
                        </div>
                    endif
                    ----->
