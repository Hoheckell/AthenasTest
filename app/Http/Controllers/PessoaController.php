<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PessoaController extends Controller
{
    public function index(){
        $pessoas = Pessoa::with('categoria')->get();
        return response()->json($pessoas);
    }
    public function store(Request $request){

        $request->validate([
            'nome' => 'required',
            'email' => 'email|required',
            'categoria_codigo' => 'required',
        ]);

        $pessoa = Pessoa::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'categoria_codigo' => $request->categoria_codigo,
        ]);
        return response()->json($pessoa);
    }

    public function update($codigo,Request $request){

        $request->validate([
            'nome' => 'required',
        ]);
        $pessoa = Pessoa::find($codigo);
        $pessoa->nome = $request->nome;
        $pessoa->email = $request->email;
        $pessoa->categoria_codigo = $request->categoria_codigo;
        $pessoa->save();
        return response()->json($pessoa);
    }
    public function destroy($codigo){

        if(!empty($codigo)){
            try{
                Pessoa::delete($codigo);
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
