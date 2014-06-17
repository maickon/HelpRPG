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
				echo 'Painel do Aventureiro';
			$tag->close('title');
			$tag->loadJs('jquery');
			$tag->loadJs('jquery_validate');
			$tag->loadJs('jquery_validate_messages');
			$tag->loadCss('foundation');
			$tag->loadCss('index');
			$tag->loadCss('data_table');
			$tag->loadJs('custom.modernizr');
			$tag->loadCkEditor(CKEDITORPATH.'ckeditor');
	$tag->close('head');
	
	$tag->elemento('body');
		require('top-cliente-bar.php');
		require('logo-bar.php');
		$tag->elemento('div','class="row"');
			$tag->elemento('div','class="small-2 large-12 columns v"');	
			$tag->elemento('br');
				if(isset($modulo) && isset($tela)):
					load_modulo($modulo,$tela);
				else:
					$tag->elemento('div','class="small-2 large-12 columns"');
						$tag->elemento('div','class="panel"');
							exibir_pagina_escolida('msg_anuncio','msg_anuncio','sobre');
						$tag->close('div');
					$tag->close('div');	
					
					$tag->elemento('div','class="small-2 large-6 columns"');
						$tag->elemento('div','class="panel"');
							exibir_pagina_escolida('msg_anuncio','msg_anuncio','armaduras');
							echo '<h5>Existem '.total_recursos('armaduras','armaduras').' armaduras adicionais para usuários aventureiros.</h5>';
						$tag->close('div');		
					$tag->close('div');
					
					$tag->elemento('div','class="small-2 large-6 columns"');
						$tag->elemento('div','class="panel"');
							exibir_pagina_escolida('msg_anuncio','msg_anuncio','armas');
							echo '<h5>Existem '.total_recursos('armas','armas').' armas adicionais para usuários aventureiros.</h5>';
						$tag->close('div');		
					$tag->close('div');
					
					$tag->elemento('div','class="small-2 large-6 columns"');
						$tag->elemento('div','class="panel"');
							exibir_pagina_escolida('msg_anuncio','msg_anuncio','artefatos');
							echo '<h5>Existem '.total_recursos('artefatos','artefatos').' artefatos adicionais para usuários aventureiros.</h5>';
						$tag->close('div');		
					$tag->close('div');
					
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