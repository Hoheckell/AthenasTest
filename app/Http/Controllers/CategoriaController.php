<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::get();
        return response()->json($categorias);
    }

    public function store(Request $request){

        $request->validate([
            'nome' => 'required',
        ]);
        $categoria = Categoria::create([
            'nome'=>$request->nome
        ]);
        return response()->json($categoria);
    }
    public function update($codigo,Request $request){

        $request->validate([
            'nome' => 'required',
        ]);
        $categoria = Categoria::find($codigo);
        $categoria->nome = $request->nome;
        $categoria->save();
        return response()->json($categoria);
    }
    public function delete($codigo){

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
