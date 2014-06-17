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
		if(isset($_GET['categoria'])):
			$blog_page->exibir_blog($_GET['categoria']);
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
							
						echo limitar($objeto_resp->texto,200);
						
					$tag->close('div');
					
				$tag->close('div');
				
				$tag->elemento('h4');
					$tag->elemento('a','href="?p=post&id='.$objeto_resp->id.'" class="link" ');
						echo utf8_decode('Continuar lendo &raquo;');
					$tag->close('a');
				$tag->close('h4');
				
			$tag->close('article');	

	$tag->elemento('hr','','/');
endwhile;
	
	$tag->close('div');			
		$tag->elemento('aside','class="large-3 columns"');			
			$tag->elemento('h5');
				echo 'Categorias';
			$tag->close('h5');
			
			$tag->elemento('ul','class="side-nav"');
			$blog_page->listar_categorias();
			while($objeto_resp = $blog_page->retorna_dados()):
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
	