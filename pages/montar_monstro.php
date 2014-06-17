<?php
//&raquo;
require('classes/personagem.class.php');
require('classes/armas.class.php');
$personagem = new Personagem();
if(isset($_GET['alert']) && $_GET['alert'] == 'true'):
	alert_box();
endif;

$tag->form('index.php?p=fichas','post','custom');

	$tag->div('small-2 large-12 columns');	
		
		$tag->ul('inline-list');
			
			$tag->li();
				$tag->a('index.php?p=fichas');
					echo utf8_decode('Novo monstro &rArr;');
				$tag->Ca();
			$tag->Cli();
			
			$tag->li();
				$tag->a('index.php?p=montar_ficha');
					$tag->b();
						echo utf8_decode('Montar o Monstro &rArr;');
					$tag->Cb();
				$tag->Ca();
			$tag->Cli();
			
			$tag->li();
				$tag->submit('botao','submit','Ver monstro','small button');
			$tag->Cli();
		$tag->Cul();				
	
	$tag->Cdiv();
	
	$tag->div('small-2 large-12 columns');
		$tag->ul('pricing-table');
			$tag->li('title');
				echo utf8_decode('FICHA DE UM MONSTRO');
			$tag->Cli();	
		$tag->Cul();
	$tag->Cdiv();
	
	$tag->div('small-2 large-12 columns');	
		
		$tag->div('row');
			$tag->div('small-2 large-2 columns');	
				$tag->ul('pricing-table');
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('FORÇA');
						$tag->Clabel();
						$tag->input(utf8_decode('força'),'','forca','forca','text');					
					$tag->Cli();
					
				$tag->Cul();
			$tag->Cdiv();
			
			$tag->div('small-2 large-2 columns');	
				$tag->ul('pricing-table');
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('CONSTITUIÇÃO');
						$tag->Clabel();
						$tag->input(utf8_decode('constituição'),'','constituicao','constituicao','text');					
					$tag->Cli();
					
				$tag->Cul();
			$tag->Cdiv();
			
			$tag->div('small-2 large-2 columns');	
				$tag->ul('pricing-table');
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('DESTREZA');
						$tag->Clabel();
						$tag->input(utf8_decode('destreza'),'','destreza','destreza','text');					
					$tag->Cli();
					
				$tag->Cul();
			$tag->Cdiv();
			
			$tag->div('small-2 large-2 columns');	
				$tag->ul('pricing-table');
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('INTELIGÊNCIA');
						$tag->Clabel();
						$tag->input(utf8_decode('inteligência'),'','inteligencia','inteligencia','text');					
					$tag->Cli();
					
				$tag->Cul();
			$tag->Cdiv();
			
			$tag->div('small-2 large-2 columns');	
				$tag->ul('pricing-table');
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('SABEDORIA');
						$tag->Clabel();
						$tag->input(utf8_decode('sabedoria'),'','sabedoria','sabedoria','text');					
					$tag->Cli();
					
				$tag->Cul();
			$tag->Cdiv();
			
			$tag->div('small-2 large-2 columns');	
				$tag->ul('pricing-table');
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('CARISMA');
						$tag->Clabel();
						$tag->input(utf8_decode('carisma'),'','carisma','carisma','text');					
					$tag->Cli();
					
				$tag->Cul();
			$tag->Cdiv();
		$tag->Cdiv();
	$tag->Cdiv();
	
	$tag->div('small-2 large-12 columns');	
		
		$tag->div('row');
			$tag->div('small-2 large-4 columns');	
				$tag->ul('pricing-table');
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('Qual é o nome do seu personagem?');
						$tag->Clabel();
						$tag->input(utf8_decode('Insira o nome dele(a) aqui.'),'','nome do personagem','nome','text');					
					$tag->Cli();
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('Você é o jogador...');
						$tag->Clabel();
						$tag->input(utf8_decode('Insira o seu nome aqui.'),'','nome do jogador','player_nome','text');					
					$tag->Cli();
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('Qual a sua Raça?');
						$tag->Clabel();
						$tag->select('display:none','customDropdown','','racas');
							$tag->option('SELECTED');
								echo utf8_decode('');
							$tag->Coption();	
						$racas = array("Humano","Anão","Elfo","Gnomo","Meio elfo","Meio orc","Halfling",
									   "Humana","Anã","Elfa","Gnoma","Meio elfa","Meio orc","Halfling");
						for($i=0; $i<count($racas); $i++):
							$tag->option('');
								echo utf8_decode(''.$racas[$i].'');
							$tag->Coption();
						endfor;								
						$tag->Cselect();						
					$tag->Cli();
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('Qual a sua Classe?');
						$tag->Clabel();
		
						$tag->select('display:none','customDropdown','','classes');
							$tag->option('SELECTED');
								echo utf8_decode('');
							$tag->Coption();
							
							$classes= array("barbaro","guerreiro","paladino","monge","ladino","clerigo","bardo","feiticeiro","mago","druida","ranger",
										"barbara","guerreira","paladina","monge","ladina","cleriga","barda","feiticeira","maga","druida","ranger");
							for($i=0; $i<count($classes); $i++):
								$tag->option('');
									echo utf8_decode(''.$classes[$i].'');
								$tag->Coption();
							endfor;											
						$tag->Cselect();
					$tag->Cli();
	
					
					$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Qual o seu nivel?');
					$tag->Clabel();
				
				
					$tag->select('display:none','customDropdown','','nivel');
					
						$tag->option('SELECTED');
							echo utf8_decode('');
						$tag->Coption();
						
						for($i=1; $i<=20; $i++):
							$tag->option('');
								echo utf8_decode(''.$i.'');
							$tag->Coption();
						endfor;						
					$tag->Cselect();
				$tag->Cli();
			
			$tag->Cul();
			
		$tag->Cdiv();	
		
		$tag->div('small-2 large-4 columns');	
		
			$tag->ul('pricing-table');
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Qual é a sua altura?');
					$tag->Clabel();
					$tag->input(utf8_decode('Insira sua altura aqui.'),'','altura','altura','text');					
				$tag->Cli();
				
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Quanto você pesa?');
					$tag->Clabel();
					$tag->input(utf8_decode('Insira o seu peso aqui.'),'','peso','peso','text');					
				$tag->Cli();
				
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Quantos anos você tem?');
					$tag->Clabel();
					$tag->input(utf8_decode('Insira sua idade aqui.'),'','idade','idade','text');					
				$tag->Cli();
				
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Qual a cor dos seus olhos?');
					$tag->Clabel();
					$tag->input(utf8_decode('Insira a cor dos seus olhos aqui.'),'','olhos','olhos','text');					
				$tag->Cli();
				
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Qual cor é a sua pele?');
					$tag->Clabel();
					$tag->input(utf8_decode('Insira a cor da sua pele aqui.'),'','pele','pele','text');					
				$tag->Cli();

			$tag->Cul();
			
		$tag->Cdiv();
			
		$tag->div('small-2 large-4 columns');	
		
			$tag->ul('pricing-table');
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Qual o seu sexo?');
					$tag->Clabel();
	
					$tag->select('display:none','customDropdown','','sexo');
						$tag->option('SELECTED');
							echo utf8_decode('');
						$tag->Coption();
						
						$sexo = array("masculino","feminino");
						for($i=0; $i<count($sexo); $i++):
							$tag->option('');
								echo utf8_decode(''.$sexo[$i].'');
							$tag->Coption();
						endfor;	
					$tag->Cselect();				
				$tag->Cli();
				
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Como é sua tendencia?');
					$tag->Clabel();
					$tag->select('display:none','customDropdown','','tendencia');
						$tag->option('SELECTED');
							echo utf8_decode('');
						$tag->Coption();
						$tendencia = array("Leal e Bom","Caótico e Bom","Neutro e Bom","Leal e Mal","Caótico e Mau",
										   "Neutro e Mau");
						for($i=0; $i<count($tendencia); $i++):
							$tag->option('');
								echo utf8_decode(''.$tendencia[$i].'');
							$tag->Coption();
						endfor;			
					$tag->Cselect();						
				$tag->Cli();
				
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Qual a sua divindade?');
					$tag->Clabel();
					$tag->input(utf8_decode('Insira o nome da sua divindade aqui.'),'','divindade','divindade','text');					
				$tag->Cli();
				
				
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('Qual a cor do seu cabelo?');
					$tag->Clabel();
					$tag->input(utf8_decode('Insira a cor do seu cabelo aqui.'),'','cor do cabelo','cabelos','text');					
				$tag->Cli();
				
				$tag->li('bullet-item');
					$tag->label();
						echo utf8_decode('De que lugar você é?');
					$tag->Clabel();
					$tag->input(utf8_decode('Insira o nome de uma idade, reino ou vilarejo ende seu personagem nasceu.'),'','local de nascimento.','local','text');					
				$tag->Cli();

			$tag->Cul();
			
		$tag->Cdiv();
	
	$tag->Cdiv();
		
		$tag->div('row');
			
			$tag->div('small-2 large-6 columns');	
			
				$tag->ul('pricing-table');
					
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('O que você carrega?');
						$tag->Clabel();
					$tag->text_area(utf8_decode('Liste aqui apenas coisas comuns que você carrega como, tocha, corda, livro e etc. Obs: Preencha os 4 campos, caso algum fique faltando, todos eles serão preenchidos de forma aleatória.'),'text-area','','seus equipamentos.','equipamentos');
					$tag->Ctext_area();							
					$tag->Cli();
					
				$tag->ul();
				
			$tag->Cdiv();
		
			$tag->div('small-2 large-6 columns');	
			
				$tag->ul('pricing-table');
				
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('Quais itens mágicos você carrega?');
						$tag->Clabel();
					$tag->text_area(utf8_decode('Digite aqui tudo quer for mágico que o seu personagem carrega.'),'text-area','','seus itens.','itens');
					$tag->Ctext_area();	
											
					$tag->Cli();
				$tag->ul();		
				
			$tag->Cdiv();
			
		$tag->Cdiv();
	
	
		$tag->div('row');
			
			$tag->div('small-2 large-6 columns');	
			
				$tag->ul('pricing-table');
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('Quais armas você usa?');
						$tag->Clabel();
					$tag->text_area(utf8_decode('Digite aqui as armas que o seu personagem usa.'),'text-area','','suas armas.','armas');
					$tag->Ctext_area();							
					$tag->Cli();
				$tag->ul();
				
			$tag->Cdiv();
		
			$tag->div('small-2 large-6 columns');	
			
				$tag->ul('pricing-table');
					$tag->li('bullet-item');
						$tag->label();
							echo utf8_decode('Qual armadura você usa?.');
						$tag->Clabel();
					$tag->text_area(utf8_decode('Digite aqui as características da armadura que seu personagem usa.'),'text-area','','sua armaduraa','armaduras');
					$tag->Ctext_area();							
					$tag->Cli();
				$tag->ul();		
			$tag->Cdiv();
			
		$tag->Cdiv();
		
		$tag->div('row');
			$tag->div('small-2 large-12 columns');	
				
					$tag->ul('pricing-table');
						$tag->li('bullet-item');
							$tag->label();
								echo utf8_decode('Qual sua história?');
							$tag->Clabel();
						$tag->text_area(utf8_decode('Conte como foi a história do seu personagem.'),'text-area','','sua historia completa.',utf8_decode('historia'));
						$tag->Ctext_area();							
						$tag->Cli();
					$tag->ul();		
				$tag->Cdiv();
			
			$tag->Cdiv();
			
		$tag->Cdiv();		
	$tag->Cdiv();	
$tag->Cdiv();
$tag->Cform();	
?>

