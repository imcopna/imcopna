
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
          <input type="text" name="txtBuscar" placeholder="Realizar busqueda por Nombre, Apellido, D.N.I." class="form-control">
        </div>
        
      </div>
    </form>
    <br>
    <div class="row">
      <div class="col-sm-2">
        <a href='#' name="btnAgregar" class="btn btn-success btn-block" data-toggle='modal' data-target='#modalInsertar'>Agregar <i class="fa fa-plus"></i></a>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-sm-12">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr style="font-weight:bold">
              <th style="width: 2% ">N°</th>
              <th style="width: 3% ">D.N.I</th>
              <th style="width: 10%">Nombre</th>
              <th style="width: 10%">Apellido Paterno</th>
              <th style="width: 10%">Apellido Materno</th>
              <th style="width: 15%">Correo</th>
              <th style="width:2%">Usuario</th>
              <th style="width:2%;">Editar</th>
              <th style="width:2%;">Eliminar</th>
            </tr>
          </thead>
          <tbody id="tbpersona">
          </tbody>
        </table>
        <div class="paginacion">
        </div>
      </div>
    </div>
  </div>
</div>
    <!-- modal para editar -->
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditar">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4>Actualizar Informacion</h4>
           
            
          </div>
          <div class="modal-body">
            <form  class="form-horizontal">
              <input type="hidden" name="Id" id="id">
              <input type="hidden" name="IdUsuario" id="IdUsuario">
              <div style="margin-top:4px;">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="" class="control-label">D.N.I</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="txtdni" id='Dni' value="" class="form-control">
                  </div>
                </div>
              </div>
              <div style="margin-top:4px;">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="" class="control-label">Nombre</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="txtnombre" id='Nombre' value="" class="form-control">
                  </div>
                </div>
              </div>
              <div style="margin-top:4px;">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="" class="control-label">Apellido Paterno</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="txtpaterno" id='Paterno' value="" class="form-control">
                  </div>
                </div>
              </div>
              <div style="margin-top:4px;">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="" class="control-label">Apellido Materno</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="txtmaterno" id='Materno' value="" class="form-control">
                  </div>
                </div>
              </div>
              <div style="margin-top:4px;">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="" class="control-label">Correo Electronico</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="mail" name="txtcorreo" id='Correo' value="" class="form-control">
                  </div>
                </div>
              </div>
              <div style="margin-top:4px;">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="" class="control-label">Número Celular</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" name="txtcelular" id='Celular' value="" class="form-control">
                  </div>
                </div>
              </div>
              <div style="margin-top:4px;">
                <div class="row">
                  <div class="col-sm-4">
                    <label for="" class="control-label">Dirección</label>
                  </div>
                  <div class="col-sm-6">
                    <input type="mail" name="txtdireccion" id='Direccion' value="" class="form-control">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"  id='closeupdate'>Close</button>
            <button type="button" class="btn btn-success" onclick="update();">Actualizar</button>
          </div>
          </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
          </div><!-- /.fin modal editar -->

          <!--modal para insertar personas-->
          <div class="modal fade" tabindex="-1" role="dialog" id="modalInsertar">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4>Agregar Persona</h4>
                </div>
                <div class="modal-body">
                  <form  class="form-horizontal" id="form_persona_insertar">
                    
                    <div style="margin-top:4px;">
                      <div class="row">
                        <div class="col-sm-4">
                          <label for="" class="control-label">D.N.I</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" name="txtdni"  maxlength="8" required  onKeyPress="return soloNum(event)"  id='Dniinsert' value="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div style="margin-top:4px;">
                      <div class="row">
                        <div class="col-sm-4">
                          <label for="" class="control-label">Nombre</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" name="txtnombre"  required  id='Nombreinsert' value="" onkeyPress="return soloLetras(event)" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div style="margin-top:4px;">
                      <div class="row">
                        <div class="col-sm-4">
                          <label for="" class="control-label">Apellido Paterno</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" name="txtpaterno" required   onkeyPress="return soloLetras(event)" id='Paternoinsert' value="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div style="margin-top:4px;">
                      <div class="row">
                        <div class="col-sm-4">
                          <label for="" class="control-label">Apellido Materno</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" name="txtmaterno"  required   onkeyPress="return soloLetras(event)" id='Maternoinsert' value="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div style="margin-top:4px;">
                      <div class="row">
                        <div class="col-sm-4">
                          <label for="" class="control-label">Correo Electronico</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="email" name="txtcorreo"  required  id='Correoinsert' value="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div style="margin-top:4px;">
                      <div class="row">
                        <div class="col-sm-4">
                          <label for="" class="control-label">Número Celular</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" name="txtcelular" id='Celularinsert' maxlength="9" onkeyPress="return soloNum(event)" value="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div style="margin-top:4px;">
                      <div class="row">
                        <div class="col-sm-4">
                          <label for="" class="control-label">Dirección</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" name="txtdireccion"  required  id='Direccioninsert' value="" class="form-control">
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" id='closeregistrar'>Close</button>
                  <button type="button" class="btn btn-success" onclick="insert();">Grabar</button>
                </div>
                </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
                </div><!-- /.modal insertar -->
                <!-- modal para ver usuarios -->
                <div class="modal fade" tabindex="-1" role="dialog" id="modalUsuario">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4>Usuario</h4>
                        
                      </div>
                      <div class="modal-body">
                        <input type="hidden" id="id_usuario" >
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <label for="">Usuario :</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="text" id='usuario' class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <label for="">Password :</label>
                          </div>
                          <div class="col-sm-8">
                            <input type="password" id='password' class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-4">
                            <label for="">Tipo de usuario :</label>
                          </div>
                          <div class="col-sm-8">
                            <select name="tipo_usuario" id="tipo_usuario" class="form-control">
                              <option value="0">Seleccionar</option>
                              <?php foreach($tipo_usuarios as $usu_tipo): ?>
                              <option value="<?php echo $usu_tipo->IDent_Detalle ?>"><?php echo $usu_tipo->Nombre ?></option>
                              <?php endforeach; ?>
                            </select>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-sm-4">
                          <label for="">Estado :</label>
                        </div>
                        <div class="col-sm-8">
                          <select name="estado" id="estado" class="form-control">
                            <option value="0">Seleccionar</option>
                            <?php foreach($tipo_estado as $estado): ?>
                            <option value="<?php echo $estado->IDent_Detalle ?>"><?php echo $estado->Nombre ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal" id='closeusuario'>Close</button>
                      <button type="button" class="btn btn-success" onclick="updateUsuario();">Actualizar</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>