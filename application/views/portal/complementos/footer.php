	<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_one_third">

						<div class="widget clearfix">
							<?php 
							$array = array("clase"=>"footer-logo","estilo"=>"max-width: 30%");
							base_img($tipo,"logoministerio.png",$array)?>

							<div style="background: url('assets/portal/img/world-map.png') no-repeat center center;">
								<address>
									<strong>Dirección:</strong><br>
									MZ B Lote 13, Urb. El Álamo<br>
									Callao - Perú<br>
								</address>
								<abbr title="Número Telefónico"><strong>Teléfono:</strong></abbr> (01) 574 4857<br>
								<abbr title="Correo electrónico"><strong>Email:</strong></abbr> info@imcopna.org
							</div>

						</div>

					</div>

					<div class="col_one_third">

						<div class="widget clearfix">
							<h4>Citas Bíblicas</h4>

							<div class="fslider testimonial no-image nobg noborder noshadow nopadding" data-animation="slide" data-arrows="false">
								<div class="flexslider">
									<div class="slider-wrap">
										<div class="slide">
											<div class="testi-image">
												<a href="#"><img src="" alt="Customer Testimonails"></a>
											</div>
											<div class="testi-content">
												<p>Ten cuidado de ti mismo y de la doctrina; persiste en ello, pues haciendo esto, te salvarás a ti mismo y a los que te oyeren.</p>
												<div class="testi-meta">
													1 Timoteo
													<span>4:16</span>
												</div>
											</div>
										</div>
										<div class="slide">
											<div class="testi-image">
												<a href="#"><img src="" alt="Customer Testimonails"></a>
											</div>
											<div class="testi-content">
												<p>Jesús le dijo: Yo soy el camino, la verdad, y la vida; nadie viene al Padre, si no  por mí.</p>
												<div class="testi-meta">
													San Juan
													<span>14:6</span>
												</div>
											</div>
										</div>
										<div class="slide">
											<div class="testi-image">
												<a href="#"><img src="" alt="Customer Testimonails"></a>
											</div>
											<div class="testi-content">
												<p>Tu oyes la oración; a tí vendrá toda carne.</p>
												<div class="testi-meta">
													Salmos
													<span>65:2</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>

						<div class="widget clearfix">

							<a href="https://www.facebook.com/Iglesia-Misionera-Casa-de-Oraci%C3%B3n-para-todas-las-Naciones-538221876597393/" class="social-icon si-small si-rounded si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-rounded si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

						</div>

					</div>

					<div class="col_one_third col_last">

						<div class="widget quick-contact-widget form-widget clearfix">

							<h4>Envianos un mensaje</h4>

							<div class="form-result"></div>

							<form id="quick-contact-form" name="quick-contact-form" action="<?php echo base_url("portal/contacto/enviarcorreo") ?>" method="post" class="quick-contact-form nobottommargin">

								<div class="form-process"></div>

								<div class="input-group divcenter">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="icon-user"></i></div>
									</div>
									<input type="text" class="required form-control" id="quick-contact-form-name" name="template-contactform-name" value="" placeholder="Nombre completo" />
								</div>
								<div class="input-group divcenter">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="icon-email2"></i></div>
									</div>
									<input type="text" class="required form-control email" id="quick-contact-form-email" name="template-contactform-email" value="" placeholder="Correo electrónico" />
								</div>
								<textarea class="required form-control input-block-level short-textarea" id="quick-contact-form-message" name="template-contactform-message" rows="4" cols="30" placeholder="Mensaje..."></textarea>
								<input type="text" class="hidden" id="quick-contact-form-botcheck" name="quick-contact-form-botcheck" value="" />
								<input type="hidden" name="prefix" value="template-contactform-">
								<button type="submit" id="quick-contact-form-submit" name="template-contactform-submit" class="btn btn-danger nomargin" value="submit">Enviar</button>

							</form>

						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>
	</footer><!-- #footer end -->
		