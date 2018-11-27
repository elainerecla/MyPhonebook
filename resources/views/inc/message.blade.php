@if (count($errors) > 0)
    @if($errors->has('fileUploadprofile'))
        <div class="alert alert-danger">
            Please upload your profile photo to proceed.
        </div>
    @elseif($errors->has('chkAgreeTerms'))
        <div class="alert alert-danger">
            You must agree to MyPhonebook terms and agreement.
        </div> 
    @else
        <div class="alert alert-danger">
            All fields are required!
        </div>
    @endif    
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif