<?php
//&raquo;
$tag = new tags();
$tag->elemento('div','class="small-2 large-12 columns"');	
	$pages = array('Escudos &rArr;','Escudos Mágicos &rArr;');
	$links = array('?p=escudos&t=comum','?p=escudos&t=magicas');
	
	$tag->elemento('ul','class="inline-list"');
		for($i=0; $i<count($pages); $i++):
			$tag->elemento('li');
				$tag->elemento('a','href="'.$links[$i].'" class="link"');					
					$tag->elemento('b');
						echo utf8_decode($pages[$i]);
					$tag->close('b');					
				$tag->close('a');
			$tag->close('li');
		endfor;
	$tag->close('ul');				
$tag->close('div');

$tag->elemento('div','small-2 large-12 columns');	
	
	$tag->elemento('div','small-2 large-4 columns');	
		$escudos = new escudos();
		$escudos->exibir_escudos($_GET['t']);
		while($objeto_resp = $escudos->retorna_dados()):

				$tag->elemento('div','class="armas"');				
					$tag->elemento('div','class="nome"');
						echo utf8_decode($objeto_resp->nome);
					$tag->close('div');
					
					$tag->elemento('div','class="bloco1"');		
					$tag->elemento('div','class="dados h"');
						echo utf8_decode($objeto_resp->custo.' <b>PO</b>');
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo utf8_decode($objeto_resp->bonusNaCa.' <b>Na CA</b>');
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo utf8_decode('<b>Máximo de destreza </b>'.$objeto_resp->destrezaMaxima);
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo utf8_decode('<b>Penalidade em pericia </b>'.$objeto_resp->penalidadeNaPericia);
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo utf8_decode('<b>Falha de Magia Arcana </b>'.$objeto_resp->falhaDeMagiaArcana);
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo utf8_decode('<b>Deslocamento médio </b>'.$objeto_resp->deslocamentoMedio);
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo utf8_decode('<b>Deslocamento Pequeno </b>'.$objeto_resp->deslocamentoPequeno);
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo utf8_decode('<b>Peso </b>'.$objeto_resp->peso);
					$tag->close('div');
					
				$tag->close('div');							
					$tag->elemento('div','class="descricao h"');
						echo utf8_decode('<b>Descrição </b>'.$objeto_resp->descricao);
					$tag->close('div');
			$tag->close('div');
		endwhile;
	$tag->close('div');
$tag->close('div');
	
?>