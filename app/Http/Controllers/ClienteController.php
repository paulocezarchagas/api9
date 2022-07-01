<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Facade\FlareClient\Http\Client;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::all();
    }


    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'uf'=>'required'
        ]);
        return Cliente::create($request->all());
    }

    
    public function show($id)
    {
        $cliente = Cliente::with('departamento')->find($id);
        return $cliente;
        //return Cliente::findOrFail($id); retorna todos
    }

    
    public function search($nome){
        return Cliente::where('nome', 'like', '%'.$nome.'%')->get(); 
    }

    
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return $cliente;
    }

    
    public function destroy($id)
    {
        //return Cliente::destroy($id); 
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->deletar();            
        }
        
    }


    public function enderecoFilter($endereco){
        return Cliente::where('endereco', 'like', '%'.$endereco.'%')->get(); 
    }
}
