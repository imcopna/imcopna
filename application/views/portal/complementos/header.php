<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="Bite Consulting" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url("assets/portal/img/logo.ico") ?>">
	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />

	<?php base_css($tipo,"bootstrap.css") ?>
	<?php base_css($tipo,"style.css") ?>
	<?php base_css($tipo,"dark.css") ?>
	<?php base_css($tipo,"font-icons.css") ?>
	<?php base_css($tipo,"animate.css") ?>
	<?php base_css($tipo,"magnific-popup.css") ?>
	<?php base_css($tipo,"responsive.css") ?>
	<?php base_css($tipo,"plugins/font-awesome.min.css") ?>
	

	<?php //base_css("admin","style.css") ?>



	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- estilos propios
	============================================= -->
	<?php base_css($tipo,"custom.css") ?>

	<?php base_css($tipo,"slide.css") ?>

<script type="text/javascript">
	function base(url){return '<?php echo base_url('/assets/portal/img/'); ?>'+ url ;}
	function base_url(url) { return '<?php echo base_url('portal/'); ?>' + url; }
</script>
 <?php foreach($this->header as $h): ?>
    <?php echo $h; ?>        
    <?php endforeach; ?>
 <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

	<!-- Document Title
	============================================= -->
	<title>Iglesia Misionera Casa de Oración para todas las Naciones</title>
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            facebook: "538221876597393", // Facebook page ID
            call_to_action: "Dejanos un mensaje", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>

</head>

<body class="stretched sticky-responsive-menu">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2"></script>

<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2&appId=158902668087897&autoLogAppEvents=1"></script>
	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">