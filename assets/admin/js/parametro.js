$(document).ready(mainParametros);
function mainParametros(){
    mostrarDatosParametros("",1);
    $("input[name=txtBuscarParametros]").keyup(function(){
      textobuscar =$(this).val();
      mostrarDatosParametros(textobuscar,1);
    });
    $("body").on("click",".paginacion li a",function(e){
      e.preventDefault();
      valorhref=$(this).attr("href");
      valorBuscar=$("input[name=txtBuscarParametros]").val();
      mostrarDatosParametros(valorBuscar,valorhref);
    });


 $('#form_parametro_detalle').validate({
        rules:{
          nombre:{
            required:true
          },
          
          valor:{
            required:true
          }
        },
        messages:{
           nombre:{
            required:"Ingrese un nombre"
          },
         
          valor:{
            required: "Ingrese un valor"
          }
        }
    });
    $('#form_parametro_insertar').validate({
        rules:{
          parametro:{
            required:true
          },
          
          estado_parametro:{
            required:true
          }
        },
        messages:{
           parametro:{
            required:"Ingrese un parámetro"
          },
         
          estado_parametro:{
            required: "Ingrese un estado"
          }
        }
    });

    $('#form_parametro_actualizar').validate({
        rules:{
          parametroup:{
            required:true
          },
          
          estado_parametroup:{
            required:true
          }
        },
        messages:{
           parametroup:{
            required:"Ingrese un parámetro"
          },
         
          estado_parametroup:{
            required: "Ingrese un estado"
          }
        }
    });

}
function mostrarDatosParametros(valorBuscar,pagina){
  $.ajax({
    url:base_url('parametros/mostrar'),
    type:"POST",
    dataType:"json",
    data:{buscar:valorBuscar,nropagina:pagina},
    success: function(response){
    //  console.log(response);
      filas ="";
      $.each(response.parametro,function(key,item){
        filas+="<tr><td class='text-center'>"+item.IDent_Parametro+"</td><td>"+item.Nombre+"</td><td>"+item.Descripcion+"</td><td class='text-center'>"+item.estado+"</td><td class='text-center'><a href='#' data-toggle='modal' data-target='#modalParametroDetalle' onclick='detalleParametro("+item.IDent_Parametro+")'><i class='fa fa-th-list' aria-hidden='true'></i></a></td><td class='text-center'><a href='#' data-toggle='modal' data-target='#modalUpdateParametro' onclick='EditarParametro("+item.IDent_Parametro+")'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a></td><td class='text-center'><a href='#' onclick='deleteParametro("+item.IDent_Parametro+")'><i class='fa fa-trash-o' aria-hidden='true'></i></a></td>"+
        "</tr>";
      });
      $('#tbparametros').html(filas);
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

function insertParametros(){
  var a = $('#form_parametro_insertar').valid();
  if(a){
  var Parametro  = $('#parametro').val();
  var Descripcion  = $('#descripcion').val();
  var Estado  = $('#estado_parametro').val();

  var campos = ["parametro", "descripcion", "estado_parametro"];
  $.ajax({
    url:base_url('parametros/insert'),
    type:'post',
    dataType:'json',
    data:{Parametro:Parametro,Descripcion:Descripcion,Estado:Estado},
    success:function(data){
     if(data.estado){
        alert("Se inserto correctamente el parámetro");
          $('#closeregistrarparametro').click();
          limpiarcampos("parametro");
          mostrarDatosParametros("",1);
      }else{
        alert('Atencion hubo un error');
      }
    }
  });
}
}

function insertarDetalleParametro(){
  var a = $('#form_parametro_detalle').valid();
  if(a){
  var id =$('#id_parametro').val();
  var nombre  = $('#nombre').val();
  var descripcion  = $('#descripcion_detalle').val();
  var valor  = $('#valor').val();

    $.ajax({
    url:base_url('parametros/insertdetalle'),
    type:'post',
    dataType:'json',
    data:{nombre:nombre,descripcion:descripcion,valor:valor,id:id},
    success:function(data){
     if(data.estado){
        alert("Se inserto correctamente el detalle para el parámetro");
        cleanercampos();
          mostrarDatosDetalle(id);
      }else{
        alert('Atencion hubo un error');
      }
    }
  });
}
}
function detalleParametro(id){
  $('#id_parametro').val(id);
  mostrarDatosDetalle(id);
}
function mostrarDatosDetalle(id){
    $.ajax({
    url:base_url('parametros/mostrardetalle'),
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
      if(data.estado){
        $('.alert').remove();
        $('#table_detalle').remove();

        $('#tb_detalle_parametro').append('<table class="table table-bordered" id="table_detalle"><thead style="font-weight:bold"><tr><td style="width: 2% ">N°</td><td style="width: 6% ">Nombre</td><td style="width: 10% ">Descripción</td><td style="width: 5% ">Valor</td><td class="text-center" style="width: 2% ">Editar</td><td class="text-center" style="width: 2% ">Eliminar</td></tr></thead><tbody>')
       $.each(data.detalle,function(i,item){
        $('#tb_detalle_parametro tbody').append('<tr>'+
          '<td>'+item.IDent_Detalle+'</td>'+
          '<td>'+item.Nombre+'</td>'+
          '<td>'+item.Descripcion+'</td>'+
          '<td>'+item.Valor+'</td>'+
          '<td class="text-center"><a  href="#" onclick="editarParametroDetalle('+item.IDent_Detalle+')"><i class="fa fa-pencil-square-o"></i></a></td>'+
          '<td class="text-center"><a  href="#" onclick="deleteDetalle('+item.IDent_Detalle+')"><i class="fa fa-trash"></i></a></td>'+
          '</tr></tbody></table>')
      });
      }else{
        $('.alert').remove();
        $('#table_detalle').remove();

        $('#tb_detalle_parametro').append('<div class="alert alert-success">'+
  '<strong>Atención!</strong> No cuenta con ningún detalle este parámetro.'+
'</div>');
      }
      
    }
  });
}

function deleteParametro(id){
var opcion = confirm("¿Realmente desea eliminar este parámetro?");
if(opcion){
 $.ajax({
    url:base_url('parametros/deleteparametro'),
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
     if(data.estado){
        //alert('Se elimino correctamente la persona');
        mostrarDatosParametros("",1);
      }else{
        alert('Atencion hubo un error');
      }
    }
  });
}
}
function deleteDetalle(id){
var id_parametro =$('#id_parametro').val();

var opcion = confirm("¿Realmente desea eliminar este detalle para este parámetro?");
if(opcion){
 $.ajax({
    url:base_url('parametros/deletedetalleparametro'),
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
     if(data.estado){
        //alert('Se elimino correctamente la persona');
        cleanercampos();
        mostrarDatosDetalle(id_parametro);
        //cleanercampos();
      }else{
        alert('Atencion hubo un error');
      }
    }
  });
}
}

function editarParametroDetalle(id){

  $.ajax({
    url:base_url('parametros/editarParametroDetalle'),
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
      $.each(data.detalle,function(i,item){
        $('#nombre').val(item.Nombre);
        $('#descripcion_detalle').val(item.Descripcion);
        $('#valor').val(item.Valor);

        $('#rparametrodet').attr('data-accion','update');
        if($('#rparametrodet').attr('data-accion')=='update'){
          $('#rparametrodet').removeClass('btn-primary');
          $('#rparametrodet').addClass('btn-success');
          $('#rparametrodet').text('Actualizar');
          $('#rparametrodet').attr('onclick','actualizardetalle('+id+')');
        }
      });
     
    }
  });

  
}

function actualizardetalle(id){
  var a = $('#form_parametro_detalle').valid();
  if(a){
  var id_parametro =$('#id_parametro').val();
  var nombre  = $('#nombre').val();
  var descripcion  = $('#descripcion_detalle').val();
  var valor  = $('#valor').val();

  $.ajax({
    url:base_url('parametros/updatedetalle'),
    type:'post',
    dataType:'json',
    data:{id:id,nombre:nombre,descripcion:descripcion,valor:valor},
    success:function(data){
      if(data.estado){
           alert('Se actualizó correctamente');
           mostrarDatosDetalle(id_parametro);
           cleanercampos();

        $('#rparametrodet').attr('data-accion','register');
        if($('#rparametrodet').attr('data-accion')=='register'){
          $('#rparametrodet').removeClass('btn-success');
          $('#rparametrodet').addClass('btn-primary');
          $('#rparametrodet').text('Agregar');
          $('#rparametrodet').attr('onclick','insertarDetalleParametro()');
        }

      }else{
          alert('Atencion hubo un error');

      }
    }
  });
}
}
function cleanercampos(){

  $(":visible").each(function(){ 
      if($($(this)).attr('data-focus')=='true'){
        var id =  $(this).attr('id');
        $("#"+id).focus();
      }
      $($(this)).val('');
  });
}

function EditarParametro(id){
    $.ajax({
    url:base_url('parametros/editarParametro'),
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
      $.each(data.parametro,function(i,item){
        $('#id_parametro_up').val(item.IDent_Parametro);
        $('#parametroup').val(item.Nombre);
        $('#descripcionup').val(item.Descripcion);
        $('#estado_parametroup').val(item.IDent_001_Estado);
      });
     
    }
  });
}

function updateParametros(){
  var a =  $('#form_parametro_actualizar').valid();
  if(a){
  var id_parametro_up= $('#id_parametro_up').val();
  var nombre = $('#parametroup').val();
  var descripcion=$('#descripcionup').val();
  var estado= $('#estado_parametroup').val();

  $.ajax({
    url:base_url('parametros/updateparametro'),
    type:'post',
    dataType:'json',
    data:{id:id_parametro_up,nombre:nombre,descripcion:descripcion,estado:estado},
    success:function(data){
      if(data.estado){
           alert('Se actualizó correctamente');
          mostrarDatosParametros("",1);
          $('#closeupdateparametro').click();

      }else{
          alert('Atencion hubo un error');

      }
    }
  });
}
}
