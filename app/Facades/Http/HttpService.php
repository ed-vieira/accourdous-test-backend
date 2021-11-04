<?php

namespace App\Facades\Http;
use Illuminate\Support\Facades\Facade;

class HttpService extends Facade {

    public static function getFacadeAccessor(){
       return \App\Services\Http\HttpService::class;
    }

}
