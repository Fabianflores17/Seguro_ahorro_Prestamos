@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Transacciones de los clientes o Asociados</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                  
                        <a class="btn btn-warning" href="{{ route('ventas.create') }}">Nuevo</a>
                        <input type="text" id="buscar" onkeyup="buscar()" placeholder="Buscar en tabla" title="Empieza a escribir para buscar">
                        <table class="table table-striped mt-2" id="tabla">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">idcodigoasociado</th>
                                    <th style="color:#fff;">Nombre</th>                                    
                                    <th style="color:#fff;">Producto</th> 
                                    <th style="color:#fff;">fecha de contaco</th>                                    
                                    <th style="color:#fff;">fecha indicada para adquirir el servicio</th>    
                                    <th style="color:#fff;">comentarios</th>  
                                    <th style="color:#fff;">Usuario Atendio</th>      
                                    <th style="color:#fff;">Accion</th>                                                             
                              </thead>
                              <tbody>
                            @foreach ($vistaventa as $ventaa)
                            <tr>
                                <td style="display: none;">{{ $ventaa->id }}</td>
                                <td>{{ $ventaa->id_codigosocio}}</td>                                
                                <td>{{ $ventaa->nombrecliente }}</td>
                                <td>{{ $ventaa->nombreproducto }}</td>
                                <td>{{ $ventaa->fecha_contacto}}</td>
                                <td>{{ $ventaa->fecha_acuerdo }}</td>
                                <td>{{ $ventaa->comentario }}</td>
                                <td>{{ $ventaa->usuariosname }}</td>
                                <td>
                                    <form action="{{ route('ventas.destroy',$ventaa->id) }}" method="POST">                                        
                                       
                                <!-- <a class="btn btn-info" href="{{ route('ventas.edit',$ventaa->id) }}">Editar</a> -->
                                  

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
                            {!! $vistaventa ->links() !!}
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
