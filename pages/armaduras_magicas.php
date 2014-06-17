<?php
//&raquo;
require('classes/armaduras.class.php');
$tag->div('small-2 large-12 columns');	
	$tag->ul('inline-list');
		$tag->li();
			$tag->a('index.php?p=armaduras');
				echo utf8_decode('Armaduras &rArr;');
			$tag->Ca();
		$tag->Cli();
		
		$tag->li();
			$tag->a('index.php?p=armaduras_magicas');
				$tag->b();
					echo utf8_decode('Armaduras Mágicas &rArr;');
				$tag->Cb();
			$tag->Ca();
		$tag->Cli();
		
		$tag->li();
			$tag->div();
				$tag->b();
					echo utf8_decode('Consulte o livro do mestre para maiores detalhes das habilidades mágicas.');
				$tag->Cb();
			$tag->Cdiv();
		$tag->Cli();
	$tag->Cul();				
$tag->Cdiv();

$tag->div('small-2 large-12 columns');	
	
	$tag->div('small-2 large-4 columns');	
		$armadura1 = new ArmadurasMagicas();
		$tag->ul('pricing-table');
			$tag->li('title');
				echo utf8_decode($armadura1->getNome());
			$tag->Cli();
			
			$tag->li('price');
				echo utf8_decode($armadura1->gerarPrecoTotal().' PO');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Tipo '.$armadura1->getTipo());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode($armadura1->getBonusNaCa().' Na CA');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Máximo de destreza '.$armadura1->getDestrezaMaxima());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Penalidade em pericia '.$armadura1->getPenalidadeNaPericia());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Falha de Magia Arcana '.$armadura1->getFalhaDeMagiaArcana());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento médio '.$armadura1->getDeslocamentoMedio());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento Pequeno '.$armadura1->getDeslocamentoPequeno());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Peso '.$armadura1->getPeso());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Habilidade Mágica  '.$armadura1->getHabilidade());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Descrição '.$armadura1->getDescricao());
			$tag->Cli();
			
			$tag->li('cta-button');
				$tag->a('index.php?p=armaduras_magicas','button black');
					echo 'Nova Armadura &raquo;';
				$tag->Ca();
			$tag->Cli();
		$tag->Cul();
	$tag->Cdiv();
	
	$tag->div('small-2 large-4 columns');	
		$armadura2 = new ArmadurasMagicas();
		$tag->ul('pricing-table');
			$tag->li('title');
				echo utf8_decode($armadura2->getNome());
			$tag->Cli();
			
			$tag->li('price');
				echo utf8_decode($armadura2->gerarPrecoTotal().' PO');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Tipo '.$armadura2->getTipo());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode($armadura2->getBonusNaCa().' Na CA');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Máximo de destreza '.$armadura2->getDestrezaMaxima());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Penalidade em pericia '.$armadura2->getPenalidadeNaPericia());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Falha de Magia Arcana '.$armadura2->getFalhaDeMagiaArcana());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento médio '.$armadura2->getDeslocamentoMedio());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento Pequeno '.$armadura2->getDeslocamentoPequeno());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Peso '.$armadura2->getPeso());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Habilidade Mágica  '.$armadura2->getHabilidade());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Descrição '.$armadura2->getDescricao());
			$tag->Cli();
			
			$tag->li('cta-button');
				$tag->a('index.php?p=armaduras_magicas','button black');
					echo 'Nova Armadura &raquo;';
				$tag->Ca();
			$tag->Cli();
		$tag->Cul();
	$tag->Cdiv();
	
	$tag->div('small-2 large-4 columns');	
		$armadura3 = new ArmadurasMagicas();
		$tag->ul('pricing-table');
			$tag->li('title');
				echo utf8_decode($armadura3->getNome());
			$tag->Cli();
			
			$tag->li('price');
				echo utf8_decode($armadura3->gerarPrecoTotal().' PO');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Tipo '.$armadura3->getTipo());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode($armadura3->getBonusNaCa().' Na CA');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Máximo de destreza '.$armadura3->getDestrezaMaxima());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Penalidade em pericia '.$armadura3->getPenalidadeNaPericia());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Falha de Magia Arcana '.$armadura3->getFalhaDeMagiaArcana());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento médio '.$armadura3->getDeslocamentoMedio());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento Pequeno '.$armadura3->getDeslocamentoPequeno());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Peso '.$armadura3->getPeso());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Habilidade Mágica  '.$armadura3->getHabilidade());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Descrição '.$armadura3->getDescricao());
			$tag->Cli();
			
			$tag->li('cta-button');
				$tag->a('index.php?p=armaduras_magicas','button black');
					echo 'Nova Armadura &raquo;';
				$tag->Ca();
			$tag->Cli();
		$tag->Cul();
	$tag->Cdiv();
	
$tag->Cdiv();
	
?>