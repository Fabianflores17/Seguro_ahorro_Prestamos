@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">clientes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                  
                        <a class="btn btn-warning" href="{{ route('clientes.create') }}">Nuevo</a>
                        <input type="text" id="buscar" onkeyup="buscar()" placeholder="Buscar en tabla" title="Empieza a escribir para buscar">
                        <table class="table table-striped mt-2"  id="tabla">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">idcodigoasociado</th>
                                    <th style="color:#fff;">Nombre</th>                                    
                                    <th style="color:#fff;">Email</th> 
                                    <th style="color:#fff;">telefono</th>                                    
                                    <th style="color:#fff;">lugar</th>    
                                    <th style="color:#fff;">Acciones</th>                                                                  
                              </thead>
                              <tbody>
                            @foreach ($cliente as $client)
                            <tr>
                                <td style="display: none;">{{ $client->id }}</td>
                                <td>{{ $client->idcodigoasociado}}</td>                                
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->telefono }}</td>
                                <td>{{ $client->lugar}}</td>
                                <td>
                                    <form action="{{ route('clientes.destroy',$client->id) }}" method="POST">                                        
                                       
                                        <a class="btn btn-info" href="{{ route('clientes.edit',$client->id) }}">Editar</a>
                                  

                                        @csrf
                                        @method('DELETE')
                                      <button type="submit" class="btn btn-danger">Borrar</button>
                               
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $cliente->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function busqueda() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("buscar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function busquedaJQsimple() {
  var filtro = $("#buscar").val().toUpperCase();

  $("#tabla tbody tr").each(function() {
    texto = $(this).children("td:eq(0)").text().toUpperCase();
    
    if (texto.indexOf(filtro) < 0) {
      $(this).hide();
    } else{
      $(this).show();
    }
      
    
  });
  
}

function buscar(){
  
  var filtro = $("#buscar").val().toUpperCase();
  
  $("#tabla td").each(function() {
    var textoEnTd = $(this).text().toUpperCase();
    if(textoEnTd.indexOf(filtro)>=0){
      $(this).addClass("existe");
    }else{
      $(this).removeClass("existe");
    }
  })
  
  $("#tabla tbody tr").each(function(){
    if($(this).children(".existe").length>0){
      $(this).show();
    }else{
      $(this).hide();
    }
  })
  
}

function busquedaJQmultiple() {
  var filtro = $("#buscar").val().toUpperCase();

  $("#tabla tbody tr").each(function() {
    
    $(this).children("td").each(function() {
        var texto = $(this).text().toUpperCase();
        
        if (texto.indexOf(filtro) < 0) {
          $(this).addClass("sin");
        }else{
          $(this).removeClass("sin");
        }
    });
    
    // nTds = la cantidad de <td> en el <tr> evaluado
    nTds = $(this).children("td").length
    // nTdsSin = la cantidad de <td> con la clase ".sin" en el <tr> evaluado
    nTdsSin = $(this).children(".sin").length

    if(nTdsSin==nTds){
      //$(this).hide()
      $(this).addClass("noTiene");
    }else{
      //$(this).show()
       $(this).removeClass("noTiene");
    }
    
  });
  
}
    </script>
@endsection
