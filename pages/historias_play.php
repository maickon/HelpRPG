<?php
//&raquo;
$tag = new TagElement();
$tag->div('small-2 large-12 columns');	
	$tag->ul('inline-list');
		$tag->li();
			$tag->a('index.php?p=historias');
				echo utf8_decode('Histórias Montadas &rArr;');
			$tag->Ca();
		$tag->Cli();
		
		$tag->li();
			$tag->a('index.php?p=historias_play');
				$tag->b();
					echo utf8_decode('Cenário do jogo &rArr;');
				$tag->Cb();
			$tag->Ca();
		$tag->Cli();
		
		$tag->li();
			$tag->div();
				$tag->b();
					echo utf8_decode('Este cenário foi projetado pela equipe do Help RPG.');
				$tag->Cb();
			$tag->Cdiv();
		$tag->Cli();
	$tag->Cul();				
$tag->Cdiv();

$tag->div('small-2 large-12 columns');	
	
	$tag->div('row');
		$tag->div('small-2 large-12 columns');	
		
			$tag->div('panel radius');
				
				echo utf8_decode('<h2 align="center"> Índice</h2>');
				$tag->h5();
					$tag->p();
						if(isset($_GET['id']) && $_GET['id']!= ''):
							exibir_historia($home_page='hist_page',$classe='hist_page',$_GET['id']);
							voltar();
						else:
							ordenar_itens_de_pagina($home_page='hist_page',$classe='hist_page');
						endif;
					$tag->Cp();
					
				$tag->Ch5();
			$tag->Cdiv();	
		$tag->Cdiv();
	$tag->Cdiv();	
$tag->Cdiv();
	
?>