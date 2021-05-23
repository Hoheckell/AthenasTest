<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PessoaController extends Controller
{
    public function index(){
        $pessoas = Pessoa::with('categoria')->paginate(5);
        return response()->json($pessoas,200);
    }
    public function store(Request $request){

        try {
            $request->validate([
                'nome' => 'required',
                'email' => 'email|required',
                'categoria_codigo' => 'required',
            ]);
            Pessoa::create([
                'nome' => $request->nome,
                'email' => $request->email,
                'categoria_codigo' => $request->categoria_codigo,
            ]);
            return response()->status(200);
        }catch (\Exception $e){
            Log::error($e->getMessage().' '.$e->getFile()." ".$e->getLine());
            return response($e->getMessage())->status(400);
        }
    }

    public function update($codigo,Request $request){

        try {
            $request->validate([
                'nome' => 'required',
            ]);
            $pessoa = Pessoa::find($codigo);
            $pessoa->nome = $request->nome;
            $pessoa->email = $request->email;
            $pessoa->categoria_codigo = $request->categoria_codigo;
            $pessoa->save();
            return response()->status(200);
        }catch (\Exception $e){
            Log::error($e->getMessage().' '.$e->getFile()." ".$e->getLine());
            return response($e->getMessage())->status(400);
        }
    }
    public function destroy($codigo){

        if(!empty($codigo)){
            try{
                Pessoa::destroy($codigo);
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
        $pessoa = Pessoa::find($codigo);
        return response()->json($pessoa);
    }
}
