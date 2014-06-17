<?php
//&raquo;
$tag = new tags();
$avent = new aventuras();

$tag->elemento('div','class="small-2 large-12 columns"');	
	$tag->elemento('ul','class="inline-list"');
		$tag->elemento('li');
			$tag->elemento('a','href="index.php?p=aventuras"');
				$tag->elemento('b');
					echo utf8_decode('Aventuras &rArr;');
				$tag->close('b');
			$tag->close('a');
		$tag->close('li');
		
		$tag->elemento('li');
			$tag->elemento('div');
				$tag->elemento('b');
					echo utf8_decode('São mais de 100 idéias disponíveis para você mestrar.');
				$tag->close('b');
			$tag->close('div');
		$tag->close('li');
	$tag->close('ul');				
$tag->close('div');

$tag->elemento('div','class="small-2 large-12 columns"');	
	$avent->retornar_aventura();
	while($objeto_resp = $avent->retorna_dados()):
		$tag->elemento('div','class="small-2 large-12 columns"');	
			
			$tag->elemento('div','class="historia_npc"');
			
				$tag->elemento('div','class="nome"');
					echo ($objeto_resp->titulo); 
				$tag->close('div');
				
				$tag->elemento('div','class="descricao_h h"');
					echo ($objeto_resp->texto); 
				$tag->close('div');
				
			$tag->close('div');
			
		$tag->close('div');
	endwhile;
$tag->close('div');
	
?>