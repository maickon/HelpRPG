<?php
/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @version   1.2
 * @link      https://github.com/maickon/HelpRPG
 */
require_once(dirname(__FILE__)."/autoload.class.php");
protegeArquivo(basename(__FILE__));

class armas extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'armas';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"nome" 			=> NULL,
				"dominio" 		=> NULL,
				"dano" 			=> NULL,
				"preco" 		=> NULL,
				"decisivo" 		=> NULL,
				"distancia" 	=> NULL,
				"peso" 			=> NULL,
				"tipo" 			=> NULL,
				"descricao" 	=> NULL,
				"categoria" 	=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
			
	function exibir_armas($tipo,$inicial=1,$num_reg=1){
		switch($tipo):
			case 'armas_simples':
				$this->extras_select = "WHERE categoria='Armas Simples' LIMIT  $inicial,$num_reg";
			break;
			
			case 'armas_comuns':
				$this->extras_select = "WHERE categoria='Armas Comuns' LIMIT  $inicial,$num_reg";
			break;
			
			case 'armas_exoticas':
				$this->extras_select = utf8_decode("WHERE categoria='Armas Exóticas' LIMIT  $inicial,$num_reg");
			break;
			
			case 'armas_magicas':
				$this->extras_select = utf8_decode(" LIMIT  $inicial,$num_reg");
			break;
		endswitch;
		return $this->seleciona_tudo($this);
	}	
	
	function buscar_armas($nome){
		$this->extras_select = utf8_decode("WHERE nome LIKE '%$nome%'");
		$this->seleciona_tudo($this);
	}
	function qtd_armas_pesquisadas($armas){
		$cont=0;
		while($objeto_resp = $armas->retorna_dados()):
			$cont++;
		endwhile;
		return $cont;
	}
}//fim classe home
	

class ArmasMagicas extends armas{

	private $bonusMagico;
	private $categoriaMagica;
	private $habilidadeMagica1;
	private $habilidadeMagica2;
	private $habilidadeMagica3;
	private $habilidadeMagica4;
	private $habilidadeMagica5;
	private $artefato;
	private $custoDaArma;
	private $precoBase;
	private $categoria = "Armas Mágicas";
	
	function __construct(){
		parent::__construct();
			$this->gerarCategoriaMagica();
			$this->gerarBonusMagico();
			$this->gerarPrecoBase($this->getBonusMagico(),$this->getCategoriaMagica());
			$this->gerarCustoDaArma();
			$this->gerarArtefato($this->bonusMagico);
			$this->categoriaMaisCinco($this->categoriaMagica);
	}
	
	function getBonusMagico(){
		return $this->bonusMagico;
	}
	
	function setBonusMagico($bonusMagico){
		$this->bonusMagico = $bonusMagico;
	}
	
	function getCategoriaMagica(){
		return $this->categoriaMagica;
	}
	
	function setCategoriaMagica($categoriaMagica){
		$this->categoriaMagica = $categoriaMagica;
	}
	
	function getHabilidadeMagica1(){
		return $this->habilidadeMagica1;
	}
	
	function setHablidadeMagica1($habilidadeMagica1){
		$this->habilidadeMagica1 = $habilidadeMagica1;
	}
	
	function getHabilidadeMagica2(){
		return $this->habilidadeMagica2;
	}
	
	function setHablidadeMagica2($habilidadeMagica2){
		$this->habilidadeMagica2 = $habilidadeMagica2;
	}
	
	function getHabilidadeMagica3(){
		return $this->habilidadeMagica3;
	}
	
	function setHablidadeMagica3($habilidadeMagica3){
		$this->habilidadeMagica3 = $habilidadeMagica3;
	}

	function getHabilidadeMagica4(){
		return $this->habilidadeMagica4;
	}
	
	function setHablidadeMagica4($habilidadeMagica4){
		$this->habilidadeMagica4 = $habilidadeMagica4;
	}
	
	function getArtefato(){
		return $this->artefato;
	}
	
	function setArtefato($artefato){
		$this->artefato = $artefato;
	}
	
	function getCustoDaArma(){
		return $this->custoDaArma;
	}
	
	function setCustoDaArma($custoDaArma){
		$this->custoDaArma = $custoDaArma;
	}
	
	function getPrecoBase(){
		$this->precoBase;
	}
	
	function setPrecoBase($precoBase){
		$this->precoBase = $precoBase;
	}
	
	function getCategoria(){
		return $this->categoria();
	}
	
	function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	
	function gerarBonusMagico(){
		
		$bonus = rand(0,5);
		if($this->categoriaMagica >= 1 && $bonus == 0){
			$bonus = 1;
		}
		$this->bonusMagico = $bonus;
	}
	
	function gerarCategoriaMagica(){
		
		$categoria = rand(0,5);
		$this->categoriaMagica = $categoria;
	}
	
	function gerarArtefato(){
		switch($this->bonusMagico){
			case 0:$this->artefato = "Obra prima";
				break;
				
			case 1:$this->artefato = "Menor";
				break;
				
			case 2:$this->artefato = "Menor";
				break;
				
			case 3:$this->artefato = "Médio";
				break;
				
			case 4:$this->artefato = "Médio";
				break;
				
			case 5:$this->artefato = "Maior";
				break;
		}
	}
	
	function custoTotal(){
		return (int($this->campos_valores['preco']) + $this->custoDaArma + $this->precoBase);
	}
	
	function  gerarHabilidadeMagica($categoriaMagica){
		
		$tamanho;
		$escolido;
		$habilidade = null;
		
		if($this->campos_valores['tipo'] == "Armas de Ataque à Distância"){
			if($categoriaMagica == 5){
				$categoriaMagica = $this->bonusMagico -1;
			}
		}
		
		switch($categoriaMagica){
		
			case 0 :$habilidade = "Sem habilidade";
			break;
			
			case 1 :if($this->campos_valores['tipo'] == "Armas de Ataque à Distância"){
					
					$habilidades = array("Anti criatura","Distância","Flamejante","Congelante","Misericórdia","Retorno",
					"Elétrica","Caçador","Trovejante");
					$tamanho  = count($habilidades);
					$escolido = rand(0, $tamanho-1);
					$habilidade = $habilidades[$escolido];
					
				}else {
						$habilidades = array("Anti criatura","Distância","Flamejante","Congelante","Elétrica",
						"Retorno","Elétrica","Toque espectral","Afiada","Foco chi","Misericórdia","Trespassar poderoso","Armazenar magias",
						"Arremesso","Trovejante","Dissonante");
						$tamanho  = count($habilidades);
						$escolido = rand(0, $tamanho-1);
						$habilidade = $habilidades[$escolido];
				}
			break;
			
			case 2 :if($this->campos_valores['tipo'] == "Armas de Ataque à Distância"){
				
					$habilidades = array("Anárquico","Axiomático","Explosão flamejante","Sagrado","Explosão congelante",
					"Explosão elétrica","Profano");
					$tamanho  = count($habilidades);
					$escolido = rand(0, $tamanho-1);
					$habilidade = $habilidades[$escolido];
					
				}else {
					$habilidades = array("Anárquico","Axiomático","Rompimento","Explosão flamejante","Explosão congelante",
					"Sagrada","Explosão elétrica","Profana","Sangramento");
					$tamanho  = count($habilidades);
					$escolido = rand(0, $tamanho-1);
					$habilidade = $habilidades[$escolido];
				}
			break;
			
			case 3 : $habilidade = "Velocidade";
			break;
			
			case 4 :if($this->campos_valores['tipo'] == "Armas de Ataque à Distância"){
	
				$habilidade = "Energia brilhante";
				
			}else {
				$habilidades = array("Energia brilhante","Dançarino");
				$tamanho  = count($habilidades);
				$escolido = rand(0, $tamanho-1);
				$habilidade = $habilidades[$escolido];
			}
			break;
			
			case 5 :$habilidade = "Vorpal";
			break;
			}
			
			return $habilidade;
	}

	function categoriaMaisUm($categoriaMag){
		
			$this->habilidadeMagica1 = $this->gerarHabilidadeMagica($categoriaMag);
			$this->habilidadeMagica2 = "";
			$this->habilidadeMagica3 = "";
			$this->habilidadeMagica4 = "";
			$this->habilidadeMagica5 = "";
	}
	
	function categoriaMaisDois($categoriaMag){
		
		$tamanho;
		$escolido;
		
		if($categoriaMag == 1){
			$this->categoriaMaisUm();
		}else{
			$modelo = rand(1,2);
			switch($modelo){
			case 1: 
				$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica3 = "";
				$this->habilidadeMagica4 = "";
				$this->habilidadeMagica5 = "";
				break;
				
			case 2:
				$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(2);
				$this->habilidadeMagica2 = "";
				$this->habilidadeMagica3 = "";
				$this->habilidadeMagica4 = "";
				$this->habilidadeMagica5 = "";
				break;
				
			}
		}
	}
	
	function categoriaMaisTres($categoriaMag){
		
		$tamanho;
		$escolido;
		
		if($categoriaMag == 1){
			$this->categoriaMaisUm($categoriaMag);
		}else if($categoriaMag == 2){
			$this->categoriaMaisDois($categoriaMag);
		}else{
			$modelo = rand(1,3);
			switch($modelo){
			case 1: 
				$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica3 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica4 = "";
				$this->habilidadeMagica5 = "";
				break;
				
			case 2:
				$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(2);
				$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica3 = "";
				$this->habilidadeMagica4 = "";
				$this->habilidadeMagica5 = "";
				break;
				
			case 3:
				$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(3);
				$this->habilidadeMagica2 = "";
				$this->habilidadeMagica3 = "";
				$this->habilidadeMagica4 = "";
				$this->habilidadeMagica5 = "";
				break;
			}
		}
	}
	
	
	function  categoriaMaisQuatro($categoriaMag){
		
		$tamanho;
		$escolido;
		
		if($categoriaMag == 1){
			$this->categoriaMaisUm($categoriaMag);
		}else if($categoriaMag == 2){
			$this->categoriaMaisDois($categoriaMag);
		}else if($categoriaMag == 3){
			$this->categoriaMaisTres($categoriaMag);
		}else{
			$modelo = rand(1,4);
			switch($modelo){
			case 1: 
				$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica3 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica4 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica5 = "";
				break;
				
			case 2:
				$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(2);
				$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(2);
				$this->habilidadeMagica3 = "";
				$this->habilidadeMagica4 = "";
				$this->habilidadeMagica5 = "";
				break;
				
			case 3:
				$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(3);
				$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(1);
				$this->habilidadeMagica3 = "";
				$this->habilidadeMagica4 = "";
				$this->habilidadeMagica5 = "";
				break;
				
			case 4:
				$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(4);
				$this->habilidadeMagica2 = "";
				$this->habilidadeMagica3 = "";
				$this->habilidadeMagica4 = "";
				$this->habilidadeMagica5 = "";
				break;
			}
		}
	}
	
	function categoriaMaisCinco($categoriaMag){
		
		$tamanho;
		$escolido;
		if($categoriaMag == 0){
			$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(0);
			$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(0);
			$this->habilidadeMagica3 = $this->gerarHabilidadeMagica(0);
			$this->habilidadeMagica4 = $this->gerarHabilidadeMagica(0);
			$this->habilidadeMagica5 = $this->gerarHabilidadeMagica(0);
		}else if($categoriaMag == 1){
			$this->categoriaMaisUm($categoriaMag);
		}else if($categoriaMag == 2){
			$this->categoriaMaisDois($categoriaMag);
		}else if($categoriaMag == 3){
			$this->categoriaMaisTres($categoriaMag);
		}else if($categoriaMag == 4){
			$this->categoriaMaisQuatro($categoriaMag);
		}else{
			$modelo = rand(1,4);
					switch($modelo){
					case 1: 
						$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(1);
						$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(1);
						$this->habilidadeMagica3 = $this->gerarHabilidadeMagica(1);
						$this->habilidadeMagica4 = $this->gerarHabilidadeMagica(1);
						$this->habilidadeMagica5 = $this->gerarHabilidadeMagica(1);
						break;
						
					case 2:
						$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(2);
						$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(2);
						$this->habilidadeMagica3 = $this->gerarHabilidadeMagica(1);
						$this->habilidadeMagica4 = "";
						$this->habilidadeMagica5 = "";
						break;
						
					case 3:
						$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(3);
						$this->habilidadeMagica2 = $this->gerarHabilidadeMagica(2);
						$this->habilidadeMagica3 = "";
						$this->habilidadeMagica4 = "";
						$this->habilidadeMagica5 = "";
						break;
						
					case 4:
						$this->habilidadeMagica1 = $this->gerarHabilidadeMagica(5);
						break;
					}
		}
		
	}

	
	function  gerarPrecoBase($bonusMag, $categoriaMag){
			$bonusTotal = ($bonusMag + $categoriaMag);
			switch($bonusTotal){
			
			case 0:
				$this->precoBase = 0;
				break;
			
			case 1:
				$this->precoBase = 2000;
				break;
				
			case 2:
				$this->precoBase = 8000;
				break;
				
			case 3:
				$this->precoBase = 18000;
				break;
				
			case 4:
				$this->precoBase = 32000;
				break;
				
			case 5:
				$this->precoBase = 50000;
				break;
				
			case 6:
				$this->precoBase = 72000;
				break;
				
			case 7:
				$this->precoBase = 98000;
				break;
				
			case 8:
				$this->precoBase = 128000;
				break;
				
			case 9:
				$this->precoBase = 162000;
				break;
				
			case 10:
				$this->precoBase =  200000;
				break;
			}
	}
	function gerarCustoDaArma(){		
		return ($this->precoBase);			
	}
}
?>