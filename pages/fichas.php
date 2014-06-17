<?php
$hist = new historias();
$sessao = new sessao();
$armadura = new armaduras();
$tipo = array('armaduras','magicas');
$armadura->exibir_armaduras($tipo[rand(0,1)]);		
$objeto_resp = $armadura->retorna_dados();

if(isset($_POST["botao"]) && $_POST["botao"] == 'Visualizar personagem'):
	$personagem = gerar_personagem_montado($_POST['nivel'], $_POST['racas'], $_POST['classes'], $_POST['tipo']);
elseif(isset($_POST["botao"]) && $_POST["botao"] == 'Ver personagem'):
	validacao_de_hablidades($_POST['forca'], $_POST['constituicao'], $_POST['destreza'], $_POST['inteligencia'], $_POST['sabedoria'], $_POST['carisma']);
	$personagem = gerar_personagem_montado($_POST['nivel'],        $_POST['racas'], 	   $_POST['classes'], 	   '',
										   $_POST['sexo'], 	       $_POST['nome'], 	       $_POST['player_nome'],  $_POST['cabelos'], 	      $_POST['olhos'], 
										   $_POST['pele'], 	       $_POST['tendencia'],    $_POST['altura'], 	   $_POST['peso'], 
										   $_POST['idade'],        $_POST['divindade'],    '',     					$_POST['local'], 	  	  $_POST['equipamentos'],
										   $_POST['itens'],        $_POST['armas'], 	   $_POST['armaduras'],    $_POST['historia'], true,  $_POST['forca'],
										   $_POST['constituicao'], $_POST['destreza'],     $_POST['inteligencia'], $_POST['sabedoria'],       $_POST['carisma']);
else:
	$personagem = new Personagem();	
endif;


$tag->elemento('div','class="small-2 large-12 columns"');	
	$tag->elemento('ul','class="inline-list"');
		$tag->elemento('li');
			$tag->elemento('a','href="index.php?p=fichas"');
				$tag->elemento('b');
					echo utf8_decode('Novo personagem &rArr;');
				$tag->close('b');
			$tag->close('a');
		$tag->close('li');
		
		$tag->elemento('li');
			$tag->elemento('a','href="index.php?p=montar_ficha"');
				echo utf8_decode('Montar o Personagem &rArr;');
			$tag->close('a');
		$tag->close('li');
	$tag->close('ul');				
$tag->close('div');

$tag->elemento('div','class="small-2 large-12 columns"');	
	$tag->elemento('div','class="row"');
		$tag->elemento('form','action="index.php?p=fichas" method="POST" class="custom"');
			$tag->elemento('div','class="small-2 large-2 columns"');		
				$tag->elemento('li','class="bullet-item"');
					$tag->elemento('label');
						echo utf8_decode('Buscar por Raça?');
					$tag->close('label');
					$tag->elemento('select','style="display:none" id="customDropdown" name="racas"');
						$tag->elemento('option','selected="SELECTED"');
							echo utf8_decode('');
						$tag->close('option');	
					$racas = array("Humano","Anão","Elfo","Gnomo","Meio elfo","Meio orc","Halfling",
								   "Humana","Anã","Elfa","Gnoma","Meio elfa","Meio orc","Halfling");
					for($i=0; $i<count($racas); $i++):
						$tag->elemento('option');
							echo utf8_decode(''.$racas[$i].'');
						$tag->close('option');
					endfor;								
					$tag->close('select');						
				$tag->close('li');
			$tag->close('div');
				
			$tag->elemento('div','class="small-2 large-3 columns"');
					$tag->elemento('li','class="bullet-item"');
						$tag->elemento('label');
							echo utf8_decode('Buscar por Classe?');
						$tag->close('label');
				
						$tag->elemento('select','style="display:none" id="customDropdown" name="classes"');
							$tag->elemento('option','selected="SELECTED"');
								echo utf8_decode('');
							$tag->close('option');
							
							$classes= array("barbaro","guerreiro","paladino","monge","ladino","clerigo","bardo","feiticeiro","mago","druida","ranger",
										"barbara","guerreira","paladina","monge","ladina","cleriga","barda","feiticeira","maga","druida","ranger");
							for($i=0; $i<count($classes); $i++):
								$tag->elemento('option');
									echo utf8_decode(''.$classes[$i].'');
								$tag->close('option');
							endfor;											
						$tag->close('select');
					$tag->close('li');
			$tag->close('div');
			
			$tag->elemento('div','class="small-2 large-2 columns"');	
				$tag->elemento('li','class="bullet-item"');
					$tag->elemento('label');
						echo utf8_decode('Buscar por nivel?');
					$tag->close('label');
				
					$tag->elemento('select','style="display:none" id="customDropdown" name="nivel"');
					
						$tag->elemento('option','slected="SELECTED"');
							echo utf8_decode('');
						$tag->close('option');
						
						for($i=1; $i<=20; $i++):
							$tag->elemento('option');
								echo utf8_decode(''.$i.'');
							$tag->close('option');
						endfor;						
					$tag->close('select');
				$tag->close('li');
			$tag->close('div');
			
			$tag->elemento('div','class="small-2 large-2 columns"');	
				$tag->elemento('li','class="bullet-item"');
					$tag->elemento('label');
						echo utf8_decode('Tpo de ficha');
					$tag->close('label');
				
					$tag->elemento('select','style="display:none" id="customDropdown" name="tipo"');
					
						$tag->elemento('option','selected="SELECTED"');
							echo utf8_decode('');
						$tag->close('option');
						
						$tipo = array('normal','forte','brutal');
						for($i=0; $i<=count($tipo)-1; $i++):
							$tag->elemento('option');
								echo utf8_decode(''.$tipo[$i].'');
							$tag->close('option');
						endfor;						
					$tag->close('select');
				$tag->close('li');
			$tag->close('div');

						
			$tag->elemento('div','class="small-2 large-3 columns"');	
				$tag->elemento('li','class="bullet-item"');
					$tag->elemento('label');
						echo utf8_decode('Clique aqui!');
					$tag->close('label');
					$tag->elemento('input','name="botao" type="submit" value="Visualizar personagem" class="small button"');
				$tag->close('li');
			$tag->close('div');
		$tag->close('form');	
	$tag->close('div');
$tag->close('div');

$tag->elemento('div','class="small-2 large-12 columns"');
	$tag->elemento('ul','class="pricing-table"');
		$tag->elemento('li','class="title"');
			echo utf8_decode('FICHA DO PERSONAGEM');
		$tag->close('li');	
	$tag->close('ul');
$tag->close('div');

$tag->elemento('div','class="small-2 large-12 columns"');	
	
	$tag->elemento('div','class="small-2 large-10 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
			$tag->elemento('li','class="bullet-item"');
				$user = $sessao->getVar('nome_user');
				echo utf8_decode(NOME.' '.$personagem->nome.' '.
								JOGADOR.' '.jogador($user).' '.
								RACA.' '.$personagem->raca.' '.
								CLASSE.' '.$personagem->classe.' '.
								XP.' '.$personagem->xp.' '.
								NIVEL.' '.$personagem->nivel);
								
								
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(ALTURA.' '.$personagem->altura.' '.
								PESO.' '.$personagem->peso.' '.
								IDADE.' '.$personagem->idade.' '.
								OLHOS.' '.$personagem->olhos.' '.
								CABELOS.' '.$personagem->cabelos.' '.
								PELE.' '.$personagem->pele.' '.
								SEXO.' '.$personagem->sexo);		
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(TAMANHO.' '.$personagem->tamanho.' '.
								TENDENCIA.' '.$personagem->tendencia.' '.
								DIVINDADE.' '.$personagem->divindade.' '.
								RELIGIAO.' '.$personagem->religiao.' '.
								DV.$personagem->dv);												
			$tag->close('li');
			
		$tag->close('ul');
	$tag->close('div');
	
	$tag->elemento('div','class="small-2 large-2 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
			$tag->elemento('li','class="title"');
				$tag->elemento('img','src="img/basicClass/'.$personagem->img.'" class="th radius"');
			$tag->close('li');
			
		$tag->close('ul');
	$tag->close('div');
	
	$tag->elemento('div','class="small-2 large-2 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(FORCA.' '.$personagem->for_.$personagem->gerar_modificador_forca());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(CON.' '.$personagem->con_.$personagem->gerar_modificador_constituicao());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(DES.' '.$personagem->des_.$personagem->gerar_modificador_destreza());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(INT.' '.$personagem->int_.$personagem->gerar_modificador_inteligencia());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(SAB.' '.$personagem->sab_.$personagem->gerar_modificador_sabedoria());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(CAR.' '.$personagem->car_.$personagem->gerar_modificador_carisma());
			$tag->close('li');
		$tag->close('ul');
		
	$tag->close('div');

	$tag->elemento('div','class="small-2 large-6 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(PV.' '.$personagem->PV);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				if($personagem->classe == 'monge'):
					$ca_ = $personagem->gerar_modificador_sabedoria().'(sab)+ 3(deflexão)';
					$total = $personagem->CA;
				else:
					$ca_ = 	$objeto_resp->bonusNaCa.'(armadura) ';
					$total = $personagem->CA+$objeto_resp->bonusNaCa-3;
				endif;
				echo utf8_decode(CA.' '.$total.' = 10 '.$personagem->gerar_modificador_destreza().'(des)'.$ca_);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(INICIATIVA.' = '.$personagem->gerar_modificador_destreza());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(BBA.' '.$personagem->bonus_base_ataque[0].'/'.$personagem->bonus_base_ataque[1].'/'.$personagem->bonus_base_ataque[2].'/'.$personagem->bonus_base_ataque[3]);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(RIQUEZA.' '.$personagem->riqueza.' PO');
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode('------------------------------');
			$tag->close('li');
			
		$tag->close('ul');
		
	$tag->close('div');
	
	$tag->elemento('div','class="small-2 large-4 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(TESTESDERESISTENCIA);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(VONT.' '.$personagem->gerar_vontade_total().' = '.$personagem->vontade.$personagem->gerar_modificador_sabedoria());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(REFL.' '.$personagem->gerar_reflexo_total().' = '.$personagem->reflexos.$personagem->gerar_modificador_destreza());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(FORT.' '.$personagem->gerar_fortitude_total().' = '.$personagem->fortitude.$personagem->gerar_modificador_constituicao());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(DESLOCAMENTO.' '.$personagem->deslocamento);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode('------------------------------');
			$tag->close('li');
			
			
		$tag->close('ul');
		
	$tag->close('div');

	$tag->elemento('div','class="small-2 large-6 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(ATAQUE.' Desarmado');
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(BONUS.' '.$personagem->exibir_ataque_corpo_a_corpo());
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(DANO.' '.$personagem->dado_dano);
			$tag->close('li');			
		$tag->close('ul');
		
		$tag->elemento('ul','class="pricing-table"');
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(ARMADURA.' '.$objeto_resp->nome);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(BONUS.' '.$objeto_resp->bonusNaCa);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(TIPO.' '.$objeto_resp->tipo);
			$tag->close('li');			
		$tag->close('ul');
		
		$tag->elemento('ul','class="pricing-table"');
			$escolido = rand(1,4);
			if($escolido == 1):
				$arma = new armas();
				$arma->exibir_armas('armas');			
				$armas_resp = $arma->retorna_dados();
			elseif($escolido == 2):
				$arma = new armas();
				$arma->exibir_armas('armas_simples');			
				$armas_resp = $arma->retorna_dados();
			elseif($escolido == 3):
				$arma = new armas();
				$arma->exibir_armas('armas_exoticas');			
				$armas_resp = $arma->retorna_dados();
			elseif($escolido == 4):
				$arma = new armas();
				$arma->exibir_armas('armas_magicas');			
				$armas_resp = $arma->retorna_dados();
			endif;
			$tag->elemento('li','class="bullet-item"');
				echo (ARMA.' '. $armas_resp->nome);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(DANO.' '.$armas_resp->dano);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo (TIPO.' '.$armas_resp->tipo);
			$tag->close('li');			
		$tag->close('ul');
		
	$tag->close('div');

	$tag->elemento('div','class="small-2 large-6 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(ITENS.' '.$personagem->itens);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(ARMAS.' '.$personagem->armas);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(ARMADURAS.' '.$personagem->armadura);
			$tag->close('li');
			
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(EQUIPAMENTOS.' '.$personagem->equipamento);
			$tag->close('li');
			
		$tag->close('ul');
		
	$tag->close('div');
			
	$tag->elemento('div','class="small-2 large-6 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
		
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(HISTORIA);
			$tag->close('li');
			
			$inicio = $hist->inicio();
			$meio = $hist->meio();
			$fim = $hist->fim();
			
			$tag->elemento('li','class="bullet-item"');
				if(isset($_POST['historia'])):
					echo '<b>'.$personagem->nome.'</b> '.$_POST['historia'];
				else:
					echo utf8_decode('<b>'.$personagem->nome.'</b>'.$inicio.''.$meio.''.$fim);
				endif;
			$tag->close('li');
			
		$tag->close('ul');
		
	$tag->close('div');
	
	$tag->elemento('div','class="small-2 large-6 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(PERICIAS);
			$tag->close('li');
			
			for($i=0; $i<=$personagem->qtd_pericias(); $i++):
				if(!empty($personagem->pericias_nome[$i])):
					$tag->elemento('li','class="bullet-item"');
						$total = $personagem->pericias_grad[$i]+$personagem->pericias_mod[$i];
						echo utf8_decode($personagem->pericias_nome[$i].' '.$total.' = '.$personagem->pericias_grad[$i].$personagem->pericias_mod[$i]);
					$tag->close('li');
				endif;
			endfor;
		$tag->close('li');
		
	$tag->close('div');
	
	

	$tag->elemento('div','class="small-2 large-6 columns"');	
	
		$tag->elemento('ul','class="pricing-table"');
			$tag->elemento('li','class="bullet-item"');
				echo utf8_decode(TALENTOS);
			$tag->close('li');
			
			for($i=0; $i<=count($personagem->talentos)-1; $i++):
				if(!empty($personagem->talentos[$i])):
					$tag->elemento('li','class="bullet-item"');
						echo utf8_decode($personagem->talentos[$i]);
					$tag->close('li');
				endif;
			endfor;
		$tag->close('ul');
		
	$tag->close('div');	
		
$tag->close('div');
	
?>