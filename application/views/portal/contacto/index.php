
		<!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-mini">

			<div class="container clearfix">
				<h1><?php echo $titulo ?></h1>
			
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url("inicio")?>">Inicio</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
				</ol>
			</div>

		</section><!-- #page-title end -->

		<!-- Google Map
		============================================= -->
		<section style="width:100%;height:400px;box-shadow: 1px 0px 13px 2px #ccc">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3902.5997546528492!2d-77.10762338457594!3d-12.002172944341856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105cc2b003c001f%3A0x760cfcdcab10aba1!2sIglesia+Misionera+Casa+De+Oracion!5e0!3m2!1ses!2spe!4v1554766541147!5m2!1ses!2spe" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
		</section>


		<section id="map-overlay">

			<div class="container clearfix">

				<!-- Contact Form Overlay
				============================================= -->
				<div id="contact-form-overlay" class="clearfix">

					<div class="fancy-title title-dotted-border">
						<h3>Enviar Correo</h3>
					</div>

					<div class="form-widget">

						<div class="form-result"></div>

						<!-- Contact Form
						============================================= -->
						<form class="nobottommargin" id="template-contactform" name="template-contactform" action="<?php echo base_url("portal/contacto/enviarcorreo") ?>" method="post">

							<div class="col_full">
								<label for="template-contactform-name">Nombre y Apellidos <small>*</small></label>
								<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
							</div>

							<div class="col_half ">
								<label for="template-contactform-email">Correo electrónico <small>*</small></label>
								<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
							</div>


							<div class="col_half col_last">
								<label for="template-contactform-phone">Celular</label>
								<input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
							</div>


							<div class="col_full">
								<label for="template-contactform-subject">Asunto <small>*</small></label>
								<input type="text" id="template-contactform-subject" name="subject" value="" class="required sm-form-control" />
							</div>

							<div class="col_full">
								<label for="template-contactform-message">Mensaje <small>*</small></label>
								<textarea class="required sm-form-control" id="template-contactform-message" name="template-contactform-message" rows="6" cols="30"></textarea>
							</div>

							<div class="col_full hidden">
								<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
							</div>

							<div class="col_full">
								<button class="button button-3d nomargin" type="submit" id="template-contactform-submit" name="template-contactform-submit" value="submit">Enviar Mensaje</button>
							</div>

							<input type="hidden" name="prefix" value="template-contactform-">

						</form>
					</div>



									<!-- Contact Info
					============================================= -->
					<div class="row clear-bottommargin">

						<div class="col-lg-4 col-md-4 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-map-marker2"></i></a>
								</div>
								<h3>Sede Principal<span class="subtitle">MZ B Lote 13, Urb. El Álamo, Callao - Perú</span></h3>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-phone3"></i></a>
								</div>
								<h3>Teléfonos<span class="subtitle">(01) 574 4857</span></h3>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-mail"></i></a>
								</div>
								<h3>Email<span class="subtitle">contacto@imcopna.org</span></h3>
							</div>
						</div>

						
					</div><!-- Contact Info End -->

			

		

				</div><!-- Contact Form Overlay End -->

			</div>


		</section><!-- Contact Form & Map Overlay Section End -->

				<div class="container clearfix">

					<div class="col_three_fifth topmargin-sm bottommargin">
						<img data-animate="fadeInLeftBig" src="<?php echo base_url("assets/portal/img/donacion.png") ?>" alt="Donacion">
					</div>

					<div class="col_two_fifth topmargin-sm bottommargin-lg col_last">

						<div class="heading-block topmargin">
							<h2>DONACIONES</h2>
							<span>Usted puede sembrar para las misiones, orando, dando y yendo.</span>
						</div>

						<p>Todas las donaciones que lleguen a esta iglesia, serán usadas exclusivamente para el avance del reino de Dios. Él nos pide en su palabra, que si sembramos algo para su reino debe ser hecho por amor. Toda siembra para el reino de Dios debe ser generosamente, para cosechar de igual manera. Pues toda persona, que sembró para el reino de Dios, ya sea en el antiguo como en el nuevo testamento, ha sido bendecida grandemente; tanto el que siembra como su descendencia.</p>
						
						<h5>CTA. CORRIENTE BCP EN SOLES:<span><p> 191-38499365-0-45</p></span></h5>
						

						<h5>CTA. CORRIENTE BCP EN DOLARES: <span><p>0011-0310-02-00474112</p></span></h5>
						

					</div>

				

				</div>