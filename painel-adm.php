<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/index.css" />
<?php
if(isset($_GET['m'])) $modulo = $_GET['m'];
if(isset($_GET['t'])) $tela = $_GET['t'];
require('funcoes.php');
//protegeArquivo(basename(__FILE__)); loopde redirirecionamento
$tag = new tags();
$tag->elemento('html');
	$tag->elemento('head');
		$tag->elemento('charset="utf-8"');
		$tag->elemento('name="viewport" content="width=device-width"');
			$tag->elemento('title');
				echo 'Painel Administrativo';
			$tag->close('title');
			$tag->loadJs('jquery');
			$tag->loadJs('jquery_validate');
			$tag->loadJs('jquery-ui');
			$tag->loadJs('jquery-ui-1.10.3.custom.min');
			$tag->loadJs('jquery_validate_messages');
			$tag->loadCss('foundation');
			$tag->loadCss('jquery-ui');
			$tag->loadCss('index');
			$tag->loadCss('data_table');
			$tag->loadJs('custom.modernizr');
			$tag->loadCkEditor(CKEDITORPATH.'ckeditor');
	$tag->close('head');
	
	$tag->elemento('body');
		require('top-adm-bar.php');
		require('logo-bar.php');
		$tag->elemento('div','class="row"');
			$tag->elemento('div','class="small-2 large-12 columns v"');	
			$tag->elemento('br');
				if(isset($modulo) && isset($tela)):
					load_modulo($modulo,$tela);
				else:
					$tag->elemento('h1','align="center"');
						echo 'Seja bem vindo ao painel adminstrativo do Help RPG.';
					$tag->close('h1');
					$tag->elemento('h4','align="center"');
						echo 'Selecione a opção desejada para dar inicio a administração do sistema.';
					$tag->close('h4');
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