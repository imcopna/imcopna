$(document).ready(mainEventos);
function mainEventos(){
    mostrarDatosEventos("",1);
    $("input[name=txtBuscarEventos]").keyup(function(){
      textobuscar =$(this).val();
      mostrarDatosEventos(textobuscar,1);
    });
    $("body").on("click",".paginacion li a",function(e){
      e.preventDefault();
      valorhref=$(this).attr("href");
      valorBuscar=$("input[name=txtBuscarEventos]").val();
      mostrarDatosEventos(valorBuscar,valorhref);
    });

mod_fechas();
   
  
        

//        $('#una').css('display','none');

        $('input:radio[name=optradio]').click(function(event) {
          mod_fechas();
        });


          $("#form_eventos").validate({
            rules: {
                titulo: {
                    required: true,
                },
                categorias: {
                    required: true,
                },
               descripcion: {
                      required: true,
                },
               
              },
              messages: {
                  titulo: {
                      required: "Ingrese un título"
                  },
                  categorias: {   
                      required: "Ingrese una categoría"
                  },
                  descripcion: {
                      required: "Ingrese una descripción"
                  },

              }
        });

          $('#form_fechas_eventos').validate({
               rules: {
                  fecha_ini: {
                      required: true,
                  },
                  fecha_fin: {
                      required: true,
                  },
                  fecha: {
                        required: true,
                  },
                  
                 
              },
              messages: {
                  fecha_ini: {
                    required: "Ingrese Fecha Inicial",
                  },
                  fecha_fin: {
                      required: "Ingrese Fecha Final",
                  },
                  fecha: {
                        required: "Ingrese la Fecha",
                  },
                   
              },
          });

          $('#form_video_evento').validate({
                rules: {
                  video_url: {
                      url: true,
                      required: true,
                  },
                  },
              messages: {
                  video_url: {
                    url: "Ingrese una url correcta por favor",
                    required: "Ingrese una url",
                  },
  
              },
          });
               document.getElementById('files').addEventListener('change', archivo, false);

}
function mod_fechas(){
 var valor = $('input:radio[name=optradio]:checked').val();
            if(valor =="rango"){

                $('#rango').css('display','block');
                $('#una').css('display','none');
                //seteo
                  
                   estado_fechas(0);
                   

            }else{
                 $('#una').css('display','block');
                 $('#rango').css('display','none');

                 //seteo
                  
                   estado_fechas(1);

            }

}
function mostrarDatosEventos(valorBuscar,pagina){
  $.ajax({
    url:base_url('eventos/mostrar'),
    type:"POST",
    dataType:"json",
    data:{buscar:valorBuscar,nropagina:pagina},
    success: function(response){
    //  console.log(response);
      filas ="";
      $.each(response.eventos,function(key,item){
        filas+="<tr style='background-color:#fff'><td class='text-center'>"+item.IDent_Evento+"</td><td>"+item.Titulo+"</td><td class='text-center'>";
        if(item.IDent_002_Estado==1){

         filas+="<i style='color:#77E46D;font-weight:bold' class='fa fa-check-circle' aria-hidden='true'></i>";

         }else{

        filas+="<i style='color:darkgray;font-weight:bold' class='fa fa-times-circle' aria-hidden='true'></i>";

      }

        filas+="</td><td class='text-center'>";

         if(item.Principal==1){

         filas+="<i style='color:gold;font-weight:bold' class='fa fa-star' aria-hidden='true'></i>";

         }else{

        filas+="<i style='color:darkgray;font-weight:bold' class='fa fa-star' aria-hidden='true'></i>";

      }
        


         filas+="</td><td class='text-center'>"+item.Nombre+"</td><td class='text-center' style='text-transform:uppercase;'>"+item.Usuario_creacion+"</td><td class='text-center'>"+item.Fecha_creacion+"</td><td class='text-center'>"+item.Vistos+"</td>"+
        "<td class='text-center'><a href='"+base_url("eventos/crud/"+item.IDent_Evento)+"'><i style='color:#222D32;font-weight:bold;' class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td><td class='text-center'><a onclick='deletes("+item.IDent_Persona+")'><i style='color:red;font-weight:bold;' class='fa fa-trash-o' aria-hidden='true'></i></a></td>"+
        "</tr>";
      });
      $('#tbeventos').html(filas);
      linkseleccionado= Number(pagina);
      //total de registros
      totalregistros =response.totalregistros;

      //cantidad deregistros por paginaci
      cantidadregistros = response.cantidad;

      numerolinks= Math.ceil(totalregistros/cantidadregistros);
      paginador="<ul class='pagination'>";

        if(linkseleccionado>1){
          paginador+="<li><a href='1'>&laquo;</a></li>";
          paginador+="<li><a href='"+(linkseleccionado-1)+"'>&lsaquo;</a></li>";
        }else{
          paginador+="<li class='disabled'><a href='#'>&laquo;</a></li>";
          paginador+="<li class='disabled'><a href='#'>&lsaquo;</a></li>";
        }

        //muestro de los enlaces
        //cantidad de link hacia atras y adelante
        cant=2;
        //inicio de donde se va mostrar los linkseleccionado
        pagInicio  =(linkseleccionado>cant)?(linkseleccionado-cant):1;
        //condicion en la cual establecemnos el fin de los link
        if(numerolinks>cant)
{
        pagRestantes =numerolinks  - linkseleccionado;
        pagFin =(pagRestantes>cant)?(linkseleccionado+cant):numerolinks;
}else{
  pagFin =numerolinks;
}

    for (var i = pagInicio; i <=pagFin; i++){
        if(i==linkseleccionado)
            paginador+="<li class='active'><a href='javascript:void(0)'>"+i+"</a></li>";
          else
            paginador+="<li><a href='"+i+"'>"+i+"</a></li>";
      }
      if(linkseleccionado<numerolinks){
        paginador+="<li><a href='"+(linkseleccionado+1)+"'>&rsaquo;</a></li>";
        paginador+="<li><a href='"+numerolinks+"'>&raquo;</a></li>";
      }else{
        paginador+="<li class='disabled'><a href='#'>&rsaquo;</a></li>";
        paginador+="<li class='disabled'><a href='#'>&raquo;</a></li>";
      }
        paginador+="</ul>";
        $(".paginacion").html(paginador);
    }
  });
}

function grabarevento(btn){

  var a= $('#form_eventos').valid();

if(a){
  var titulo = $('#titulo').val();
  var descripcion =$('#descripcion').val();
  var contenido = tinyMCE.get('cont');
  
  alert(titulo);
  
  var categoria =$('#categorias').val();

  var id = $('#hidden_id').val();
  if(id!=0){
    url = base_url('eventos/grabar/'+id);
  }else{
    url = base_url('eventos/grabar');
  }

   $.ajax({
    url: url,
    type:"POST",
    dataType:"json",
    beforeSend: function(){
        loader(btn);
    },
    data:{categoria:categoria,titulo:titulo,descripcion:descripcion,contenido:contenido.getContent()},
    success:function(data){
      if(data.estado){
          $('.loader-content').remove();

      }else{
        redirect(data.href);
      }

    }
});
 }
}

 function grabarestado(boton){
  var id = $('#hidden_id').val();
  var estado = $('#activo:checked').val();


  $.ajax({
    url: base_url('eventos/update_estado'),
    type: 'POST',
    dataType: 'json',
    beforeSend: function(){
        loader(boton);
    },
    data: {id:id,estado:estado},
  })
  .done(function(resp) {
    if(resp.estado){
    $('.loader-content').remove();
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
 }

 function grabarDestacado(boton){
  var id = $('#hidden_id').val();
  var destacado = $('#destacado:checked').val();

 

  $.ajax({
    url: base_url('eventos/update_principal'),
    type: 'POST',
    dataType: 'json',
    beforeSend: function(){
      loader(boton);
    },
    data: {id:id,destacado:destacado},
  })
  .done(function(resp) {
    if(resp.estado){
      $('.loader-content').remove();
    }
  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
 }

function archivo(evt) {
  var files = evt.target.files; // FileList object
  // Obtenemos la imagen del campo "file".
  for (var i = 0, f; f = files[i]; i++) {
  //Solo admitimos imágenes.
  if (!f.type.match('image.*')) {
  continue;
  }
  var reader = new FileReader();
  reader.onload = (function (theFile) {
  return function (e) {
    // Insertamos la imagen
    document.getElementById("list").innerHTML = ['<img class="thumb"  src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
  };
   })(f);
        reader.readAsDataURL(f);
        }
        }

function grabarimagenEvento(btn){
var formData = new FormData($('#form-evento-imagen')[0]);
  


$.ajax({
  url:base_url("eventos/grabarimagenEvento"),
  type:'post',
  dataType:'json',
  data:formData,
  cache:false,
  contentType:false,
  processData:false,
  beforeSend:function(){
    loader(btn);
  },
  success: function(resp){
    console.log(resp);
    $('.eliminar').remove();
    if(resp.estado){
    $('.btn-eliminar').append('<button  type="button" class="btn btn-danger eliminar" onclick="eliminarImagen(this)"><i style="color: white" class="fa fa-trash"></i> Eliminar</button>');
    color = "success";
    mensaje  = resp.mensaje;
  }else{
    color = "danger";
    mensaje  = resp.mensaje;
  }

  $('.loader-content').remove();
  $('.alert').remove();

  var form  = $(btn).closest('form');
  form.prepend("<div class='alert alert-"+color+" alert-dismissable'>"+
  "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+
  "<strong>Atención!</strong> "+mensaje+"</div>");

  $('#imagen_hidden').val(resp.img);
}
});

}

function grabar_video(btn){
   var a=$('#form_video_evento').valid();
  if(a){
  var video = $('#video_url').val();
  var id= $('#hidden_id').val();
  $.ajax({
    url: base_url('eventos/grabarvideo'),
    type: 'post',
    dataType: 'json',
    data: {video:video,id:id},
    beforeSend: function(){
      loader(btn);
    },
  })
  .done(function(resp) {
    var form  = $(btn).closest('form');
      $('.alert').remove();

if(resp.estado){
  $('.loader-content').remove();
  $('.thumb-video').remove();
  $('.btn-eliminarvideo').append('<button  type="button" class="btn btn-danger eliminarvideo" onclick="eliminarVideo(this)"><i style="color: white" class="fa fa-trash"></i> Eliminar</button>');

    var color ="success";
   form.append("<iframe class='thumb-video' width='560' height='315' src='https://www.youtube.com/embed/"+resp.respuesta+"' frameborder='0' gesture='media' allow='encrypted-media' allowfullscreen></iframe>");

}else{
  var color = "danger";
}
 form.prepend("<div class='alert alert-"+color+" alert-dismissable'>"+
  "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+
  "<strong>Atención!</strong> "+resp.mensaje+"</div>");

  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  }
}

function eliminarImagen(btn){
  var id= $('#hidden_id').val();
  var imagen = $('#imagen_hidden').val();
  $.ajax({
    url: base_url('eventos/eliminarImagen'),
    type: 'post',
    dataType: 'json',
    data: {id:id,imagen:imagen},
    beforeSend:function(){
      loader(btn);
    },
  })
  .done(function(resp) {
      var form  = $(btn).closest('form');
      $('.alert').remove();


    if(resp.estado){     
     $('.loader-content').remove();
     $('.thumb').remove();
     $('.eliminar').remove();
      var color ="success";
    }else{
      $('.loader-content').remove();

      var color ="danger";
    }
 form.prepend("<div class='alert alert-"+color+" alert-dismissable'>"+
  "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+
  "<strong>Atención!</strong> "+resp.mensaje+"</div>");

  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}

function eliminarVideo(btn){
  var id= $('#hidden_id').val();
  $.ajax({
    url: base_url('eventos/eliminarVideo'),
    type: 'post',
    dataType: 'json',
    data: {id:id},
    beforeSend:function(){
      loader(btn);
    },
  })
  .done(function(resp) {
      var form  = $(btn).closest('form');
      $('.alert').remove();


    if(resp.estado){     
     $('.loader-content').remove();
     $('.thumb-video').remove();
     $('.eliminarvideo').remove();
      var color ="success";
    }else{
      $('.loader-content').remove();

      var color ="danger";
    }
 form.prepend("<div class='alert alert-"+color+" alert-dismissable'>"+
  "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>"+
  "<strong>Atención!</strong> "+resp.mensaje+"</div>");

  })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
}

//guardar fechas del evento
function grabarFecha(btn){
var a = $('#form_fechas_eventos').valid();
if(a){
  var id= $('#hidden_id').val();
  var fecha = $('#fecha').val();
  var horainicial = $('#inicial').val();
  var horafinal = $('#final').val();
  var fechaini = $('#fecha_ini').val();
  var fechafin = $('#fecha_fin').val();

  $.ajax({
    url: base_url('eventos/update_fecha'),
    type: 'post',
    dataType: 'json',
    data: { id:id,fecha:fecha,horainicial:horainicial,horafinal:horafinal,fechaini:fechaini,fechafin:fechafin},
    beforeSend:function(){
      loader(btn);
    },
  })
  .done(function(resp) {
    $('.loader-content').remove();
     
      if(resp.Estado_Fecha==0){
          $('#fecha').val("");
          $('#inicial').val("");
          $('#final').val("");
      }else{
          $('#fecha_ini').val("");
          $('#fecha_fin').val("");
      }
   })
  .fail(function() {
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
}

}

function estado_fechas(tipo){

var num = tipo;
var id= $('#hidden_id').val();
 $.ajax({
    url: base_url('eventos/estado_fecha'),
    type: 'post',
    dataType: 'json',
    data: { id:id,estado:num} 
  });
  

}