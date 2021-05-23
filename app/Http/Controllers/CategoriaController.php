<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::paginate(5);
        return response()->json($categorias,200);
    }

    public function store(Request $request){

        try{
            $request->validate([
            'nome' => 'required',
            ]);
            Categoria::create([
                'nome'=>$request->nome
            ]);
            return response()->status(200);
        }catch (\Exception $e){
            Log::error($e->getMessage().' '.$e->getFile()." ".$e->getLine());
            return response($e->getMessage())->status(400);
        }
    }

    public function update($codigo,Request $request){

        try{
            $request->validate([
                'nome' => 'required',
            ]);
            $categoria = Categoria::find($codigo);
            $categoria->nome = $request->nome;
            $categoria->save();
            return response()->status(200);
        }catch (\Exception $e){
            Log::error($e->getMessage().' '.$e->getFile()." ".$e->getLine());
            return response($e->getMessage())->status(400);
        }
    }

    public function destroy($codigo){

        if(!empty($codigo)){
            try{
                Categoria::destroy($codigo);
                return response()->status(200);
            }catch (\Exception $e) {
                Log::error($e->getMessage().' '.$e->getFile()." ".$e->getLine());
                return response($e->getMessage())->status(400);
            }
        }else{
            Log::error('Código Inválido');
            return response('Código Inválido')->status(400);
        }

    }
    public function show($codigo){
        $categoria = Categoria::find($codigo);
        return response()->json($categoria);
    }
}
