<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $titulo; ?></title>
        
        <?php base_css($this->tipo,"bootstrap.min.css") ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/admin/font-awesome/css/font-awesome.css') ?>">

        <!-- i-checks-->
        <?php base_css($this->tipo,"plugins/iCheck/custom.css") ?>
      
        <?php base_css($this->tipo,"plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css") ?>
      

        <!-- color picker -->
        <?php base_css($this->tipo,"plugins/colorpicker/bootstrap-colorpicker.min.css") ?>
        
        <!-- Toastr style -->
        <?php base_css($this->tipo,"plugins/toastr/toastr.min.css") ?>
        <!-- Gritter -->
        <link href="<?php echo base_url("assets/admin/js/plugins/gritter/jquery.gritter.css") ?>" rel="stylesheet">
        <?php base_css($this->tipo,"animate.css") ?>
   
     


        <?php base_css($this->tipo,"style.css") ?>
        <?php base_css($this->tipo,"estilos.css") ?>
            
        
                  <!-- Slide-->
        <?php  if($this->uri->segment(1)."/".$this->uri->segment(2) == "admin/slide"): ?>
                <?php base_css($this->tipo,"plugins/bootstrap-slider/slider.css"); ?>  
                <?php base_css($this->tipo,"slide.css"); ?>    
        <?php   endif; ?>
       

        <script>
        function base_url(url) { return '<?php echo base_url('admin/'); ?>' + url; }
            function base_img(url) { return '<?php echo base_url('file/'); ?>' + url; }
            function redirect(href) { window.location.href = '<?php echo base_url('admin/'); ?>' + href; }
            function loader(btn){
                 var form = $(btn).closest('form');
                 form.prepend("<div class='loader-content'></div>");
            }
            function limpiarcampos(focus){
                $("input:password,input:file,input:text,textarea").val('');
                $("input:checkbox:checked").click();
                $("select").val(0);
                $('#'+focus).focus();               
            }
    // Solo permite ingresar numeros.
    function soloNum(e) {
    var key = window.Event ? e.which : e.keyCode
    return (key >= 48 && key <= 57)
    }
    function soloLetras(e) {
    var tecla = document.all ? tecla = e.keyCode : tecla = e.which;
    var especiales = [8, 32, 13]; /*back, space, enter */
    for (var i in especiales) {
    if (tecla == especiales[i]) {
    return true; /*break; */
    }
    }
    return (((tecla > 96 && tecla < 123) || (tecla > 64 && tecla < 91)) || tecla == 8);
    }
    </script>
    <style>
        
        .loader-content{
              z-index:1;
              background: url(<?php echo base_url('cms/images/ajax-loader.gif')?>) #eee center center no-repeat;
              position: absolute;
              width:100%;
              height:100%;
              opacity:0.4;

        }
    </style>

    </head>
    <body>
        <div id="wrapper">