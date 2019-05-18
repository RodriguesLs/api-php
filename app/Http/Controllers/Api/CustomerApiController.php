<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cliente;

class CustomerApiController extends Controller
{
    public function __construct(Cliente $cliente, Request $request)
    {
        $this->cliente = $cliente;
        $this->request = $request;
    }
    public function index() {
        $data = $this->cliente->all();
        // dd($data); funcionalidade para debugar, neste caso estou debugando a variável $data
        return response()->json($data);
    }
}
