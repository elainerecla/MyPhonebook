@extends('layouts.app')

@section('content')
<div class="container-fluid" style="padding: 20px 0px;">
    <div class="row">
        @include('inc.sidenav')
        <div class="col-sm-10">
            <div class="jumbotron">
                <h1 class="display-4">Dashboard!</h1>
                    <p class="lead">Hi, {{$currentauth->firstname}}. Welcome to MyPhonebook, feel free to familiarize this app.</p>
                <hr class="my-4">
                <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p>
            </div>
        </div>
    </div>
    
</div>
@endsection