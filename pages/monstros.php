<?php
//&raquo;
$tag = new TagElement();
if(isset($_POST["botao"]) && $_POST["botao"] == 'Buscar Monstro'):
	$monstro = gerar_monstro_montado($_POST['niveis'], $_POST['subtipos'], $_POST['tipos'], $_POST['tamanhos']);
elseif(isset($_POST["botao"]) && $_POST["botao"] == 'Ver personagem'):
	validacao_de_hablidades($_POST['forca'], $_POST['constituicao'], $_POST['destreza'], $_POST['inteligencia'], $_POST['sabedoria'], $_POST['carisma']);
	$personagem = gerar_personagem_montado($_POST['nivel'],        $_POST['racas'], 	   $_POST['classes'], 	   '',
										   $_POST['sexo'], 	       $_POST['nome'], 	       $_POST['player_nome'],  $_POST['cabelos'], 	      $_POST['olhos'], 
										   $_POST['pele'], 	       $_POST['tendencia'],    $_POST['altura'], 	   $_POST['peso'], 
										   $_POST['idade'],        $_POST['divindade'],    '',     					$_POST['local'], 	  	  $_POST['equipamentos'],
										   $_POST['itens'],        $_POST['armas'], 	   $_POST['armaduras'],    $_POST['historia'], true,  $_POST['forca'],
										   $_POST['constituicao'], $_POST['destreza'],     $_POST['inteligencia'], $_POST['sabedoria'],       $_POST['carisma']);
else:
	$monstro = new Monstros();	
endif;


$tag->div('small-2 large-12 columns');	
	$tag->ul('inline-list');
		$tag->li();
			$tag->a('index.php?p=monstros');
				$tag->b();
					echo utf8_decode('Nova Criatura &rArr;');
				$tag->Cb();
			$tag->Ca();
		$tag->Cli();
		/*
		$tag->li();
			$tag->a('index.php?p=exportar&tipo=monstro&for='.$monstro->forca.'');
				
				echo utf8_decode('Exportar ficha &rArr;');
			$tag->Ca();
		$tag->Cli();
	$tag->Cul();
		*/			
$tag->Cdiv();

$tag->div('small-2 large-12 columns');	
	$tag->div('row');
		$tag->form('index.php?p=monstros','POST','custom');
			$tag->div('small-2 large-2 columns');		
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Buscar por Tipo?');
					$tag->Clabel();
					$tag->select('display:none','customDropdown','','tipos');
						$tag->option('SELECTED');
							echo utf8_decode('');
						$tag->Coption();	
					$tipos = array("aberração",'animal','besta mágica','constructo','dragão','elemental','fada','gigante',
					   'humanóide monstruoso','humanóide','inseto','limo','morto-vivo','planta');
					for($i=0; $i<count($tipos); $i++):
						$tag->option();
							echo utf8_decode(''.$tipos[$i].'');
						$tag->Coption();
					endfor;								
					$tag->Cselect();						
				$tag->Cli();
			$tag->Cdiv();
				
			$tag->div('small-2 large-3 columns');
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('Buscar por Tamanho?');
						$tag->Clabel();
				
						$tag->select('display:none','customDropdown','','tamanhos');
							$tag->option('SELECTED');
								echo utf8_decode('');
							$tag->Coption();
							
							$tamanhos = array('pequeno','médio','grande','enorme','imenso','colossal');
							for($i=0; $i<count($tamanhos); $i++):
								$tag->option('');
									echo utf8_decode(''.$tamanhos[$i].'');
								$tag->Coption();
							endfor;											
						$tag->Cselect();
					$tag->Cli();
			$tag->Cdiv();
			
			$tag->div('small-2 large-2 columns');	
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Buscar por ND');
					$tag->Clabel();
				
					$tag->select('display:none','customDropdown','','niveis');
					
						$tag->option('SELECTED');
							echo utf8_decode('');
						$tag->Coption();
						
						for($i=1; $i<=45; $i++):
							$tag->option('');
								echo utf8_decode(''.$i.'');
							$tag->Coption();
						endfor;						
					$tag->Cselect();
				$tag->Cli();
			$tag->Cdiv();
			
			$tag->div('small-2 large-3 columns');	
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Buscar por Subtipo');
					$tag->Clabel();
				
					$tag->select('display:none','customDropdown','','subtipos');
					
						$tag->option('SELECTED');
							echo utf8_decode('');
						$tag->Coption();
						
						$subtipos = array('água','anjo','aquático','ar','arconte','avançado','baatezu','bom','caos','eladrin','enxame','fogo','frio','gurdinal','incopóreo',
						  'leal','mau','metamorfo','planar','réptil','tana\'ri','terra');
						  
						for($i=0; $i<=count($subtipos)-1; $i++):
							$tag->option('');
								echo utf8_decode(''.$subtipos[$i].'');
							$tag->Coption();
						endfor;						
					$tag->Cselect();
				$tag->Cli();
			$tag->Cdiv();

						
			$tag->div('small-2 large-2 columns');	
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Clique aqui!');
					$tag->Clabel();
					$tag->submit('botao','submit','Buscar Monstro','small button');
				$tag->Cli();
			$tag->Cdiv();
		$tag->Cform();	
	$tag->Cdiv();
$tag->Cdiv();

$tag->div('small-2 large-12 columns');
		$tag->ul('pricing-table');
			$tag->li('title');
				echo utf8_decode('FICHA DE CRIATURA');
			$tag->Cli();	
		$tag->Cul();
	$tag->Cdiv();

$tag->div('small-2 large-12 columns');	
	$tag->div('row');
		$tag->div('small-2 large-10 columns');	
		//cotinuar
			$tag->ul('pricing-table');
				$tag->li('bullet-item');
					echo utf8_decode(TIPO.' '.$monstro->tipo.' '.
									SUBTIPO.' '.$monstro->subtipo.' '.
									TAMANHO.' '.$monstro->tamanho.' '.
									ND.' '.$monstro->nd.' ');				
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(ESPACO.' '.$monstro->espaco.' '.
									ALCANCE.' '.$monstro->alcance.' '.
									DIMENCAO.' '.$monstro->dimencao.' '.
									PESO.' '.$monstro->peso.' ');		
				$tag->Cli();
				
			$tag->Cul();
		$tag->Cdiv();
		
		$tag->div('small-2 large-2 columns');	
		
			$tag->ul('pricing-table');
				$tag->li('title');
					$tag->img('img/monster/'.$monstro->img,'th radius');
				$tag->Cli();
				
			$tag->Cul();
		$tag->Cdiv();
	$tag->Cdiv();
	
	$tag->div('row');
		$tag->div('small-2 large-2 columns');	
		
			$tag->ul('pricing-table');
				$tag->li('bullet-item');
					echo utf8_decode(FORCA.' '.$monstro->for_.$monstro->gerar_modificador_forca());
				$tag->Cli();
				
				$tag->li('bullet-item');
					if($monstro->con_ == '-'):
						echo utf8_decode(CON.' '.$monstro->con_);	
					else:
						echo utf8_decode(CON.' '.$monstro->con_.$monstro->gerar_modificador_constituicao());
					endif;	
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(DES.' '.$monstro->des_.$monstro->gerar_modificador_destreza());
				$tag->Cli();
				
				$tag->li('bullet-item');
					if($monstro->int_ == '-'):
						echo utf8_decode(INT.' '.$monstro->int_);
					else:
						echo utf8_decode(INT.' '.$monstro->int_.$monstro->gerar_modificador_inteligencia());
					endif;
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(SAB.' '.$monstro->sab_.$monstro->gerar_modificador_sabedoria());
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(CAR.' '.$monstro->car_.$monstro->gerar_modificador_carisma());
				$tag->Cli();
			$tag->Cul();
			
		$tag->Cdiv();
	
		$tag->div('small-2 large-6 columns');	
		
			$tag->ul('pricing-table');
				$tag->li('bullet-item');
					echo utf8_decode(PV.' '.$monstro->pv);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(CA.' '.$monstro->CA.' ='.$monstro->print_CA());
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(INICIATIVA.' = '.$monstro->gerar_modificador_destreza());
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(BBA.' '.$monstro->exibir_bonus_base_ataque());
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(RIQUEZA.' '.$monstro->riqueza.' PO');
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(XP_OFERECIDO.' '.$monstro->xp_oferecido);
				$tag->Cli();
				
			$tag->Cul();
			
		$tag->Cdiv();
		
		$tag->div('small-2 large-4 columns');	
		
			$tag->ul('pricing-table');
				
				$tag->li('bullet-item');
					echo utf8_decode(TESTESDERESISTENCIA);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(VONT.' '.$monstro->gerar_vontade_total().$monstro->print_vontade_total());
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(REFL.' '.$monstro->gerar_reflexo_total().$monstro->print_reflexo_total());
				$tag->Cli();
				
				$tag->li('bullet-item');
					if($monstro->con_ == '-'):
						echo utf8_decode(FORT.'-');
					else:
						echo utf8_decode(FORT.' '.$monstro->gerar_fortitude_total().$monstro->print_fortitude_total());
					endif;
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(DESLOCAMENTO_TERRESTRE.' '.$monstro->deslocamento_terrestre);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(DESLOCAMENTO_VOANDO.' '.$monstro->deslocamento_voando);
				$tag->Cli();
				
			$tag->Cul();
			
		$tag->Cdiv();
	$tag->Cdiv();
	
	$tag->div('row');
		$tag->div('small-2 large-6 columns');	
		
			$tag->ul('pricing-table');
				$tag->li('bullet-item');
					echo utf8_decode(FORMAS_DE_ATAQUE);
				$tag->Cli();
			
				$tag->li('bullet-item');
					echo utf8_decode(PANCADA.' '.$monstro->pancada_tentaculo);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(MORDIDA.' '.$monstro->mordida);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(GARRA_FERRAO.' '.$monstro->garra_ferrao);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(CHIFRE_CAUDA.' '.$monstro->chifre_cauda);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(BONUS_C.' '.$monstro->exibir_ataque_corpo_a_corpo());
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(BONUS_D.' '.$monstro->exibir_ataque_a_distancia());
				$tag->Cli();
							
			$tag->Cul();	
				
		$tag->Cdiv();
	
		$tag->div('small-2 large-6 columns');	
		
			$tag->ul('pricing-table');
				$tag->li('bullet-item');
					echo utf8_decode(TALENTOS);
				$tag->Cli();
				
				$tag->li('bullet-item');
					if($monstro->int_ == '-'):
						echo utf8_decode($monstro->talentos);
					else:
						echo utf8_decode($monstro->print_talentos());
					endif;
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(CARACTERISTICAS.' Confira no livro dos montros as características de <b>'.$monstro->tipo.'</b> e de seu Subtipo <b>'.$monstro->subtipo.'</b> para maiores detelhes da criatura.');
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(AGARRAR.' '.$monstro->agarrar);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(RD.' '.$monstro->rd);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(RM.' '.$monstro->RM);
				$tag->Cli();
				
				$tag->li('bullet-item');
					echo utf8_decode(PERICIAS);
				$tag->Cli();
				
				$tag->li('bullet-item');
					if($monstro->int_ == '-'):
						echo utf8_decode('Esta criatura não possui Pts de pericia.');
					else:
						echo utf8_decode('Esta criatura tem <b>'.$monstro->pericias.'</b>Pts de pericia para ser distribuido em até '.$monstro->quantidade_de_pericias());
					endif;	
				$tag->Cli();
				
					
			$tag->Cul();
			
		$tag->Cdiv();	
		
		$tag->div('small-2 large-6 columns');	
		
			$tag->ul('pricing-table');
				$tag->li('bullet-item');
					echo utf8_decode(QUALIDADES_ESPECIAIS);
				$tag->Cli();
			
				$qualidades = $monstro->sugerir_qualidades_especiais();	
				for($i=0; $i<=count($qualidades)-1; $i++):
					$tag->li('bullet-item');	
						echo utf8_decode($qualidades[$i]);
					$tag->Cli();
				endfor;
		
			$tag->Cul();
			
		$tag->Cdiv();
		
		$tag->div('small-2 large-6 columns');	
		
			$tag->ul('pricing-table');
				$tag->li('bullet-item');
					echo utf8_decode(ATAQUES_ESPECIAIS);
				$tag->Cli();
			
				$ataques = $monstro->sugerir_ataques_especias();	
				for($i=0; $i<=count($ataques)-1; $i++):
					$tag->li('bullet-item');	
						echo utf8_decode($ataques[$i]);
					$tag->Cli();
				endfor;
		
			$tag->Cul();
			
		$tag->Cdiv();	
		
	$tag->Cdiv();		
$tag->Cdiv();
	
?>