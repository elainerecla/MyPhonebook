@extends('layouts.app')

@section('content')
    <div class="jumbotron vertical-center">
        <div class="container">
            <h1 class="display-4">Welcome to My Phonebook!</h1>
            <p class="lead">This is a simple dummy sentence.</p>
            <hr class="my-4">
            <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</p>
            <p class="lead">
                <a class="btn btn-primary btn-lg" href="/loginuser">Login here</a>
            </p>
            <p>
                No account yet? <a href="/signup">Sign up here!</a>
            </p>
        </div>
    </div> 
@endsection

<!--Modals here-->
@include('modals.forgotpassword')