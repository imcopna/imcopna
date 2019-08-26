  </div>
                </div>
                <div class="footer">
                    <div class="pull-right">
                      
                        <strong>Copyright</strong> Todos los derechos reservados <a href="http://www.bite-consulting.com" target="_blank">Bite Consulting</a> &copy; 2018
                    </div>
                </div>
            </div>
        </div>

        </div>


    </div>
     <!-- Mainly scripts -->
     <?php base_js($this->tipo,"jquery-2.1.1.js"); ?>
     <?php base_js($this->tipo,"jquery-ui-1.10.4.min.js"); ?>
     <?php base_js($this->tipo,"bootstrap.min.js"); ?>
     <?php base_js($this->tipo,"plugins/metisMenu/jquery.metisMenu.js"); ?>
     <?php base_js($this->tipo,"plugins/slimscroll/jquery.slimscroll.min.js"); ?>

    <!-- Custom and plugin javascript -->
     <?php base_js($this->tipo,"inspinia.js"); ?>
     <?php base_js($this->tipo,"plugins/pace/pace.min.js"); ?>
   
    <!-- iCheck -->
    <?php base_js($this->tipo,"plugins/iCheck/icheck.min.js"); ?>

    <!-- Color picker -->
     <?php base_js($this->tipo,"plugins/colorpicker/bootstrap-colorpicker.min.js"); ?>


    <!-- valida los formularios -->
    <?php base_js($this->tipo,"jquery.validate.js"); ?>

      <?php base_js($this->tipo,"plugins/sweetalert2/sweetalert2.all.js") ?>
      

    <!-- Eventos-->
    <?php  if($this->uri->segment(1)."/".$this->uri->segment(2) == "admin/eventos"): ?>
            <?php base_js($this->tipo,"tinymce/js/tinymce/tinymce.min.js"); ?>
            <?php base_js($this->tipo,"eventos.js"); ?>
            <script>tinymce.init({ selector:'#cont', theme: 'modern' });</script>
    
    <?php   endif; ?>

    <!-- parametros-->
    <?php  if($this->uri->segment(1)."/".$this->uri->segment(2) == "admin/parametros"): ?>
            <?php base_js($this->tipo,"parametro.js"); ?>    
    <?php   endif; ?>


   <!-- Usuario-->
    <?php  if($this->uri->segment(1)."/".$this->uri->segment(2) == "admin/usuario"): ?>
            <?php base_js($this->tipo,"usuario.js"); ?>    
    <?php   endif; ?>

      <!-- Slide-->
    <?php  if($this->uri->segment(1)."/".$this->uri->segment(2) == "admin/slide"): ?>
       <?php base_js($this->tipo,"plugins/bootstrap-slider/bootstrap-slider.js"); ?> 
      <!-- bootstrap slider -->
      <?php base_js($this->tipo,"slide.js"); ?>    
    <?php   endif; ?>

    <!-- iCheck -->
    <?php   base_js($this->tipo,"plugins/iCheck/icheck.min.js") ?>

        <script>

          $(document).on("ready",function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });

                       //Colorpicker
          $('.my-colorpicker').colorpicker();
            });

   
        </script>

</body>
</html>