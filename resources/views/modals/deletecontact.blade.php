{{--Modal Signup Start--}}
<div class="modal fade" tabindex="-1" id="deletecontact" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Contact</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{Form::open(['action' => ['ContactController@destroy', $contact->id]])}}
            <div class="modal-body">
                <br/>
                <p class="lead">Are you sure you want to delete this user?</p>
            </div>
            <div class="modal-footer">
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::button('No', ['class' => 'btn btn-default'])}}
                {{Form::submit('Yes', ['class' => 'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{{--Modal Login End--}}