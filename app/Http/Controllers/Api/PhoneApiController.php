<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\MasterApiController;
use App\Models\Phone;

class PhoneApiController extends MasterApiController
{
    protected $model;
    protected $path;
    protected $upload;

    public function __construct(Phone $phone, Request $request)
    {
        $this->model = $phone;
        $this->request = $request;
    }

    public function customer($id){
        if(!$data = $this->model->with('customer')->find($id)){
            return response()->json(['error' => 'data not found'], 404);
        }else{
            return response()->json($data);
        }
    }
}
