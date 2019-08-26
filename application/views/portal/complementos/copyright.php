	<!-- Copyrights

			============================================= -->

			<div id="copyrights">



				<div class="container clearfix">

					<div class="row">

							<div class="col-lg-4">

											Copyright &copy; <?php echo date('Y') ?> Todos los derechos reservados.

										</div>



										<div class="col-lg-8">

											<div class="fright clearfix">

												<div class="copyrights-menu copyright-links nobottommargin">

													<a href="<?php echo base_url('inicio'); ?>">Página principal</a>/<a href="#">Información</a>/<a href="#">Misiones</a>/<a href="#">Multimedia</a>/<a href="#">Donaciones</a>/<a href="#">Eventos</a>/<a href="#">Contacto</a>

												</div>

											</div>

										</div>

					</div>

				</div>



			</div><!-- #copyrights end -->



	



	</div><!-- #wrapper end -->



	<!-- Go To Top

	============================================= -->

	<div id="gotoTop" class="icon-angle-up"></div>



	<!-- External JavaScripts

	============================================= -->

	<?php base_js($tipo,"jquery.js"); ?>

	<?php base_js($tipo,"plugins.js"); ?>



	<!-- Footer Scripts

	============================================= -->

	<?php base_js($tipo,"functions.js"); ?>



	

 <!-- slide-->

    <?php  if($this->uri->segment(1) == "inicio" || $this->uri->segment(1) == ""): ?>

           <?php base_js($tipo,"slide.js"); ?>  

    <?php   endif; ?>



	 <!-- servicios-->

    <?php  if($this->uri->segment(1) == "servicios"): ?>

            <?php base_js($tipo,"servicio.js"); ?>    

    <?php   endif; ?>


<script>

	$(document).ready(function(){

	 $('.contenido').css('text-align','justify');

		var texto, padre;

			$(".contenido").each(function(){

			    texto = $(this).html();

			    id = $(this).attr('data-id');

			    this.setAttribute("data-texto", texto);

			    //console.log($(this).html().length);

			    if ($(this).html().length > 40){

			        $(this).html(texto.substr(0, 75) + "...  <a href='' class = 'more-link' >Ver más</a>");

			    }

			});



	});



</script>

</body>

</html>