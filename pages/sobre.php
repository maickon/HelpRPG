<?php
$tag->elemento('div','class="row"');
	$tag->elemento('div','class="small-2 large-12 columns" align="center"');	
		$tag->elemento('h3');
			echo utf8_decode('Sobre');
		$tag->close('h3');
	$tag->close('div');
	$tag->elemento('div','class="small-2 large-12 columns"');
		$tag->elemento('div','class="panel radius"');
			$tag->elemento('h5');
				$tag->elemento('p');
					exibir_pagina($home_page='sobre_page',$classe='sobre_page');
				$tag->close('p');
			$tag->close('h5');
		$tag->close('div');
	$tag->close('div');
$tag->close('div');		
?>