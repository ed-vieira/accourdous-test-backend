<?php

namespace App\Facades\Email;
use Illuminate\Support\Facades\Facade;

class EmailValidator extends Facade {

    public static function getFacadeAccessor(){
       return \App\Services\Email\EmailValidator::class;
    }

}
