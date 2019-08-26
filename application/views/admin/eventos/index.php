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
					<input type="text" name="txtBuscarEventos" placeholder="Realizar búsqueda por Nombre de evento ..." class="form-control">
				</div>
				
			</div>
		</form>
		<br>
		<div class="row">
			<div class="col-sm-2">
				<a href='<?php echo base_url("admin/eventos/crud"); ?>'  class="btn btn-success btn-block" >Agregar <i class="fa fa-plus"></i></a>
			</div>
		</div>
		<br>
		  <div class="row">
    <div class="col-sm-12">
      <table class="table table-condensed table-bordered">

          <thead class="thead-dark">
            <tr style="font-weight:bold">
            <th style="width: 2% ">N°</th>
            <th style="width: 15% ">Título</th>
            <th class="text-center" style="width: 0.5%">Estado</th>
            <th class="text-center" style="width: 1%">Príncipal</th>
            <th class="text-center" style="width: 6%">Categoría</th>
            <th class='text-center' style="width: 5%">Creado por</th>
            <th class="text-center" style="width:2%">Fecha de creación</th>
             <th class="text-center" style="width:2%">Visto</th>
            <th class="text-center" style="width:1%;">Editar</th>
            <th class="text-center" style="width:1%;">Eliminar</th>
              </tr>
          </thead>

            <tbody id="tbeventos">

            </tbody>


      </table>
      <div class="paginacion">

      </div>

    </div>

  </div>
                        </div>
                    </div>


	</div>
</div>
