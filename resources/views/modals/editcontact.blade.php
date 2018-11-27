{{--Modal Signup Start--}}
<div class="modal fade" tabindex="-1" id="editcontact-{{$contact->id}}" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{Form::open(['action' => ['ContactController@update', $contact->id], 'files' => true, 'method' => 'PATCH'])}}
            <div class="modal-body">
                <div class="row">
                    @include('inc.message')
                    
                    <div class="col-sm-4"> 
                        <img src="/images/noimage.png" alt="profilepic" class="img-thumbnail" id="profilepic">
                    </div>
                    <div class="col-sm-8" style="overflow:hidden;">
                        {{Form::label('fileUploadprofile', 'Update photo', ['class' => 'form-label'])}}
                        {{Form::file('fileUploadprofile', $attributes = ['accept' => 'image/*', 'onchange' => 'readURL(this)'])}}
                    </div>
                </div>
                <br/>
                <p class="lead">Personal Information</p>
                <div class="form-group row">
                    {{Form::label('txtLastname', 'Lastname', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::text('txtLastname', $contact->lastname, ['class' => 'form-control', 'placeholder' => 'Lastname'])}}
                    </div> 
                </div>
                <div class="form-group row">
                    {{Form::label('txtFirstname', 'Firstname', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::text('txtFirstname', $contact->firstname, ['class' => 'form-control', 'placeholder' => 'Firstname'])}}
                    </div> 
                </div>
                <div class="form-group row">
                    {{Form::label('rdbGender', 'Gender', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        @if ($contact->gender == "male")
                            {{Form::radio('rdbGender', 'male', true)}}Male
                            {{Form::radio('rdbGender', 'female', false)}}Female
                        @else
                            {{Form::radio('rdbGender', 'male', false)}}Male
                            {{Form::radio('rdbGender', 'female', true)}}Female
                        @endif
                        
                    </div> 
                </div>
                
                <p class="lead">Contact Details</p>
                <div class="form-group row">
                    {{Form::label('txtPhonenum', 'Phone number', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::text('txtPhonenum', $contact->phonenumber, ['class' => 'form-control', 'placeholder' => 'Phone number'])}}
                    </div> 
                </div>
                <div class="form-group row">
                    {{Form::label('txtEmailAdd', 'Email Address', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::text('txtEmailAdd', $contact->emailadd, ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                    </div> 
                </div> 
            </div>
            <div class="modal-footer">
                {{Form::submit('Update', ['class' => 'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{{--Modal Login End--}}