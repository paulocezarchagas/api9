<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Departamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartamentoController extends Controller 
{
    
    public function index()
    {
        return Departamento::all();
    }

    
    public function store(Request $request, $id)
    {
        $cliente = Departamento::find($id);
        if($cliente){                       
            return Departamento::create($request->all());
        }
    }

    
    public function show($id)
    {
        return Departamento::findOrFail($id);
    }

    public function search($nome){
        return Departamento::where('nome', 'like', '%'.$nome.'%')->get(); 
    }

    
    public function update(Request $request, $idCli, $idDep)
    {
        $cliente = Cliente::findOrFail($idCli); 
        if($cliente){
            $departamento = Departamento::findOrFail($idDep); 
            if($departamento){
                $departamento->update($request->all());
                return $departamento;
            }
        }
    }



    
    public function destroy($id)
    {
        return Departamento::destroy($id); 
    }



}
