<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class Tbluser extends Authenticatable
{
    //
    protected $table = 'tblusers';

    protected $fillable = ['emailadd',  'password'];

    protected $hidden = ['password',  'remember_token'];
}
