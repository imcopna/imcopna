
				<div class="section notopmargin">

					<h4 class="uppercase center">Bienvenida de <span>Pastores principales</span> </h4>

					<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
						<div class="flexslider">
							<div class="slider-wrap">
								<div class="slide">
									<div class="testi-image">
										<a href="#"><?php base_img($tipo,"testimonials/pastores.jpg")?></a>
									</div>
									<div class="testi-content">
										<p>Damos Gloria y Honra al Dios viviente, quien por su misericordia nos escogió para el trabajo misionero mundial, impulsados por su amor divino.</p>
										<div class="testi-meta">
											PS. JUÁN HERNÁNDEZ Y PS. DELIA COLLAZOS
										</div>
									</div>
								</div>
								<div class="slide">
									<div class="testi-image">
										<a href="#"><?php base_img($tipo,"testimonials/samuel.jpg")?></a>
									</div>
									<div class="testi-content">
										<p>Agradecemos a Dios por el privilegio de servirle predicando su Palabra, con el compromiso de realizar la labor misionera y buscando unidos un Avivamiento Poderoso.</p>
										<div class="testi-meta">
											PS. SAMUEL HERNÁNDEZ Y PS. LENIRA ADAUTO
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
<div class="container clearfix topmargin-sm" id="servicios">

					<div class="heading-block center">
						<h3>Nuestros <span>Servicios</span> Locales</h3>
						<span>Damos la gloria y honra a nuestro Dios por estos servicios</span>
					</div>

					<div id="oc-portfolio" class="owl-carousel portfolio-carousel portfolio-nomargin carousel-widget" data-margin="1" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-xl="4">
<?php 	foreach($servicios as $s): ?>
					<div class="oc-item">
							<div class="iportfolio">
								<div class="portfolio-image">
									<a href="#servicios">
										<?php 	base_img($tipo,$s->img); ?>
										
									</a>
									<div class="portfolio-overlay">
										<a href="<?php echo base_url('assets/portal/img/'.$s->img)?>" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
									</div>
								</div>
								<div class="portfolio-desc">
									<h4><a href="<?php echo base_url('assets/portal/img/'.$s->img)?>" data-lightbox="image"><?php echo $s->Nombre?></a></h4>
									<span><?php echo $s->descripcion ?></span>
								</div>
							</div>
						</div>
<?php 	endforeach; ?>
					</div>

				</div>

<div class="section parallax bottommargin-lg notopmargin nobottommargin" style="background-image: url('assets/portal/img/parallax/4.jpg'); padding: 100px 0;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">
		<div class="heading-block center nobottomborder nobottommargin">
			<h2 style="color:#fff">"Somos una iglesia conservadora, que guarda la sana doctrina"</h2>
		</div>
</div>

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
						<div class="heading-block center">
						<h3><span>Eventos</span> Próximos</h3>
						<span>Nuestros eventos próximos a realizarse</span>
					</div>

					<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin clearfix">

						<div class="single-post nobottommargin">
							<?php 
								$cont = 11;
								$cla="";
								foreach($evento as $eve):
									if($eve->Principal == "1"):
								 ?>
							<!-- Single Post
							============================================= -->
							<div class="entry">

						
<a href="<?php echo base_url("e/$eve->IDent_Evento") ?>">
	<img src='<?php echo "file/$eve->Imagen"?>' alt="">
		<div class="overlay">
													<div class="text-overlay">
														<div class="text-overlay-title">
															<h3><?php echo $eve->Titulo ?></h3>
														</div>
														<div class="text-overlay-meta">
															<span><i class="icon-calendar3"></i><?php echo mostrar_fechas_eventos($eve) ?></span> <span style="margin-left: 8px"><i class="icon-eye"></i><?php echo $eve->Vistos?></span>
														</div>
													</div>
		</div>
</a>


							</div><!-- .entry end -->

						<?php endif; endforeach; ?>
					
					
							<div class="related-posts clearfix">
								<?php
								foreach($evento as $even):
									if($even->Principal!= "1"):
																						

					if(($cont%2) == 0){
					  $cla="col_last";
					} 
					 else  {
					 	$cla ="";
					 } ?>

								<div class="col_half nobottommargin  <?php echo $cla ?> "  style="margin-top: 8px;">

									<div class="mpost clearfix">
											
									
											<a href="<?php echo base_url("e/$even->IDent_Evento") ?>">
												<img src='<?php echo "file/$even->Imagen"?>' alt="" style="width:100%;height: 200px;">
<div class="overlay">
													<div class="text-overlay">
														<div class="text-overlay-title">
															<h3><?php echo $even->Titulo ?></h3>
														</div>
														<div class="text-overlay-meta">
															<span><i class="icon-calendar3"></i><?php echo mostrar_fechas_eventos($even) ?></span><span style="margin-left: 8px">    <i class="icon-eye"></i><?php echo $even->Vistos?></span>
														</div>
													</div>
		</div>
											</a>
										
										
									</div>	

																

								</div>	
								<?php $cont++; endif; endforeach; ?>				

							</div>



						</div>

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">

									<div class="widget clearfix">

								<div class="fb-page" data-href="https://www.facebook.com/Iglesia-Misionera-Casa-de-Oraci&#xf3;n-para-todas-las-Naciones-538221876597393" data-tabs="timeline" data-width="450" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Iglesia-Misionera-Casa-de-Oraci&#xf3;n-para-todas-las-Naciones-538221876597393" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Iglesia-Misionera-Casa-de-Oraci&#xf3;n-para-todas-las-Naciones-538221876597393">Iglesia Misionera Casa de Oración para todas las Naciones</a></blockquote></div>

						  </div>
						 	<!-- radio senda de vida
						 	<div class="widget clearfix">

								<h4>Radio Senda de Vida - La voz Misionera</h4>
								<div id="oc-portfolio-sidebar" class="owl-carousel carousel-widget" data-items="1" data-margin="10" data-loop="true" data-nav="false" data-autoplay="5000">

									<div class="oc-item">
										<div class="iportfolio">
											<div class="portfolio-image">
												<a href="http://www.sendadevidaradio.com/" target="_blank">
													<?php 	//base_img("portal","senda de vida.jpg"); ?>
												</a>
										
											</div>
											<div class="portfolio-desc center nobottompadding">
												<audio controls="" preload="none" autoplay="" style="width:100%;">
														<source src="http://94.23.6.53:8059/live" type="audio/mpeg">
												</audio>
											</div>
										</div>
									</div>

									
								</div>


							</div-->
				<div class="widget clearfix">
					<h4>Programación Semanal</h4>
					<div class="well ohidden ">
					
					<ul class="iconlist nobottommargin">
						<li><i class="icon-time color"></i> <strong>Lunes-Viernes: Oración Matutina</strong> 5am - 6am</li>
						<li><i class="icon-time color"></i> <strong>Lunes: Oración Serv. Jóvenes</strong> 8pm - 9pm</li>
						<li><i class="icon-time color"></i> <strong>Martes: Noche de Oración</strong> 7pm - 9pm</li>
						<li><i class="icon-time color"></i> <strong>Miércoles: Ayuno Congregacional</strong> 9am - 4pm</li>
						<li><i class="icon-time color"></i> <strong>Jueves: Escuelas Bíblicas</strong> 7pm - 9pm</li>
						<li><i class="icon-time color"></i> <strong>Sábados: Escuela de Matrimonios</strong> 7pm - 9pm</li>
						<li><i class="icon-time color"></i> <strong>Domingos: Culto Central</strong> 6:30pm - 9pm</li>
					</ul>
					<i class="icon-time bgicon"></i>
				</div>
				</div>
				
							

						</div>

					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->
						<!-- Content
		============================================= -->
		<section id="content" style="background-color: #C1ECE6">	
			<div class="content-wrap">
				<div class="promo promo-light promo-full bottommargin-lg header-stick notopborder">
					<div class="container clearfix">
						<h3>Puedes enviarnos tus peticiones para poder orar por ti a<span> contacto@imcopna.org</span></h3>
						<span>Estamos para atender todas tus consultas y peticiones de oración.</span>
						<a href="<?php echo base_url("contacto") ?>" class="button button-dark button-xlarge button-rounded">Contacto</a>
					</div>
				</div>

				<div class="container clearfix">

					<div class="heading-block center">
						<h3><span>Escuelas</span> Bíblicas</h3>
						<span>Hemos establecido las siguientes escuelas con la guianza de Dios, para la edificación de nuestros hermanos en la palabra de Dios.</span>
					</div>

					<div class="col_one_fourth nobottommargin">
						<div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="i-alt noborder icon-book"></i></a>
							</div>
							<h3>C.C.B<span class="subtitle">Centro de Crecimiento Bíblico</span></h3>
						</div>
					</div>

					<div class="col_one_fourth nobottommargin">
						<div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="i-alt noborder icon-book-open"></i></a>
							</div>
							<h3>E.B.D<span class="subtitle">Escuela Bíblica de Discipulado</span></h3>
						</div>
					</div>

					<div class="col_one_fourth nobottommargin">
						<div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="i-alt noborder icon-book-reader"></i></a>
							</div>
							<h3>E.B.L<span class="subtitle">Escuela Bíblica de Liderazgo</span></h3>
						</div>
					</div>

					<div class="col_one_fourth nobottommargin col_last">
						<div class="feature-box fbox-center fbox-light fbox-effect nobottomborder">
							<div class="fbox-icon">
								<a href="#"><i class="i-alt noborder icon-study"></i></a>
							</div>
							<h3>E.P.A.M.I <span class="subtitle">Escuela de Preparación y Adiestramiento Misionero Interno</span></h3>
						</div>
					</div>

					<div class="clear"></div>

				</div>	
			</div>
				</section>			

<div class="container clearfix">
				<div id="oc-clients" class="section nobgcolor notopmargin owl-carousel owl-carousel-full image-carousel footer-stick carousel-widget" data-margin="80" data-loop="true" data-nav="false" data-autoplay="4000" data-pagi="false" data-items-xs="2" data-items-sm="3" data-items-md="4" data-items-lg="5" data-items-xl="6">

					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/acm.png")?> </a></div>
					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/adp.png")?></a></div>
					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/clr.png")?></a></div>
					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/imec.png")?></a></div>
					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/lp.png")?></a></div>
					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/mc.png")?></a></div>
					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/mmm.png")?></a></div>
					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/rav.png")?></a></div>
					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/sion.png")?></a></div>
					<div class="oc-item"><a href="#"><?php base_img($tipo,"alianzas/senda de vida.jpg")?></a></div>

				</div>
			</div>