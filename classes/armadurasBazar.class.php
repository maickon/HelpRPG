<?php
require_once('bazar.class.php');

class ArmadurasBazar{
	
	private $nome;
	private $raridade;
	private $tipo = 'Armaduras';
	private $bonus_magico;
	private $precoBase;
	private $habilidade;
	
	function getNome(){
		return $this->nome;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function getRaridade(){
		return $this->raridade;
	}
	
	function setRaridade($raridade){
		$this->raridade = $raridade;
	}
	
	function getTipo(){
		return $this->tipo;
	}
	
	function setTipo($tipo){
		$this->tipo = $tipo;
	}
	
	function getBonus_magico(){
		return $this->bonus_magico;
	}
	
	function setBonus_magico($bonus_magico){
		$this->bonus_magico = $bonus_magico;
	}
	
	function getPreco_base(){
		return $this->precoBase;
	}
	
	function setPrecoBase($preco_base){
		$this->precoBase = $preco_base;
	}
	
	function getHabilidade(){
		return $this->habilidade;
	}
	
	function setHabilidade($habilidade){
		$this->habilidade = $habilidade;
	}
	
	
	function gerar_nome(){
		$armaduras = array('Acolchoada','Corselete de couro','Corselete de couro batido','Camisão de cota de malha','Gibão de peles','Brunea','Cota de malha','Peitoral de aço',	
						 'Cota de talas','Loriga segmentada','Meia armadura','Armadura de batalha');
		$escolido = rand(0,count($armaduras)-1);
		$this->nome = $armaduras[$escolido];
	}
	
	function bonus_magico(){
		switch($this->raridade):
			case 'Menor':
				$magico = rand(1,2);
				if($magico == 1):
					$this->bonus_magico = 1;
				else:
					$this->bonus_magico = 2;			
				endif;
			break;
			
			case 'Médio':
				$magico = rand(2,4);
				if($magico == 2):
					$this->bonus_magico = 2;
				elseif($magico == 3):
					$this->bonus_magico = 3;
				else:
					$this->bonus_magico = 4;			
				endif;
			break;
			
			case 'Maior':
				$magico = rand(3,5);
				if($magico == 3):
					$this->bonus_magico = 3;
				elseif($magico == 4):
					$this->bonus_magico = 4;
				elseif($magico == 5):
					$this->bonus_magico = 5;
				endif;
			break;
		endswitch;
	}
	
	function gerar_habilidade_especial(){
		switch($this->raridade):
			case 'Menor':
				$habilidades = array('Camuflagem','Fortificação leve','Escorregadia','Sombria','Silenciosa','Resistência à magia (13)','Escorregadia aprimorada',
									 'Sombria aprimorada','Silenciosa aprimorada');
									 $x = rand(0,1);
									 if($x == 0):
									 	return $habilidades;
									 else:
									 	$habilidades = '-';
										return $habilidades;
									 endif;	
			break;
			
			case 'Médio':
				$habilidades = array('Camuflagem','Fortificação leve','Escorregadia','Sombria','Silenciosa','Resistência à magia (13)','Escorregadia aprimorada',
									 'Sombria aprimorada','Silenciosa aprimorada','Resistência à ácido','Resistência ou frio','Resistência à eletricidade', 
									 'Resistência ao fogo','Resistência sônica','Toque espectral','Invulnerabilidade','Fortificação moderada','Resistência à magia (15)',
									 'Selvagem');
									 
									$x = rand(0,1);
									 if($x == 0):
									 	return $habilidades;
									 else:
									 	$habilidades = '-';
										return $habilidades;
									 endif;	
			break;
			
			case 'Maior':
				$habilidades = array('Camuflagem','Fortificação leve','Escorregadia','Sombria','Silenciosa','Resistência à magia (13)','Escorregadia aprimorada',
									 'Sombria aprimorada','Silenciosa aprimorada','Resistência à ácido','Resistência ou frio','Resistência à eletricidade', 
									 'Resistência ao fogo','Resistência sônica','Toque espectral','Invulnerabilidade','Fortificação moderada','Resistência à magia (15)',
									 'Selvagem','Escorregadia maior','Sombria maior','Silenciosa maior','Resistência a ácido aprimorada','Resistência ao frio aprimorada',
									 'Resistência à eletricidade aprimorada','Resistência ao fogo aprimorada','Resistência sônica aprimorada','Resistência à magia (17)',
									 'Forma etéria','Controlar mortos-vivos','Fortificação pesada','Resistência à magia (19)','Resistência a ácido  maior',
									 'Resistência ao frio maior','Resistência à eletricidade maior','Resistência ao fogo maior','Resistência sônica maior',
									 'Resistência à magia (21)');
									
									$x = rand(0,1);
									if($x == 0):
									 	return $habilidades;
									else:
									 	$habilidades = '-';
										return $habilidades;
									endif;	
			break;
		endswitch;
	}
	
	function gerar_preco_de_habilidade($habilidades){
		$escolido = rand(0,count($habilidades)-1);
		switch($habilidades[$escolido]):
		
			case "-":
				$this->precoBase = $this->precoBase+0;	
				$this->habilidade = $habilidades[$escolido];	
				break;
			
			case "Camuflagem":
				$this->habilidade = $habilidades[$escolido];
				$this->precoBase = $this->precoBase+2700;
				break;
				
			case "Fortificação leve":
				$this->habilidade = $habilidades[$escolido];
				$this->precoBase = $this->precoBase+1000;
				break;
				
			case "Escorregadia":
				$this->precoBase = $this->precoBase+3750;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Sombria":
				$this->precoBase = $this->precoBase+3750;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Silenciosa":
				$this->precoBase = $this->precoBase+4000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência à magia (13)":
				$this->precoBase = $this->precoBase+15000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Escorregadia aprimorada":
				$this->precoBase = $this->precoBase+15000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Sombria aprimorada":
				$this->precoBase = $this->precoBase+15000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Silenciosa aprimorada":
				$this->precoBase = $this->precoBase+18000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência a ácido":
				$this->precoBase = $this->precoBase+18000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência a frio":
				$this->precoBase = $this->precoBase+18000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência a eletricidade":
				$this->precoBase = $this->precoBase+18000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência ao fogo":
				$this->precoBase = $this->precoBase+18000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência sônica":
				$this->precoBase = $this->precoBase+9000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Toque espectral":
				$this->precoBase = $this->precoBase+9000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Invulnerabilidade":
				$this->precoBase = $this->precoBase+9000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Fortificação moderada":
				$this->precoBase = $this->precoBase+9000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência à magia (15)":
				$this->precoBase = $this->precoBase+9000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Selvagem":
				$this->precoBase = $this->precoBase+9000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Escorregadia maior":
				$this->precoBase = $this->precoBase+33750;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Sombria maior":
				$this->precoBase = $this->precoBase+33750;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Silenciosa maior":
				$this->precoBase = $this->precoBase+33750;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência a ácido aprimorada":
				$this->precoBase = $this->precoBase+42000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência ao frio aprimorada":
				$this->precoBase = $this->precoBase+42000;
				$this->habilidade = $habilidades[$escolido];
				break;
			
			case "Resistência à eletricidade aprimorada":
				$this->precoBase = $this->precoBase+42000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência ao fogo aprimorada":
				$this->precoBase = $this->precoBase+42000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência sônica aprimorada":
				$this->precoBase = $this->precoBase+42000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência à magia (17)":
				$this->precoBase = $this->precoBase+16000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Forma etéria":
				$this->precoBase = $this->precoBase+49000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Controlar mortos-vivos":
				$this->precoBase = $this->precoBase+49000;
				$this->habilidade = $habilidades[$escolido];
				break;
	
			case "Fortificação pesada":
				$this->precoBase = $this->precoBase+25000;
				$this->habilidade = $habilidades[$escolido];
	
				break;
				
			case "Resistência à magia (19)":
				$this->precoBase = $this->precoBase+25000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência a ácido  maior":
				$this->precoBase = $this->precoBase+66000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência ao frio maior":
				$this->precoBase = $this->precoBase+66000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência à eletricidade maior":
				$this->precoBase = $this->precoBase+66000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência ao fogo maior":
				$this->precoBase = $this->precoBase+66000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência sônica maior":
				$this->precoBase = $this->precoBase+66000;
				$this->habilidade = $habilidades[$escolido];
				break;
				
			case "Resistência à magia (21)":
				$this->precoBase = $this->precoBase+66000;
				$this->habilidade = $habilidades[$escolido];
				break;
					
			endswitch;
	}
	
	function gerar_preco_por_bonus_magico(){
		switch($this->bonus_magico):
			case 1:
				$this->precoBase = $this->precoBase+1000;
			break;
			
			case 2:
				$this->precoBase = $this->precoBase+4000;
			break;
			
			case 3:
				$this->precoBase = $this->precoBase+9000;
			break;
			
			case 4:
				$this->precoBase = $this->precoBase+16000;
			break;
			
			case 5:
				$this->precoBase = $this->precoBase+25000;
			break;
		endswitch;
	}
	
	function gerar_preco_base(){
		
		switch($this->nome):
			case 'Acolchoada':
				$this->precoBase = $this->precoBase+155;
			break;
			
			case 'Corselete de couro':
				$this->precoBase = $this->precoBase+160;
			break;
			
			case 'Corselete de couro batido':
				$this->precoBase = $this->precoBase+175;
			break;
			
			case 'Brunea':
				$this->precoBase = $this->precoBase+200;
			break;
			
			case 'Gibão de peles':
				$this->precoBase = $this->precoBase+165;
			break;
			
			case 'Cota de malha':
				$this->precoBase = $this->precoBase+300;
			break;
			
			case 'Peitoral de aço':
				$this->precoBase = $this->precoBase+350;
			break;
			
			case 'Cota de talas':
				$this->precoBase = $this->precoBase+350;
			break;
			
			case 'Loriga segmentada':
				$this->precoBase = $this->precoBase+400;
			break;
			
			case 'Meia armadura':
				$this->precoBase = $this->precoBase+750;
			break;
			
			case 'Armadura de batalha':
				$this->precoBase = $this->precoBase+1650;
			break;
			
		endswitch;
	}
}


$bazar = new Bazar();
$bazar->setNd(20);
$bazar->gerar_raridade();
$bazar->gerar_tipo();

$armadura = new ArmadurasBazar();
$armadura->setRaridade('Maior');
$armadura->bonus_magico();
$armadura->gerar_preco_por_bonus_magico();
$armadura->gerar_nome($bazar->getTipo());

$armadura->gerar_preco_de_habilidade($armadura->gerar_habilidade_especial());


$armadura->gerar_preco_base();


echo utf8_decode('Nome: '.$armadura->getNome().'<br />');
echo utf8_decode('habilidade: '.$armadura->getHabilidade().'<br />');
echo utf8_decode('Mágico: '.$armadura->getBonus_magico().'<br />');
echo utf8_decode('Raridade: '.$armadura->getRaridade().'<br />');
echo utf8_decode('Preço: '.$armadura->getPreco_base().'<br />');
echo utf8_decode('Tipo: '.$armadura->getTipo());



?>