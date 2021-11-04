<?php

namespace App\Http\Controllers\WebServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\Email\EmailValidator;

class VerifyEmail extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data['email'] = $request->email;
        $data['valid'] = EmailValidator::check($request->email);
        return response()->json($data);
    }
}
