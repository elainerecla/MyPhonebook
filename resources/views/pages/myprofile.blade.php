@extends('layouts.app')

@section('content')
    <div class="container mb-5">
        <br/><br/>
        <div class="col-sm-10 mx-auto">
            <div class="card text-left">
                <div class="card-header ">
                    <h5>Edit Profile</h5>
                </div>
                <div class="card-body">
                    {{Form::open(['files' => true, 'method' => 'POST', 'onsubmit' => 'submitsignup()'])}}
                    @include('inc.message')
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="images/noimage.png" alt="profilepic" class="img-thumbnail" id="profilepic">
                                </div>
                                <div class="col-sm-4" style="overflow:hidden;">
                                    {{Form::label('fileUploadprofile', 'Upload your photo', ['class' => 'form-label'])}}
                                    {{Form::file('fileUploadprofile', $attributes = ['accept' => 'image/*', 'onchange' => 'readURL(this)'])}}
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <br/>
                            <div class="row">
                                <div class="col-sm-6 float-left">
                                    <p class="lead">Personal Information</p>
                                    <div class="form-group row">
                                        {{Form::label('txtLastname', 'Lastname', ['class' => 'col-form-label col-md-4'])}}
                                        <div class="col-md-8">
                                            {{Form::text('txtLastname', $currentauth->lastname, ['class' => 'form-control', 'placeholder' => 'Lastname'])}}
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('txtFirstname', 'Firstname', ['class' => 'col-form-label col-md-4'])}}
                                        <div class="col-md-8">
                                            {{Form::text('txtFirstname', $currentauth->firstname, ['class' => 'form-control', 'placeholder' => 'Firstname'])}}
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('rdbGender', 'Gender', ['class' => 'col-form-label col-md-4'])}}
                                        <div class="col-md-8">
                                            {{Form::radio('rdbGender', 'male', false)}}Male
                                            {{Form::radio('rdbGender', 'female', false)}}Female
                                        </div> 
                                    </div> 
                                    <div class="form-group row">
                                        {{Form::label('txtAddress', 'Address', ['class' => 'col-form-label col-md-4'])}}
                                        <div class="col-md-8">
                                            {{Form::textarea('txtAddress', $currentauth->address, ['class' => 'form-control', 'placeholder' => 'Address', 'rows' => '4'])}}
                                        </div> 
                                    </div>  
                                </div>

                                <div class="col-sm-6 float-left">
                                    <p class="lead">Contact Details</p>
                                    <div class="form-group row">
                                        {{Form::label('txtPhonenum', 'Phone number', ['class' => 'col-form-label col-md-4'])}}
                                        <div class="col-md-8">
                                            {{Form::text('txtPhonenum', $currentauth->phonenumber, ['class' => 'form-control', 'placeholder' => 'Phone number', 'maxlength' => '11'])}}
                                        </div> 
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('txtEmailAdd', 'Email Address', ['class' => 'col-form-label col-md-4'])}}
                                        <div class="col-md-8">
                                            {{Form::email('txtEmailAdd', $currentauth->emailadd, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                                        </div> 
                                    </div> 
                                </div>
        
                            </div>
                            
                        </div>
                    </div>
                    <br/>

                    <div class="row">
                        <div class="col-sm-4 text-right">
                                {{Form::submit('Save changes', ['class' => 'btn btn-primary col-sm-8'])}}
                        </div>             
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection