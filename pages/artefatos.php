<?php
//&raquo;
$tag->elemento('div','class="small-2 large-12 columns"');	
	$tag->elemento('ul','class="inline-list"');
		$tag->elemento('li');
			$tag->elemento('a','href="index.php?p=artefatos"');
				$tag->elemento('b');
					echo utf8_decode('Artefatos &rArr;');
				$tag->close('b');
			$tag->close('a');
		$tag->close('li');
		
		$tag->elemento('li');
			$tag->elemento('div');
				$tag->elemento('b');
					echo utf8_decode('Dentre os três artefatos sorteados você pode escolher um entre eles e dar de presente como recompensa de uma aventura. Obs: os artefatos sorteados podem vir repetidos.');
				$tag->close('b');
			$tag->close('div');
		$tag->close('li');
	$tag->close('ul');				
$tag->close('div');

$tag->elemento('div','class="small-2 large-12 columns"');	
	$artefato = new artefatos();
	$artefato->gerar_artefatos();
	while($objeto_resp = $artefato->retorna_dados()):
		$tag->elemento('div','class="armas"');	
					
			$tag->elemento('div','class="nome"');
				echo ($objeto_resp->nome);
			$tag->close('div');
		
			$tag->elemento('div','class="bloco1"');	
				$tag->elemento('div','class="dados h"');
					echo utf8_decode('<b>ID #</b>'.$objeto_resp->id);
				$tag->close('div');
				
				$tag->elemento('div','class="dados h"');
					echo utf8_decode('<b>Descrição: </b>'.$objeto_resp->descricao_regra);
				$tag->close('div');
			$tag->close('div');
				$tag->elemento('div','class="descricao h"');
					echo utf8_decode('<b>História: </b>'.$objeto_resp->descricao_hist);
				$tag->close('div');
		$tag->close('div');
	endwhile;
	$tag->elemento('br');
	$tag->elemento('br');
	$tag->elemento('br');
$tag->close('div');

	
?>