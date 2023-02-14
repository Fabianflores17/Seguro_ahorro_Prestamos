<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;

class VentaController extends Controller
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
        $vistaventa = DB::table('ventas')
        ->select('ventas.id', 'ventas.fecha_contacto', 'ventas.comentario','ventas.fecha_acuerdo','ventas.id_codigosocio','productos.name as nombreproducto', 'productos.anio','clientes.name as nombrecliente','users.name as usuariosname')
        ->join('productos', 'productos.id', '=', 'ventas.id_producto')
        ->join('clientes', 'clientes.idcodigoasociado', '=', 'ventas.id_codigosocio')
        ->join('users', 'users.id', '=', 'ventas.usuario_id')
        ->paginate(5);       
         //Con paginación
         //$venta = Venta::paginate(5);
         return view('ventas.index',compact('vistaventa'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $blogs->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $empleado = Cliente::all(); 
        $producto = producto::all(); 
        return view('ventas.crear',compact('empleado','producto'));
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
            'id_codigosocio'=> 'required',
            'id_producto'=> 'required',
            'fecha_acuerdo',
            'fecha_contacto' => 'required',
            'comentario'=> 'required',
            'usuario_id'=> 'required',
           
        ]);
        
       
    
        Venta::create($request->all());
    
        return redirect()->route('ventas.index');
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
    public function edit(Venta $venta)
    {
        return view('ventas.editar',compact('ventas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
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
    
        $venta->update($request->all());
    
        return redirect()->route('ventas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
    
        return redirect()->route('ventas.index');
    }
}
