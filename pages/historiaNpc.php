<?php
//&raquo;
$tag = new tags();

$tag->elemento('div','class="small-2 large-12 columns"');	
	$tag->elemento('ul','class="inline-list"');
		$tag->elemento('li');
			$tag->elemento('a','href="index.php?p=historias"');
				$tag->elemento('b');
					echo utf8_decode('Histórias &rArr;');
				$tag->close('b');
			$tag->close('a');
		$tag->close('li');
		
		$tag->elemento('li');
			$tag->elemento('a','href="index.php?p=historias_play"');
				echo utf8_decode('História Jogada &rArr;');
			$tag->close('a');
		$tag->close('li');
		
		$tag->elemento('li');
			$tag->elemento('div');
				$tag->elemento('b');
					echo utf8_decode('Agora qualquer Npc comum pode ter uma simples história.');
				$tag->close('b');
			$tag->close('div');
		$tag->close('li');
	$tag->close('ul');				
$tag->close('div');

$tag->elemento('div','class="small-2 large-12 columns"');	
	$x=0;
	while($x < 3):
		$tag->elemento('div','class="small-2 large-12 columns"');	
			$hist[$x] = new historias();
			$tag->elemento('div','class="historia_npc"');
			
				$tag->elemento('div','class="nome"');
					echo ($hist[$x]->getNome()); 
				$tag->close('div');
				$inicio = $hist[$x]->inicio();
				$meio = $hist[$x]->meio();
				$fim = $hist[$x]->fim();
				$tag->elemento('div','class="descricao_h h"');
					echo ($inicio.' '.$meio.' '.$fim);
				$tag->close('div');
				
			$tag->close('div');
			
		$tag->close('div');
	$x++;
	endwhile;
$tag->close('div');
	
?>