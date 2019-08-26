


<div class="content-wrapper">
	<div class="container-fluid">
		
		<div class="ibox float-e-margins">
			<div class="ibox-title">
				<h5><?php echo $titulo ?></h5>
				<div class="ibox-tools">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="ibox-content">
				<!-- Nav tabs -->

				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#contenido" role="tab">Contenido</a>
					</li>
					<?php if(is_object($model)): ?>
					<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fechas" role="tab">Fecha</a></li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#opciones" role="tab">Opciones</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#imagen" role="tab">Imagen</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#video" role="tab">Video</a>
					</li>
					<?php endif; ?>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<br>
					<div class="tab-pane active" id="contenido" role="tabpanel">
						<form action="" id="form_eventos">
							<input type="hidden" value="<?php echo ($model)?$model->IDent_Evento: 0 ?>" id="hidden_id">
							<?php if(is_object($model)):?>
							
							<div class="form-group">
								<div class="well-alert well-sm text-center">
									<?php if($model->Vistos>1):?>
									Este evento ha sido visto por <?php echo $model->Vistos ?> personas
									<?php endif;
									if($model->Vistos==0):?>
									Esta publicación no ha generado lecturas
									<?php endif;?>
								</div>
							</div>
							<?php endif; ?>
							<div class="form-group">
								<div class="row">
									<label for="" class="col-sm-8">Título</label>
									<label for="" class="col-sm-4">Categoría</label>
								</div>
								<div class="row">
									<div class="col-sm-8">
										<input type="text" class="form-control" id="titulo" name="titulo" required placeholder="Ingrese un título" value="<?php echo ($model)?$model->Titulo : '' ?>">
									</div>
									<div class="col-sm-4">
										<select name="categorias" id="categorias" class="form-control" required>
											<option value="">- Seleccionar -</option>
											<?php 	foreach($categoria as $cat):?>

											<option value="<?php echo $cat->IDent_Detalle ?>" <?php echo ($model)?$cat->IDent_Detalle == $model->IDent_004_Categoria ? 'selected':'':''?>><?php echo $cat->Nombre ?></option>
											<?php 	endforeach; ?>

										</select>
									</div>
								</div>
								
								
							</div>
							<div class="form-group">
								<label for="">Descripción</label>
								<textarea  class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese una descripción" required><?php echo ($model)?$model->Descripcion:""; ?></textarea>
							</div>
							<div class="form-group">
								<label for="">Contenido</label>
								<textarea  id="cont" class="form-control"><?php echo ($model)? htmlspecialchars($model->Contenido):"";?></textarea>
							</div>
							
							
							
							<div class="form-group" >
								<button class="btn btn-primary" type="button" onclick="grabarevento(this)">Grabar</button>
							</div>
						</form>
					</div>
					<?php if(is_object($model)):?>
						<div class="tab-pane" id="fechas" role="tabpanel">
							<br>	
							<form id="form_fechas_eventos">
							<div class="well">
								

								<label class="radio-inline"><input type="radio" name="optradio" id="rfech" value="rango" <?php echo ($model->Estado_Fecha==0)? 'checked':'' ?>>Rango de Fechas</label>
								<label class="radio-inline"><input type="radio" name="optradio" id="fech" value="una" <?php echo ($model->Estado_Fecha==1)? 'checked':'' ?>>Una Fecha</label>
							</div>
							
							<div class="form-group" id="rango">
								<div class="row">
									<label for="" class="col-sm-4">Fecha Inicial</label>
									<label for="" class="col-sm-4">Fecha Final</label>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<input type="date" class="form-control" id="fecha_ini" name="fecha_ini" required value="<?php echo ($model)?$model->Fecha_Inicial:'' ?>">
									</div>
									<div class="col-sm-4">
										<input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required value="<?php echo ($model)?$model->Fecha_Fin:'' ?>">
									</div>
								</div>
								
							</div>					
		

							<div class="form-group" id="una">
								<div class="row">
									<label for="" class="col-sm-4">Fecha del evento</label>
									<label for="" class="col-sm-2">Hora Inicial</label>
									<label for="" class="col-sm-2">Hora Final</label>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<input type="date" class="form-control" id="fecha" name="fecha"  required value="<?php echo ($model)?$model->Fecha:'' ?>">
									</div>
									<div class="col-sm-2">
										<input type="time" class="form-control" id="inicial" name="hora_ini"   value="<?php echo ($model)?$model->Hora_Inicio:'' ?>">
									</div>
									<div class="col-sm-2">
										<input type="time" class="form-control" id="final" name="hora_fin"   value="<?php echo ($model)?$model->Hora_Final:'' ?>">
									</div>
								</div>
								
								
							</div>
							<button type="button"  onclick="grabarFecha(this)" class="btn btn-primary">Grabar</button>
						</form>
						</div>
					<div class="tab-pane" id="opciones" role="tabpanel">
						<div class="form-group">
							<div class="well-alert well-sm" style="padding: 15px;">
								<div class="row">
									<form>
									<input type="hidden" id="hidden_id" value="<?php echo $model->IDent_Evento ?>">
									<div class="col-sm-12">
										<h4>Aparecer evento como principal</h4>
									</div>
									<div class="col-sm-12">
										<input type="hidden" name="destacado" id="destacado" value="0" >
										<div>
											<label><input type="checkbox" class="i-checks" id="destacado" value="1" <?php echo $model->Principal == 1 ? 'checked' : '';  ?>> Permite al evento aparecer como portada principal</label>
										</div>
										<button type="button"  onclick="grabarDestacado(this)" class="btn btn-primary">Grabar</button>
									</div>
								</form>
								</div>
								
							</div>
						</div>
						<div class="form-group">
							<div class="well-alert well-sm" style="padding: 15px;">
								<div class="row">
									<form>
									<input type="hidden" id="hidden_id" value="<?php echo $model->IDent_Evento ?>">
									<div class="col-sm-12">
										<h4>Mantener activo el evento</h4>
									</div>
									<div class="col-sm-12">
										
										<input type="hidden" name="activo" id="activo" value="0" >
										<div>
											<label><input type="checkbox" class="i-checks" id="activo" name="activo" value="1" <?php echo $model->IDent_002_Estado == 1 ? 'checked' : '';  ?>> Esta opción permite que este evento pueda ser listado.</label>
										</div>
										
										<button type='button' class="btn btn-primary" onclick="grabarestado(this)">Grabar</button>
									</div>
								</form>
								</div>
								
							</div>
						</div>
					</div>
					<div class="tab-pane" id="imagen" role="tabpanel">
						<form id="form-evento-imagen" action="" enctype="multipart/form-data">
							<input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $model->IDent_Evento ?>">
							<br>	
							<div class="group-form">
								<div class="row">
									<label for="" class="col-sm-12">Imagen</label>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<input type="file" class="form-control" id="files" name="files">
									</div>
									<div class="col-sm-2">
										<button type="button" class="btn btn-primary btn-block" onclick="grabarimagenEvento(this)">Grabar</button>
									</div>
									<div class="col-sm-2 btn-eliminar">
										<?php if($model->Imagen){ ?>
										<button  type="button" class="btn btn-danger eliminar" onclick="eliminarImagen(this)"><i style="color: white" class="fa fa-trash"></i> Eliminar</button>
										<?php } ?>
									</div>
								</div>
								
							</div>
							<div class="group-form" style="margin-top: 5px;">
								<div class="row">
									<div class="col-sm-4">
										<div class="output">
											<input type="hidden" name="imagen_hidden" id="imagen_hidden" value="<?php echo ($model)?$model->Imagen:'' ?>">
											<output class="thumb" id="list">
											<?php if($model->Imagen){?>
											<img class="thumb" src="<?php echo base_url('file/'.$model->Imagen) ?>"/>
											<?php } ?>
											</output>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="video" role="tabpanel">
						<form action="" class="form-horizontal" id="form_video_evento">
							
							
							<input type="hidden" id="hidden_id" name="hidden_id" value="<?php echo $model->IDent_Evento ?>">
							<br>	
							<div class="form-group">
								
									<div class="col-sm-1">
										<label for="" class="col-form-label">Url</label>
									</div>
									<div class="col-sm-8">
										<input type="url" class="form-control" id="video_url" name="video_url" required placeholder="Ingrese la URL del video de YouTube">
									</div>
									
									
									<div class="col-sm-1">
										<button class="btn btn-primary" type='button' onclick="grabar_video(this)"> Grabar</button>
									</div>
									<div class="col-sm-2 btn-eliminarvideo">
										<?php if($model->url_video){ ?>
										<button  type="button" class="btn btn-danger eliminarvideo" onclick="eliminarVideo(this)"><i style="color: white" class="fa fa-trash"></i> Eliminar</button>
										<?php } ?>
									</div>
						
							</div>
							<?php if($model->url_video){ ?>
							<iframe class='thumb-video' width='560' height='315' src="https://www.youtube.com/embed/<?php echo ObtenerCodigoYoutube($model->url_video) ?>" frameborder='0' gesture='media' allow='encrypted-media' allowfullscreen></iframe>
							<?php } ?>
						</form>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		
	</div>
</div>
<style>
	#cuadro-imagen{
		width: 100%;
		background-color: #E2E2E2;
		box-shadow: 1px 1px 1px 1px #ccc;
	}
	.well{
		padding: 15px;
	}
</style>
<script>tinymce.init({ selector:'#cont', theme: 'modern' });</script>