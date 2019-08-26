
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

								<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_full">
							

						<div class="heading-block center">
							<h2>Trasmisión  <span>en vivo</span></h2>
							<span><?php echo $subtitulo ?></span>
						</div>
</div>


<?php foreach($trasmision as $t): 
	if($t->principal == "1"): ?>

		<div class="fb-video" data-href="<?php echo $t->url ?>" data-width="500" data-show-text="true"></div>
		<div class="line"></div>

<?php endif; ?>
<?php endforeach; ?>

<div class="row" >
	<?php foreach($trasmision as $tr): 
if($tr->principal == "0"): ?>
	<div class="col-sm-3" style="margin-top: 8px;">
	<div class="fb-video" data-href="<?php echo $tr->url ?>" data-width="500" data-show-text="true"></div>
	</div>
	<?php endif; ?>
<?php endforeach; ?>
</div>
	
</div>


</div>
</div>
</section>