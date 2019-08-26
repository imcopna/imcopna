$(document).ready(main);
function main(){
    mostrarDatosUsuarios("",1);
    $("input[name=txtBuscar]").keyup(function(){
      textobuscar =$(this).val();
      mostrarDatosUsuarios(textobuscar,1);
    });
    $("body").on("click",".paginacion li a",function(e){
      e.preventDefault();
      valorhref=$(this).attr("href");
      valorBuscar=$("input[name=textoBuscar]").val();
      mostrarDatosUsuarios(valorBuscar,valorhref);
    });

    $('#form_persona_insertar').validate({
      rules:{
        txtdni:{
          required:true,
        },
        txtnombre:{

          required:true,

        },
      
        txtpaterno:{
          required:true,
        },
        txtmaterno:{
          required:true,
        },
        txtcorreo:{
          required:true,
          email:true,
        },
        
        txtdireccion:{
          required:true,
        },
      },
      messages:{
        txtdni:{
          required:"Ingrese el D.N.I",
        },
        txtnombre:{

          required:"Ingrese un nombre",

        },
      
        txtpaterno:{
          required:"Ingrese una apellido paterno",
        },
        txtmaterno:{
          required:"Ingrese un apellido materno",
        },
        txtcorreo:{
          required:"Ingrese un correo electrónico",
          email:"Ingrese un correo válido",
        },
        
        txtdireccion:{
          required:"Ingrese una dirección",
        }
      }
    })

}
function mostrarDatosUsuarios(valorBuscar,pagina){
  $.ajax({
    url:base_url('usuario/mostrar'),
    type:"POST",
    dataType:"json",
    data:{buscar:valorBuscar,nropagina:pagina},
    success: function(response){
    //  console.log(response);
      filas ="";
      $.each(response.personas,function(key,item){
        filas+="<tr style='background-color:#fff'><td>"+item.IDent_Persona+"</td><td>"+item.Dni+"</td><td>"+item.Nombre+"</td><td>"+item.Paterno+"</td><td>"+item.Materno+"</td><td>"+item.Correo+"</td><td class='text-center'><a href='#' data-toggle='modal' data-target='#modalUsuario' onclick='mostrarUsuario("+item.IDent_Persona+")'><i class='fa fa-user'></i></a></td>"+
        "<td class='text-center'><a href='#' data-toggle='modal' data-target='#modalEditar'  onclick='detallePersona("+item.IDent_Persona+")'><i class='fa fa-pencil-square-o'></i></a></td><td class='text-center'><a href='#' onclick='deletes("+item.IDent_Persona+")'><i class='fa fa-trash'></i></a></td>"+
        "</tr>";
      });
      $('#tbpersona').html(filas);
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

function detallePersona(id){
  $.ajax({
    url:base_url('usuario/listarInformacionPersona'),
    type:'post',
    dataType:'json',
    data:{id:id},
    success: function(response){
      console.log(response);
      //lista los cargos para el combo cargos
      var cargo="<option value='0'>SELECCIONAR</option>";

      $.each(response.cargo,function(key,item){
        cargo+="<option value='"+item.IDent_Tipo+"'>"+item.Nombre+"</option>"
      });
      $('#Cargo').html(cargo);

      //lista el estado de parametro para el combo estado
      var parametro="<option value='0'>SELECCIONAR</option>";
      $.each(response.parametro,function(key,item){
        parametro+="<option value='"+item.IDent_Detalle+"'>"+item.Valor+"</option>"
      });
      $('#Estado').html(parametro);
      //lista los datos de la persona
      $.each(response.personas,function(key,item){
        $('#IdUsuario').val(item.Id_usuario);
        $('#id').val(item.IDent_Persona);
        $('#Dni').val(item.Dni);
        $('#Nombre').val(item.Nombre);
        $('#Paterno').val(item.Paterno);
        $('#Materno').val(item.Materno);
        $('#Direccion').val(item.Direccion);
        $('#Celular').val(item.Celular);
        $('#Correo').val(item.Correo);
        $('#Cargo').val(item.IDent_Tipo);
        $('#Estado').val(item.IDent_001_Estado);

      });
    }
  })
}

function update(){
  var idusuario=$('#IdUsuario').val();
  var id = $('#id').val();
  var Nombre  = $('#Nombre').val();
  var Paterno  = $('#Paterno').val();
  var Materno  = $('#Materno').val();
  var Dni  = $('#Dni').val();
  var Direccion  = $('#Direccion').val();
  var Correo  = $('#Correo').val();
  var Celular  = $('#Celular').val();
  var Cargo  = $('#Cargo').val();
  var Estado  = $('#Estado').val();
  //alert(Dni+" "+Nombre);
  $.ajax({
    url:base_url('usuario/update'),
    type:'post',
    dataType:'json',
    data:{idusuario:idusuario,id:id,Nombre:Nombre,Paterno:Paterno,Materno:Materno,Dni:Dni,Direccion:Direccion,Correo:Correo,Celular:Celular,Cargo:Cargo,Estado:Estado},
    success:function(data){
     if(data.estado){
        alert('Se actualizaron los datos correctamente');
        mostrarDatosUsuarios("",1);
        $('#closeupdate').click();
        
      }else{
        alert('Atencion hubo un error');
      }
    }
  });
}

function insert(){
  var a = $('#form_persona_insertar').valid();
  if(a){
  var Nombre  = $('#Nombreinsert').val();
  var Paterno  = $('#Paternoinsert').val();
  var Materno  = $('#Maternoinsert').val();
  var Dni  = $('#Dniinsert').val();
  var Direccion  = $('#Direccioninsert').val();
  var Correo  = $('#Correoinsert').val();
  var Celular  = $('#Celularinsert').val();
  //var Cargo  = $('#Cargo').val();
  //var Estado  = $('#Estado').val();
  //alert(Dni+" "+Nombre);
  $.ajax({
    url:base_url('usuario/insert'),
    type:'post',
    dataType:'json',
    data:{Nombre:Nombre,Paterno:Paterno,Materno:Materno,Dni:Dni,Direccion:Direccion,Correo:Correo,Celular:Celular},
    success:function(data){
     if(data.estado){
        alert('Se inserto correctamente la persona');
     
          limpiarcampos("Nombre");
          $('#closeregistrar').click();
          mostrarDatosUsuarios("",1);
      }else{
        alert('Atencion hubo un error');
      }
    }
  });
}
}


function deletes(id){
var opcion = confirm("¿Realmente desea eliminar este Usuario?");
if(opcion){
 $.ajax({
    url:base_url('usuario/delete'),
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
     if(data.estado){
        //alert('Se elimino correctamente la persona');
        mostrarDatosUsuarios("",1);
      }else{
        alert('Atencion hubo un error');
      }
    }
  });
}
}

function mostrarUsuario(id){
 $.ajax({
    url:base_url('usuario/listarUsuarioPorIdPersona/'+id),
    type:'post',
    dataType:'json',
    data:{id:id},
    success:function(data){
    $.each(data ,function(i,value){
      $('#id_usuario').val(value.id);
      $('#usuario').val(value.usuario);
      $('#password').val(value.pass);
      $('#tipo_usuario').val(value.tipo);
      $('#estado').val(value.estado);
    });
    }
  });
}

function updateUsuario(){
      var id =  $('#id_usuario').val();
      var usuario = $('#usuario').val();
      var password = $('#password').val();
      var tipo =$('#tipo_usuario').val();
      var estado =$('#estado').val();

   $.ajax({
    url:base_url('usuario/updateUsuario'),
    type:'post',
    dataType:'json',
    data:{id:id,usuario:usuario,password:password,tipo:tipo,estado:estado},
    success:function(data){
      if(data.estado){
        alert(data.mensaje);
        $('#closeusuario').click();
      }else{
        alert(data.mensaje);
      }
    }
  });
}