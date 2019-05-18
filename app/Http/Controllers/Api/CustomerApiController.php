<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class CustomerApiController extends Controller
{
    public function __construct(Customer $customer, Request $request)
    {
        $this->customer = $customer;
        $this->request = $request;
    }

    public function index() {
        $data = $this->customer->all();
        // dd($data); funcionalidade para debugar, neste caso estou debugando a variável $data
        return response()->json($data);
    }

    public function store(Request $request){
        
        $this->validate($request, $this->customer->rules());
        $dataForm = $request->all();
        $data = $this->customer->create($dataForm);
        return response()->json($data, 201);
    }

}
