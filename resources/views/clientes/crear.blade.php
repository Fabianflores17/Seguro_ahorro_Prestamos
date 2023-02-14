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

                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            
                        <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                    <label for="tipo_socio">Tipo</label>
                                    <select type="text" id="tipo_socio" name="tipo_socio" class="form-control">
                               
                                            <option value="1"> No asociado
                                            </option>   
                                            <option value="2"> Socio
                                            </option> 
                                        
                                    </select>
                                     </div>
                                
                                </div>

                         <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="idcodigoasociado">idsocio</label>
                                   <input type="text" id="idcodigoasociado" name="idcodigoasociado" class="form-control">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="name">Nombre</label>
                                   <input type="text" name="name" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="Email">Correo Electronico</label>
                                   <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="telefono">telefono</label>
                                   <input type="number" name="telefono" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="Estadocivil">Estado Civil</label>
                                   <input type="text" name="Estadocivil" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="edad">Edad</label>
                                   <input type="number" name="edad" class="form-control">
                                </div>
                            </div>
                  
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                    
                            <div class="form-group">
                                   <label for="lugar">Direccion</label>
                                   <input type="nutextmber" name="lugar" class="form-control">
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
