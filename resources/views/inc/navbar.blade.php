{{--Navbar--}}
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #15403d;">
    @if (Auth::guest())
        <a class="navbar-brand" href="/">My Phonebook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    @else
        <a class="navbar-brand" href="/">My Phonebook</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
         
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Dashboard <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="accountdropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src= {{route('account.image', ['filename' => $currentauth->photofilename])}} alt="profile picture" width="48px;"> {{$currentauth->firstname}} {{$currentauth->lastname}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="accountdropdown">
                    <a class="dropdown-item" href="/myprofile">My Profile</a>
                    <a class="dropdown-item" href="#">Change Password</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    @endif
</nav> 
{{--End Navbar--}}