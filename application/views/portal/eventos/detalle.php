<style>
	
.cont{
	background-color: #f9f9f9;
	padding: 10px;
	margin-bottom: 15px;
	box-shadow:0px 2px 5px 1px #ccc;
}

</style>


		<!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-mini">

			<div class="container clearfix">
				<h1><?php echo $titulo ?></h1>
			
				<!--ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url("inicio")?>">Inicio</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
				</ol-->
			</div>

		</section><!-- #page-title end -->
<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<!-- Post Content
			============================================= -->
			<div class="postcontent nobottommargin clearfix">
				<div class="single-post nobottommargin">
					<!-- Single Post
					============================================= -->
					<div class="">
						<?php foreach($evento as $e):endforeach; ?>


						<!-- Entry Title
						============================================= -->
						<div class="entry-title">
							<nav aria-label="breadcrumb">
  <ol class="breadcrumb2">
    <li class="breadcrumb-item"><a href="<?php echo base_url("inicio")?>">Inicio</a></li>
    <li class="breadcrumb-item"><a href="#">Eventos</a></li>
    <li class="breadcrumb-item active"><?php echo $e->Titulo ?></li>
  </ol>
</nav>
							</div><!-- .entry-title end -->
							<!-- Entry Meta
							============================================= -->
							
					
								<!-- Entry Image
								============================================= -->
								<div class="entry-image">
									<a href="<?php echo base_url('file/'.$e->Imagen)?>" data-lightbox="image">
										<img src="<?php echo base_url('file/'.$e->Imagen)?>" alt="Imagen de Evento" >
<div class="overlay">
													<div class="text-overlay">
														<div class="text-overlay-title">
															<h3><?php echo $e->Titulo ?></h3>
														</div>
														<div class="text-overlay-meta">
															<span><i class="icon-calendar3"></i><?php echo mostrar_fechas_eventos($e) ?></span> <span style="margin-left: 8px"><i class="icon-eye"></i><?php echo $e->Vistos?></span>
														</div>
													</div>
		</div>
									</a>
									 <div class="fb-like" data-href='<?php echo base_url("e/$e->IDent_Evento") ?>' data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
			
									</div><!-- .entry-image end -->
									<!-- Entry Content
									============================================= -->
									<div class="entry-content notopmargin text-justify">
									<?php echo $e->Contenido ?>
										<div class="fb-comments" data-href='<?php echo base_url("e/$e->IDent_Evento") ?>' data-width="100%" data-numposts="5"></div>
										
										<div class="clear"></div>
										
									</div>
									</div><!-- .entry end -->
									

									</div>
									</div><!-- .postcontent end -->
									<!-- Sidebar
									============================================= -->
									<div class="sidebar nobottommargin col_last clearfix">
										<div class="sidebar-widgets-wrap">
											<div class="widget clearfix">
												<h4>Otros eventos</h4>
												<?php foreach($e_rows as $row): ?>
													<?php if($row->IDent_Evento <> $e->IDent_Evento){ ?>
													<div class="cont">
														
													<div class="entry-image">
														<a href="<?php echo base_url("e/$row->IDent_Evento") ?>">
															<img class="image_fade" src="<?php echo base_url('file/'.$row->Imagen) ?>" alt="imagen evento" style="opacity: 1;">
															<div class="overlay">
													<div class="text-overlay">
														<div class="text-overlay-title">
															<h3><?php echo $row->Titulo ?></h3>
														</div>
														<div class="text-overlay-meta">
															<span><i class="icon-calendar3"></i><?php echo mostrar_fechas_eventos($row) ?></span> <span style="margin-left: 8px"><i class="icon-eye"></i><?php echo $row->Vistos?></span>
														</div>
													</div>
		</div>
														</a>
														<!-- Your like button code -->
										</div>
													
													<!--ul class="entry-meta clearfix">
														<li><i class="icon-calendar3"></i> 
															
															<?php echo  mostrar_fechas_eventos($row) ?>
															
														</li>
														<li><a href="blog-single.html#comments"><i class="icon-eye"></i> <?php echo $row->Vistos ?></a></li>
														
													</ul-->
													</div>
												<?php } ?>
											<?php endforeach; ?>
												
												
											</div>
											
										</div>
										</div><!-- .sidebar end -->
									</div>
								</div>
								</section><!-- #content end -->