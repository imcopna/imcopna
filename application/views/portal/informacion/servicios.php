
		<!-- Page Title
		============================================= -->
		<section id="page-title" class="page-title-mini">

			<div class="container clearfix">
				<h1><?php echo $titulo ?></h1>
				<span><?php echo $subtitulo ?></span>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url("inicio")?>">Inicio</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo ?></li>
				</ol>
			</div>

		</section><!-- #page-title end -->

				<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_full">
							

						<div class="heading-block center">
							<h2>Nuestros  <span>Servicios Locales</span></h2>
							<span><?php echo $subtitulo ?></span>
						</div>




						<div class="tabs side-tabs responsive-tabs tabs-bordered clearfix" id="tab-4">

							<ul class="tab-nav clearfix">

								<?php 
								$i =1;
								foreach($servicios as $ser): ?>
								<li><a href="#snav-content<?php echo $i ?>" data-id='<?php echo $ser->idServicios ?>'><?php echo $ser->Nombre ?></a></li>

								<?php 
								$i++;
								endforeach; ?>

							
							</ul>

							<div class="tab-container">
							
							<?php 
							$j =1;
							foreach($servicios as $p): ?>
						    <div class="tab-content clearfix" id="snav-content<?php echo $j ?>">
									
							<h4><?php echo substr($p->Nombre,0,8) ?><span><?php echo substr($p->Nombre,8) ?></span></h4>


							<div class="row">
								<div class="col-sm-5">

								

								<div class="accordion accordion-bg clearfix">

									<?php foreach($p->responsables as $resp): ?>

									<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i><?php echo $resp->Cargo ?></div>

									<div class="acc_content clearfix" style="display: none;">

										<ul class="iconlist iconlist-color nobottommargin">
											<?php foreach($resp->cargo as $car): ?>
											<li><i class="icon-ok"></i><?php echo $car->Nombre." ".$car->ApePaterno." ".$car->ApeMaterno ?></li>

											<?php endforeach; ?>

										</ul>

									</div>
								<?php endforeach; ?>

								

								</div>

							</div>

							<div class="col-sm-7 imagen">
								
									<a href="" data-lightbox="image"><img class="image_fade alignright img-responsive" src="" alt="" style="margin-top: 5px;"></a>



							</div>

							</div>
							
							

							

								</div>
							<?php $j++;
								endforeach; ?>
						

							</div>

						</div>
</div>
</div>
</div>
</section>
