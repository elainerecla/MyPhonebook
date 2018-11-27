<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

use Auth;

class ProfileComposer{
    public function compose(View $view){
        $view->with('currentauth', Auth::user());
    }
}