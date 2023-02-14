@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">CLIENTE</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">     
                                                                      
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif

                    <form action="{{ route('ventas.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label for="id_codigosocio">Cliente</label>
                                    <select type="text" name="id_codigosocio" class="form-control">
                                    <option > Seleccione el Cliente 
                                            </option>   
                                        @foreach ($empleado as $emp)
                                            <option value="{{$emp['idcodigoasociado']}}"> {{$emp['idcodigoasociado']}}  {{$emp['name']}}  
                                            </option>   
                                             @endforeach
                                    </select>
                                     </div>
                                
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label for="id_producto">Producto</label>
                                    <select type="text" name="id_producto" class="form-control">
                                    <option > Seleccione el Producto que Desea agregar 
                                            </option>    
                                    @foreach ($producto as $product)
                                            <option value="{{$product['id']}}"> {{$product['name']}}  {{$product['anio']}}  
                                            </option>   
                                             @endforeach
                                    </select>
                                     </div>
                                
                                </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="fecha_contacto">Fecha de Contacto</label>
                                   <input type="Date" id="fecha_contacto" name="fecha_contacto" class="form-control">
                                </div>
                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="fecha_acuerdo">Fecha Probable de Adquisicion</label>
                                   <input type="Date" id="fecha_acuerdo" name="fecha_acuerdo" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label for="usuario_id">Usuario Atendio</label>
                                    <select type="text" name="usuario_id" class="form-control">
                                   
                                            <option value="{{ Auth::user()->id }}">  {{ Auth::user()->name }} 
                                            </option>   
                                 
                                    </select>
                                     </div>
                                
                                </div>
                       
                         
                          
                        
                  
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    
                            <div class="form-group">
                                   <label for="comentario">Comentario</label>
                                   <input type="text" name="comentario" class="form-control">
                                </div>
                            </div>
                         

                            <button type="submit" class="btn btn-primary">Guardar</button>                            
                        </div>
                    </form>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <script>
        document.getElementById('tipo_socio').onchange=function(){
            const tiposocio = document.getElementById('tipo_socio').value;
            const idcodigo_asociado = document.getElementById('idcodigoasociado');
        if(tiposocio==1){
            idcodigo_asociado.setAttribute('disabled',true);
        }else{
            idcodigo_asociado.setAttribute('disabled',false);
        }   
        }
    //     function validartipo(){
    //     //const tiposocio = document.getElementById('tipo_socio').value;

    //     const idcodigo_asociado = document.getElementById('idcodigoasociado');
    //     if(tiposocio==1){
    //         idcodigo_asociado.setAttribute('disabled',true);
    //     }else{
    //         idcodigo_asociado.setAttribute('disabled',false);
    //     }
    // }


    </script> -->
@endsection
