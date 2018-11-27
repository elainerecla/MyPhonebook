{{--Modal Signup Start--}}
<div class="modal fade" tabindex="-1" id="addcontact" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{Form::open(['action' => 'ContactController@store', 'files' => true, 'method' => 'POST'])}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="/images/noimage.png" alt="profilepic" class="img-thumbnail" id="profilepic">
                    </div>
                    <div class="col-sm-8" style="overflow:hidden;">
                        {{Form::label('fileUploadprofile', 'Upload your photo', ['class' => 'form-label'])}}
                        {{Form::file('fileUploadprofile', $attributes = ['accept' => 'image/*', 'onchange' => 'readURL(this)'])}}
                    </div>
                </div>
                <br/>
                <p class="lead">Personal Information</p>
                <div class="form-group row">
                    {{Form::label('txtLastname', 'Lastname', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::text('txtLastname', '', ['class' => 'form-control', 'placeholder' => 'Lastname'])}}
                    </div> 
                </div>
                <div class="form-group row">
                    {{Form::label('txtFirstname', 'Firstname', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::text('txtFirstname', '', ['class' => 'form-control', 'placeholder' => 'Firstname'])}}
                    </div> 
                </div>
                <div class="form-group row">
                    {{Form::label('rdbGender', 'Gender', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::radio('rdbGender', 'male', false)}}Male
                        {{Form::radio('rdbGender', 'female', false)}}Female
                    </div> 
                </div>
                
                <p class="lead">Contact Details</p>
                <div class="form-group row">
                    {{Form::label('txtPhonenum', 'Phone number', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::text('txtPhonenum', '', ['class' => 'form-control', 'placeholder' => 'Phone number', 'max-length' => '11'])}}
                    </div> 
                </div>
                <div class="form-group row">
                    {{Form::label('txtEmailAdd', 'Email Address', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::email('txtEmailAdd', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                    </div> 
                </div> 
                {{Form::hidden('txtUserIDAuth', $currentauth->id, ['class' => 'form-control'])}}
            </div>
            <div class="modal-footer">
                {{Form::submit('Save', ['class' => 'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{{--Modal Login End--}}