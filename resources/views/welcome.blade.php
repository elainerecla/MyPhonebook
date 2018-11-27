@if (Auth::guest())
    @include('pages.index')
@else
    @include('pages.dashboard')
@endif 