<?php
//&raquo;
$tag = new TagElement();

$tag->div('small-2 large-12 columns');	
	$tag->ul('inline-list');
		$tag->li();
			$tag->a('index.php?p=escudos');
				echo utf8_decode('Escudos &rArr;');
			$tag->Ca();
		$tag->Cli();
		
		$tag->li();
			$tag->a('index.php?p=escudos_magicos');
				$tag->b();
					echo utf8_decode('Escudos Mágicos &rArr;');
				$tag->Cb();
			$tag->Ca();
		$tag->Cli();
		
		$tag->li();
			$tag->div('');
				$tag->b();
					echo utf8_decode('Consulte o livro do mestre para maiores detalhes das habilidades mágicas.');
				$tag->Cb();
			$tag->Cdiv();
		$tag->Cli();
	$tag->Cul();				
$tag->Cdiv();

$tag->div('small-2 large-12 columns');	

	$tag->div('small-2 large-4 columns');	
		$escudo_magico1 = new EscudosMagicos();
			
		$tag->ul('pricing-table');
			$tag->li('title');
				echo utf8_decode($escudo_magico1->getNome());
			$tag->Cli();
			
			$tag->li('price');
				echo utf8_decode($escudo_magico1->gerarPrecoTotal().' PO');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode($escudo_magico1->getBonusNaCa().' Na CA');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Máximo de destreza '.$escudo_magico1->getDestrezaMaxima());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Penalidade em pericia '.$escudo_magico1->getPenalidadeNaPericia());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Falha de Magia Arcana '.$escudo_magico1->getFalhaDeMagiaArcana());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento médio '.$escudo_magico1->getDeslocamentoMedio());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento Pequeno '.$escudo_magico1->getDeslocamentoPequeno());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Peso '.$escudo_magico1->getPeso());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Habilidade Mágica '.$escudo_magico1->getHabilidade());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Descrição '.$escudo_magico1->getDescricao());
			$tag->Cli();
			
			$tag->li('cta-button');
				$tag->a('index.php?p=escudos_magicos','button black');
					echo 'Novo Escudo &raquo;';
				$tag->Ca();
			$tag->Cli();
		$tag->Cul();
	$tag->Cdiv();
	
	$tag->div('small-2 large-4 columns');	
		$escudo_magico2 = new EscudosMagicos();
			
		$tag->ul('pricing-table');
			$tag->li('title');
				echo utf8_decode($escudo_magico2->getNome());
			$tag->Cli();
			
			$tag->li('price');
				echo utf8_decode($escudo_magico2->gerarPrecoTotal().' PO');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode($escudo_magico2->getBonusNaCa().' Na CA');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Máximo de destreza '.$escudo_magico2->getDestrezaMaxima());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Penalidade em pericia '.$escudo_magico2->getPenalidadeNaPericia());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Falha de Magia Arcana '.$escudo_magico2->getFalhaDeMagiaArcana());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento médio '.$escudo_magico2->getDeslocamentoMedio());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento Pequeno '.$escudo_magico2->getDeslocamentoPequeno());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Peso '.$escudo_magico2->getPeso());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Habilidade Mágica '.$escudo_magico2->getHabilidade());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Descrição '.$escudo_magico2->getDescricao());
			$tag->Cli();
			
			$tag->li('cta-button');
				$tag->a('index.php?p=escudos_magicos','button black');
					echo 'Novo Escudo &raquo;';
				$tag->Ca();
			$tag->Cli();
		$tag->Cul();
	$tag->Cdiv();
	
	$tag->div('small-2 large-4 columns');	
		$escudo_magico3 = new EscudosMagicos();
			
		$tag->ul('pricing-table');
			$tag->li('title');
				echo utf8_decode($escudo_magico3->getNome());
			$tag->Cli();
			
			$tag->li('price');
				echo utf8_decode($escudo_magico3->gerarPrecoTotal().' PO');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode($escudo_magico3->getBonusNaCa().' Na CA');
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Máximo de destreza '.$escudo_magico3->getDestrezaMaxima());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Penalidade em pericia '.$escudo_magico3->getPenalidadeNaPericia());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Falha de Magia Arcana '.$escudo_magico3->getFalhaDeMagiaArcana());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento médio '.$escudo_magico3->getDeslocamentoMedio());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Deslocamento Pequeno '.$escudo_magico3->getDeslocamentoPequeno());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Peso '.$escudo_magico3->getPeso());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Habilidade Mágica '.$escudo_magico3->getHabilidade());
			$tag->Cli();
			
			$tag->li('description');
				echo utf8_decode('Descrição '.$escudo_magico3->getDescricao());
			$tag->Cli();
			
			$tag->li('cta-button');
				$tag->a('index.php?p=escudos_magicos','button black');
					echo 'Novo Escudo &raquo;';
				$tag->Ca();
			$tag->Cli();
		$tag->Cul();
	$tag->Cdiv();
					
$tag->Cdiv();
	
?>