<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?=config_item('web_title'); ?></title>

		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link href="<?=base_url("favicon.ico")?>" rel="shortcut icon"  type="image/vnd.microsoft.icon"/>
		<link rel="stylesheet" href="<?=config_item("bootstrap")?>bootstrap.min.css" />
		<link rel="stylesheet" href="<?=config_item("font_awesome")?>css/font-awesome.min.css" />
		<link rel="stylesheet" href="<?=config_item("css")?>fonts.googleapis.com.css" />
		<link rel="stylesheet" href="<?=config_item("css")?>ace.min.css" />
		<link rel="stylesheet" href="<?=config_item("css")?>ace-rtl.min.css" />

		<script src="<?=config_item("js")?>jquery-2.1.4.min.js"></script>
	</head>

	<body class="login-layout " style="background-image:url('<?=base_url('assets/front/imgs/header.jpg')?>');">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<?php
				          echo $contents;
				        ?>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?=config_item("js")?>jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});

			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>
	</body>
</html>
