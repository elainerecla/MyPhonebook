{{--Modal Login Start--}}
<div class="modal fade" tabindex="-1" id="forgotpassword" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reset your password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- {!! Form::open(['action' => 'UserAccntController@index']) !!} --}}
            <div class="modal-body">
                <div class="form-group row">
                    {{Form::label('txtEmail', 'Email Address', ['class' => 'col-form-label col-md-4'])}}
                    <div class="col-md-8">
                        {{Form::email('txtEmail', '', ['class' => 'form-control', 'placeholder' => 'Email Address'])}}
                    </div> 
                </div>
            </div>
            <div class="modal-footer">
                {{Form::submit('Reset my password', ['class' => 'btn btn-primary'])}}
            </div>
            {{-- {!! Form::close() !!} --}}
        </div>
    </div>
</div>
{{--Modal Login End--}}