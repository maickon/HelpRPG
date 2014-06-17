<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/index.css" />
<?php
require('funcoes.php');
$tag = new tags();
$tag->elemento('html');
	$tag->elemento('head');
		$tag->elemento('charset="utf-8"');
		$tag->elemento('name="viewport" content="width=device-width"');
			$tag->elemento('title');
				echo 'Help RPG';
			$tag->close('title');				
			$tag->loadJs('jquery');
			$tag->loadJs('jquery_validate');
			$tag->loadJs('jquery_validate_messages');
			$tag->loadCss('data_table');			
			$tag->loadCss('foundation');
			$tag->loadCss('index');
			$tag->loadJs('custom.modernizr');
			$tag->loadCkEditor(CKEDITORPATH.'ckeditor');
	$tag->close('head');
	
	$tag->elemento('body');
		require('top-bar.php');
		require('logo-bar.php');
		$tag->elemento('div','class="row"');
			$tag->elemento('div','class="small-2 large-12 columns v"');	
			$tag->elemento('br');
				if(isset($_GET['p'])):
					rotear_pagina($_GET['p']);
				else:
					load_page('principal','index');
				endif;	
			$tag->close('div');
		$tag->close('div');
		require('footer.php');
?>
	
	<script>
	  document.write('<script src=' +
	  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
	  '.js><\/script>')
	  </script>
	 
	  <script src="js/foundation.min.js"></script>
	  
	  <script>
		$(document).foundation();
	  </script>
	<?php
	$tag->close('body');
$tag->close('html');
?>