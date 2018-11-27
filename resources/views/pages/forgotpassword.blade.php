@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <br/><br/>
        <div class="col-sm-7 mx-auto">
            <div class="card text-left">
                <div class="card-header ">
                    <h5 class="modal-title">Reset your password</h5>
                </div>
                <div class="card-body">
                    {!! Form::open(['action' => 'UserAccntController@index']) !!}
                        <p>Enter your email and we'll send a link to reset your password.</p>
                        <div class="form-group row">
                            {{Form::label('txtEmail', 'Email Address', ['class' => 'col-form-label col-md-4'])}}
                            <div class="col-md-8">
                                {{Form::email('txtEmail', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                            </div> 
                        </div>
                        {{Form::submit('Reset my password', ['class' => 'btn btn-primary float-right'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection