<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $titulo ?></title>

    <?php base_css($tipo,"bootstrap.min.css") ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/font-awesome/css/font-awesome.css') ?>">

    <?php base_css($tipo,"animate.css") ?>
    <?php base_css($tipo,"style.css") ?>

    
    <script>
    function base_url(url) { return '<?php echo base_url('admin/'); ?>' + url; } function redirect(href) { window.location.href = '<?php echo base_url('admin/'); ?>' + href; }
  </script>

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><img src="<?php echo base_url('assets/portal/img/logoministerio2.png')?>" alt="" style="width: 160px;"></h1>

            </div>
            <h3><?php echo $header_titulo; ?></h3>
            <p><?php echo $descripcion ?>
            </p>
            <p  id='msj'></p>
                  <?php echo validation_errors(); ?>

                    <?php echo form_open('admin/', array('class' => 'upd')); ?>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label>Usuario</label>
                      </div>
                      <div class="col-sm-12">
                        <?php   $data = array(
                        'type'  => 'text',
                        'name'  => 'usuario',
                        'id'    => 'usuario',
                        'value' => '',
                        'class' => 'form-control'
                        );
                        echo form_input($data); ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <label>Contraseña</label>
                      </div>
                      <div class="col-sm-12">
                        <?php   $data = array(
                        'type'  => 'password',
                        'name'  => 'clave',
                        'id'    => 'clave',
                        'value' => '',
                        'class' => 'form-control'
                        );
                        echo form_input($data); ?>
                      </div>
                      
                      
                    </div>
                    <div class="form-group" >
                      <div class="col-sm-offset-3 col-sm-6" style="margin-top: 10px;">
                      <?php 

                      $js = 'onClick="validarUsuario()"';
                      $data = array(
                        'type'  => 'button',
                        'name'  => 'ok',
                        'id'    => 'ok',
                        'value' => 'Ingresar',
                        'class' => 'btn btn-primary btn-block'
                        );
                      echo form_input($data,'', $js);
                      ?>
                    </div>

                    </div>
                    
                    <?php echo form_close(); ?>
        </div>
    </div>

    <!-- Mainly scripts -->

    <?php  base_js($tipo,"jquery-2.1.1.js") ?>
    <?php  base_js($tipo,"bootstrap.min.js") ?>
    <?php  base_js($tipo,"login.js") ?>
   


</body>

</html>



