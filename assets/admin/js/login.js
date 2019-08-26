function validarUsuario(){
				var url =$('.upd').attr('action');
				var url_action=url+"login/acceder";
				var method =$('.upd').attr('method');
				//alert(url_action);
				if($('#usuario').val()==""){
					alert('Ingrese un Usuario');
					return false;
				}

				if($('#clave').val()==""){
					alert('Ingrese una Contraseña');
					return false;
				}
				
				$.ajax({
					url:url_action,
					type:method,
					dataType:"json",
					data: $('.upd').serialize(),
					success:function(resp){
						console.log(resp);
							if(resp.estado){
							location.href=url+"inicio/";
						}else{
							var msj=resp.mensaje;
							$('#msj').html('<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>¡Error! </strong>'+msj+'</div>');
						}
						
						
					}
				})
    .fail( function(xhr, textStatus, errorThrown) {

    });


			}