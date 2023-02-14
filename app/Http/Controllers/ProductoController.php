<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Producto;


class ProductoController extends Controller
{
    function __construct()
    {
        {
            $this->middleware('auth');
        }
         
    }
    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $vistaproducto = DB::table('productos')
        ->select('productos.id', 'productos.name', 'productos.anio','categorias.name as categoria')
        ->join('categorias', 'categorias.id', '=', 'productos.categoria_id') 
        ->paginate(5);
        //$categoria = Categoria::all();
       // $producto = Producto::paginate(10);
        return view('productos.index',compact('vistaproducto'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = Categoria::all(); 
        return view('productos.crear',compact('categoria'));
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
            'name'=> 'required',
            'anio'=> 'required',
            'categoria_id'=> 'required',
        ]);
    
        Producto::create($request->all());
    
        return redirect()->route('productos.index');
    }

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
    public function edit(Producto $producto)
    {
        $categoria = Categoria::all();
        
        return view('productos.editar',compact('producto', 'categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Producto $producto)
    {
        request()->validate([
            'name'=> 'required',
            'anio'=> 'required',
            'categoria_id'=> 'required',
        ]);
        $producto->update($request->all());
    
        return redirect()->route('productos.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
    
        return redirect()->route('productos.index');
    }
}
