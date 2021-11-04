<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\AsUser;

class API_Controller extends Controller
{
    use AsUser;

    public function __construct() {
        $this->middleware('auth:api');
    }

}
