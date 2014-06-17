<?php
$tag->elemento('div','class="row"');
	$tag->elemento('div','class="large-12 columns"');
		$tag->elemento('h1');
			echo '<small>Blog Help Rpg - Sejam bem vindos aventureiros.</small>';
		$tag->close('h1');
		$tag->elemento('hr','','/');
	$tag->close('div');
$tag->close('div');

	$tag->elemento('div','class="row"');
		$tag->elemento('div','class="large-9 columns" role="content"');
		$blog_page = new blog_page();

		if(isset($_GET['id'])):
			$blog_page->exibir_post($_GET['id']);
		else:	
			$blog_page->exibir_blog();
		endif;
		while($objeto_resp = $blog_page->retorna_dados()):
			$tag->elemento('article');
				$tag->elemento('h3');
					$tag->elemento('a','href="#"');
						echo $objeto_resp->titulo;
					$tag->close('a');
				$tag->close('h3');
	
				$tag->elemento('h6');
					echo data_postagem($objeto_resp->usuario,$objeto_resp->data);
				$tag->close('h6');
				
				$tag->elemento('div','class="row"');
					$tag->elemento('div','class="large-12 columns"');
							
						echo $objeto_resp->texto;
						
					$tag->close('div');
				
					$comentario_blog = new comentario_blog();
					$comentario_blog->listar_comentarios($_GET['id']);
					$tag->elemento('h4');
						echo utf8_decode('Comentários');
					$tag->close('h4');
					while($objeto_resp = $comentario_blog->retorna_dados()):
						$tag->elemento('div','class="large-12 columns"');
							$tag->elemento('div','class="panel"');
								$tag->elemento('h6');
									if($objeto_resp->usuario == ''):
										echo data_comentario('um fan',$objeto_resp->data);
									else:
										echo data_comentario($objeto_resp->usuario,$objeto_resp->data);
									endif;
								$tag->close('h6');
				
								$tag->elemento('div','class="row"');
									$tag->elemento('div','class="large-12 columns"');
										echo $objeto_resp->texto;
									$tag->close('div');	
								$tag->close('div');
							$tag->close('div');
						$tag->close('div');
					endwhile;
				$tag->close('div');
				
				load_modulo('comentario_blog','postar');
				
			$tag->close('article');	

	$tag->elemento('hr','','/');
endwhile;
	
	$tag->close('div');			
		$tag->elemento('aside','class="large-3 columns"');			
			$tag->elemento('h5');
				echo 'Categorias';
			$tag->close('h5');
			
			$tag->elemento('ul','class="side-nav"');
			$listar = new blog_page();
			$listar->listar_categorias();
			while($objeto_resp = $listar->retorna_dados()):
				$tag->elemento('li');
					$tag->elemento('a','href="?p=blog&categoria='.$objeto_resp->categoria.'" class="link"');
						echo $objeto_resp->categoria;
					$tag->close('a');
				$tag->close('li');
			endwhile;	
			$tag->close('ul');
	
		$tag->elemento('div','class="panel"');
			$tag->elemento('h5');
				echo 'Anuncios';
			$tag->close('h5');
			
			$tag->elemento('p');
				exibir_pagina_escolida('msg_anuncio','msg_anuncio','anuncio_mensalidade');
			$tag->close('p');
			$tag->elemento('a','href="#"');
				echo 'Read More &rarr;';
			$tag->close('a');
		$tag->close('div');
	$tag->close('aside');
$tag->close('div');		
		
?>
	