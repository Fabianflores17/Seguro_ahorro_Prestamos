<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

use App\Models\Cliente;

class ClienteController extends Controller
{
    function __construct()
    {
        {
            $this->middleware('auth');
        }
         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
         //Con paginación
         $cliente = Cliente::paginate(5);
         return view('clientes.index',compact('cliente'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
   
        return view('clientes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            //'idcodigoasociado',
            'tipo_socio'=> 'required',
            'name'=> 'required',
            'email'=> 'required',
            'telefono' => 'required',
            'Estadocivil'=> 'required',
            'edad' => 'required',
            'lugar'=> 'required',
        ]);
        
        $cliente = new Cliente();
    $cliente->name = $request->input('name');
    $cliente->email = $request->input('email');
    $cliente->telefono = $request->input('telefono');
    $cliente->edad = $request->input('edad');
    $cliente->lugar = $request->input('lugar');
    $cliente->Estadocivil = $request->input('Estadocivil');
    $cliente->tipo_socio = $request->input('tipo_socio');

    if ($cliente->tipo_socio == '2') {
        $cliente->idcodigoasociado = $request->input('idcodigoasociado');
    } else {
        $cliente->idcodigoasociado = $this->generateCode();
    }

    $cliente->save();

    return redirect()->route('clientes.index')
        ->with('success','Cliente creado con éxito');
}
            private function generateCode()
{
    return 'CS-' . strtoupper(substr(sha1(time()),0,8));
}
    
        // Cliente::create($request->all());
    
        // return redirect()->route('clientes.index');
    //}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.editar',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
         request()->validate([
            'idcodigoasociado'=> 'required',
            'name'=> 'required',
            'email'=> 'required',
            'telefono' => 'required',
            'Estadocivil'=> 'required',
            'edad' => 'required',
            'lugar'=> 'required',
        ]);
    
        $cliente->update($request->all());
    
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
    
        return redirect()->route('clientes.index');
    }
}
