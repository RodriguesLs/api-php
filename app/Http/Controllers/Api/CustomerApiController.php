<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class CustomerApiController extends Controller
{
    public function __construct(Customer $customer, Request $request)
    {
        $this->customer = $customer;
        $this->request = $request;
    }

    public function index() 
    {
        $data = $this->customer->all();
        // dd($data); funcionalidade para debugar, neste caso estou debugando a variável $data
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->customer->rules());
        $dataForm = $request->all();

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $extension = $request->image->extension();
            $name = uniqid(date('His'));
            $nameFile = "{$name}.{$extension}";
            $upload = image::make($dataForm['image'])->resize(177, 236)->save(storage_path("app/public/customers/$nameFile", 70));

            if(!$upload){
                return response()->json(['error'=> 'Upload failed'], 500);
            }else{
                $dataForm['image'] = $nameFile;
            }
        }

        $data = $this->customer->create($dataForm);
        return response()->json($data, 201);
    }

    public function show($id)
    {
        if(!$data = $this->customer->find($id)){
            return response()->json(['error' => 'Nada foi localizado, tente outro id']);
        }else{
            return response()->json($data);
        }
    }

}
