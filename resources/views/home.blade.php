@extends('layouts.app')

@section('content')
<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                          
                                <div class="row">
                                    <div class="col-md-4 col-xl-4">
                                    
                                    <div class="card bg-blue order-card">
                                            <div class="card-block">
                                            <h5>Clientes</h5>                                               
                                                @php
                                                use App\Models\Cliente;
                                                $Clientes = Cliente::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fa fa-users f-left"></i><span>{{$Clientes}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/clientes" class="text-dark">Ver más</a></p>
                                            </div>                                            
                                        </div>                                    
                                    </div>
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-green order-card">
                                            <div class="card-block">
                                            <h5>Ventas</h5>                                               
                                                @php
                                                use App\Models\Venta;;
                                                 $Ventas = Venta::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-shopping-cart"></i><span>{{$Ventas}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/ventas" class="text-dark">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>                                                                
                                    
                                    <div class="col-md-4 col-xl-4">
                                        <div class="card bg-pink order-card">
                                            <div class="card-block">
                                                <h5>Productos</h5>                                               
                                                @php
                                                 use App\Models\Producto;
                                                $Productos = Producto::count();                                                
                                                @endphp
                                                <h2 class="text-right"><i class="fas fa-search-plus"></i><span>{{$Productos}}</span></h2>
                                                <p class="m-b-0 text-right"><a href="/productos" class="text-dark">Ver más</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
