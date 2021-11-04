<?php

namespace App\Http\Controllers\WebServices;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Facades\Http\HttpService;

class ViaCep extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {
        $url = "https://viacep.com.br/ws/{$request->cep}/json/";
        $data['endereco'] = HttpService::get($url);
        return response()->json($data);
    }
}
