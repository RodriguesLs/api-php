<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Controllers\MasterApiController;


class CustomerApiController extends MasterApiController
{
    protected $model;
    protected $path = 'customers';
    protected $upload = 'image';

    public function __construct(Customer $customers, Request $request)
    {
        $this->model = $customers;
        $this->request = $request;
    }

    public function document($id){
        if(!$data = $this->model->with('document')->find($id)){
            return response()->json(['error' => 'data not found'], 404);
        }else{
            return response()->json($data);
        }
    }

    public function phones($id){
        if(!$data = $this->model->with('phone')->find($id)){
            return response()->json(['error' => 'data not found'], 404);
        }else{
            return response()->json($data);
        }
    }

}