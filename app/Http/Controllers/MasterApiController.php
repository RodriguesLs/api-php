<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class MasterApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index() 
    {
        $data = $this->model->all();
        // dd($data); funcionalidade para debugar, neste caso estou debugando a variável $data
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->model->rules());
        $dataForm = $request->all();

        if($request->hasFile($this->upload) && $request->file($this->upload)->isValid()){
            $extension = $request->image->extension();
            $name = uniqid(date('His'));
            $nameFile = "{$name}.{$extension}";
            $upload = image::make($dataForm[$this->upload])->resize(177, 236)->save(storage_path("app/public/{$this->path}/$nameFile", 70));

            if(!$upload){
                return response()->json(['error'=> 'Upload failed'], 500);
            }else{
                $dataForm[$this->upload] = $nameFile;
            }
        }

        $data = $this->model->create($dataForm);
        return response()->json($data, 201);
    }

    public function show($id)
    {
        if(!$data = $this->model->find($id)){
            return response()->json(['error' => 'Nada foi localizado, tente outro id'], 400);
        }else{
            return response()->json($data);
        }
    }

    public function update(Request $request, $id){
        
        if(!$data = $this->model->find($id))
            return response()->json(['error' => 'Conteúdo não encontrado'], 404);
        
        $this->validate($request, $this->model->updateRules());
        $dataForm = $request->all();
        
        if($data->image){
            Storage::disk('public')->delete("/{$this->path}/$data->image");
        }

        if($request->hasFile($this->upload) && $request->file($this->upload)->isValid()){
            
            $extension = $request->image->extension();
            $name = uniqid(date('His'));
            $nameFile = "{$name}.{$extension}";
            $upload = image::make($dataForm[$this->upload])->resize(177, 236)->save(storage_path("app/public/{$this->path}/{$nameFile}", 70));

            if(!$upload){
                return response()->json(['error'=> 'Upload failed'], 500);
            }else{
                $dataForm[$this->upload] = $nameFile;
            }
        }

        $data->update($dataForm);
        return response()->json($data, 200);

        
    }
    
    public function destroy($id){
        
        if(!$data = $this->model->find($id))
            return response()->json(['error' => 'Parâmetros não encontrados'], 404);
        if($data->upload){
            Storage::disk('public')->delete("/{$data->path}/$data->upload");
        }
        $data->delete();
        return response()->json(['success' => 'Dados deletados com sucesso'], 204);
    }
}
