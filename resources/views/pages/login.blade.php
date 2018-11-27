@extends('layouts.app')

@if (Auth::guest())
@section('content')
    <div class="container mb-5">
        <br/><br/>
        <div class="col-sm-6 mx-auto">
            <div class="card text-left">
                <div class="card-header ">
                    <h5 class="modal-title">User Access</h5>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'UserAccntController@login']) !!}
                    @include('inc.message')
                    
                    <div class="form-group row">
                        {{Form::label('txtEmail', 'Email Address', ['class' => 'col-form-label col-md-4'])}}
                        <div class="col-md-8">
                            {{Form::email('txtEmail', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                        </div> 
                    </div>
                    <div class="form-group row">
                        {{Form::label('txtPassword', 'Password', ['class' => 'col-form-label col-md-4'])}}
                        <div class="col-md-8">
                            {{Form::password('txtPassword', ['class' => 'form-control', 'placeholder' => 'Password'])}}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4 mx-auto">
                            {{Form::checkbox('name', 'value')}}
                            {{Form::label('', 'Remember Me', ['class' => 'col-form-label'])}}
                        </div>
                    </div>

                    <div class="float-right">
                            {{link_to('/forgotpassword', 'Forgot Password?', $title = null, $attributes = [], $secure = null)}}
                            {{Form::submit('Login', ['class' => 'btn btn-primary'])}}
                    </div>
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@endif