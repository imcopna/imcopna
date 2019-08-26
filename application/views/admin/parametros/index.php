


<script type='text/javascript' src="<?php echo base_url('cms/js/parametro.js'); ?>"></script>
<div class="content-wrapper">
	<div class="container-fluid">
				<div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Mantenimiento de <?php echo $titulo ?></h5>
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
		<form>
			<div class="row">
				<div class="col-sm-12">
					<label for="">Texto a buscar</label>
				</div>
				
				<div class="col-sm-12">
					<input type="text" name="txtBuscarParametros" placeholder="Realizar búsqueda por Nombre, Descripción" class="form-control">
				</div>
				
			</div>
		</form>
		<br>
		<div class="row">
			<div class="col-sm-2">
				<a href='' data-toggle='modal' data-target='#modalInsertarParametro' class="btn btn-success btn-block" >Agregar <i class="fa fa-plus"></i></a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12">
				<table class="table table-bordered">
				 <thead class="thead-dark">
						<tr  style="font-weight:bold">
							<th style="width: 2% ">N°</th>
							<th style="width: 5% ">Parámetro</th>
							<th  style="width: 15%">Descripción</th>
							<th class="text-center" style="width: 1%">Estado</th>
							<th class="text-center" style="width:1%;">Detalle</th>
							<th class="text-center" style="width:1%;">Editar</th>
							<th class="text-center" style="width:1%;">Eliminar</th>
						</tr>
					</thead>
					<tbody id="tbparametros">
					</tbody>
				</table>
				<div class="paginacion">
				</div>
			</div>
		</div>
	</div>
		<!--modal paramtro detalle-->
		
		<div class="modal fade" tabindex="-1" role="dialog" id="modalParametroDetalle">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content ">
					<div class="modal-header">		
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Detallar Parámetro</h4>
						
					</div>
					<div class="modal-body">
						<form  class="form-horizontal" id='form_parametro_detalle'>
							<div style="margin-top: 4px">
								<div class="row">
									<div class="col-sm-3">
										<label for="">Nombre</label>
									</div>
									<div class="col-sm-4">
										<label for="">Descripción</label>
									</div>
									<div class="col-sm-3">
										<label for="">Valor</label>
									</div>
								</div>
							</div>
							
							<div style="margin-top:4px;">
								<div class="row">
									<input type="hidden" id='id_parametro'>
									<div class="col-sm-3">
										<input data-focus='true' type="text" name="nombre" id='nombre' value=""  required class="form-control">
									</div>
									<div class="col-sm-4">
										<input type="text" name="descripcion_detalle" id='descripcion_detalle' value="" class="form-control">
									</div>
									<div class="col-sm-3">
										<input type="text" id="valor" name="valor" class="form-control" required >
									</div>
									<div class="col-sm-2">
										<button type="button" id='rparametrodet' data-accion = "register" class="btn btn-primary btn-block" onclick="insertarDetalleParametro()">Agregar</button>
									</div>
								</div>
							</div>
							<br>
							<div class="form-group row">
								<div class="col-sm-12">
									<div id="tb_detalle_parametro">
									
								</div>
								</div>
								
							</div>

							
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" id='closeregistrarparametrodetalle'>Salir</button>
					</div>
					</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
					</div><!-- /.modal insertar -->
		<!--modal para insertar parametros-->
		<div class="modal fade" tabindex="-1" role="dialog" id="modalInsertarParametro">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Registrar Parametro</h4>
						
					</div>
					<div class="modal-body">
						<form  class="form-horizontal" id='form_parametro_insertar'>
							
							<div style="margin-top:4px;">
								<div class="row">
									<div class="col-sm-4">
										<label for="" class="control-label">Parámetro</label>
									</div>
									<div class="col-sm-8">
										<input type="text" name="parametro" id='parametro' value="" class="form-control">
									</div>
								</div>
							</div>
							<div style="margin-top:4px;">
								<div class="row">
									<div class="col-sm-4">
										<label for="" class="control-label">Descripción</label>
									</div>
									<div class="col-sm-8">
										<input type="text" name="descripcion" id='descripcion' value="" class="form-control">
									</div>
								</div>
							</div>
							<div style="margin-top:4px;">
								<div class="row">
									<div class="col-sm-4">
										<label for="" class="control-label">Estado</label>
									</div>
									<div class="col-sm-8">
										<select name="estado_parametro" id="estado_parametro" class="form-control">
											<option value="">Seleccionar</option>
											<?php foreach($tipo_estado as $estado): ?>
											<option value="<?php echo $estado->IDent_Detalle ?>"><?php echo $estado->Nombre ?></option>	
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" id='closeregistrarparametro'>Close</button>
						<button type="button" class="btn btn-success" onclick="insertParametros();">Grabar</button>
					</div>
					</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
					</div><!-- /.modal insertar -->


		<!--modal para actualizar parametros-->
		<div class="modal fade" tabindex="-1" role="dialog" id="modalUpdateParametro">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Actualizar Parametro</h4>
						
					</div>
					<div class="modal-body">
						<form  class="form-horizontal" id='form_parametro_actualizar'>
							
							<div style="margin-top:4px;">
								<div class="row">
									<input type="hidden" id='id_parametro_up'>

									<div class="col-sm-4">
										<label for="" class="control-label">Parámetro</label>
									</div>
									<div class="col-sm-8">
										<input type="text" name="parametroup" id='parametroup' value="" class="form-control">
									</div>
								</div>
							</div>
							<div style="margin-top:4px;">
								<div class="row">
									<div class="col-sm-4">
										<label for="" class="control-label">Descripción</label>
									</div>
									<div class="col-sm-8">
										<input type="text" name="descripcionup" id='descripcionup' value="" class="form-control">
									</div>
								</div>
							</div>
							<div style="margin-top:4px;">
								<div class="row">
									<div class="col-sm-4">
										<label for="" class="control-label">Estado</label>
									</div>
									<div class="col-sm-8">
										<select name="estado_parametroup" id="estado_parametroup" class="form-control">
											<option value="">Seleccionar</option>
											<?php foreach($tipo_estado as $estado): ?>
											<option value="<?php echo $estado->IDent_Detalle ?>"><?php echo $estado->Nombre ?></option>	
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal" id='closeupdateparametro'>Close</button>
						<button type="button" class="btn btn-success" onclick="updateParametros();">Actualizar</button>
					</div>
					</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
					</div><!-- /.modal insertar -->
				</div>
			</div>