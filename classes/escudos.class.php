<?php

/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @version   1.2
 * @link      https://github.com/maickon/HelpRPG
 */
 
class Escudos {
	
	private $categoria = "Escudos ";
	private $nome;
	private $custo;
	private $bonusNaCa;
	private $destrezaMaxima;
	private $penalidadeNaPericia;
	private $falhaDeMagiaArcana;
	private $deslocamentoMedio;
	private $deslocamentoPequeno;
	private $peso;
	private $descricao;
	
	
	function __construct(){
		$this->gerarNomeDoEscudo();
		$this->gerarEscudo($this->nome);
	}
	
	function getCategoria(){
		return $this->categoria;
	}
	
	function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	
	function getNome(){
		return $this->nome;
	}
	
	function setNome($nome){
		$this->nome = $nome;
	}
	
	function getCusto(){
		return $this->custo;
	}
	
	function setCusto($custo){
		$this->custo = $custo;
	}
	
	function getBonusNaCa(){
		return $this->bonusNaCa;
	}
	
	function setBonusNaCa($bonusNaCa){
		$this->bonusNaCa = $bonusNaCa;
	}
	
	function getDestrezaMaxima(){
		return $this->destrezaMaxima;
	}
	
	function setDestrezaMaxima($destrezaMaxima){
		$this->destrezaMaxima = $destrezaMaxima;
	}
	
	function getPenalidadeNaPericia(){
		return $this->penalidadeNaPericia;
	}
	
	function setPenalidadeNaPericia($penalidadeNaPericia){
		$this->penalidadeNaPericia = $penalidadeNaPericia;
	}
	
	function getFalhaDeMagiaArcana(){
		return $this->falhaDeMagiaArcana;
	}
	
	function setFalhaDeMagiaArcana($falhaDeMagiaArcana){
		$this->falhaDeMagiaArcana = $falhaDeMagiaArcana;
	}
	
	function getDeslocamentoMedio(){
		return $this->deslocamentoMedio;
	}
	
	function setDeslocamentoMedio($deslocamentoMedio){
		$this->deslocamentoMedio = $deslocamentoMedio;
	}
	
	function getDeslocamentoPequeno(){
		return $this->deslocamentoPequeno;
	}
	
	function setDeslocamentoPequeno($deslocamentoPequeno){
		$this->deslocamentoPequeno = $deslocamentoPequeno;
	}
	
	function getPeso(){
		return $this->peso;
	}
	
	function setPeso($peso){
		$this->peso = $peso;
	}
	
	function getDescricao(){
		return $this->descricao;
	}
	
	function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	
	function gerarNomeDoEscudo(){
		$nome = array("Broquel","Escudo pequeno de madeira","Escudo pequeno de metal",
				"Escudo grande de madeira", "Escudo grande de metal","Escudo de corpo");
		$tamanho  = count($nome);
		$escolido = rand(0, $tamanho-1);
		$this->nome = $nome[$escolido];
		return $this->nome;
	}
	
	
	function gerarEscudo($nome){
		
		switch($nome){
			
			case "Broquel":
				$this->custo = 15;
				$this->bonusNaCa = "+1";
				$this->destrezaMaxima = "-";
				$this->penalidadeNaPericia = "-1";
				$this->falhaDeMagiaArcana = "5%";
				$this->deslocamentoMedio = "- ";
				$this->deslocamentoPequeno = "- ";
				$this->peso = "2,5 kg";
				$this->descricao = "\nEsse pequeno escudo metálico é amarrado no antebraço do personagem, ".
						" permitindo o uso de uma besta ou arco sem penalidades. O personagem ".
						" também pode usar o braço do escudo para empunhar uma arma (seja uma arma ".
						" na mão inábil ou para empunhar uma arma de duas mãos), mas isso acarreta -1 de ".
						" penalidade na jogada de ataque em função do peso adicional no braço. Essa penalidade ".
						" se acumula com o modificador de lutar usando a mão inábil ou combater ".
						" com duas armas. Quando usar uma arma na mão inábil, o personagem não recebe ".
						" o bônus do broquel na CA durante o restante da rodada. ".
						" Não é possível executar um ataque usando um broquel.";
				break;
				
			case "Escudo pequeno de madeira":
				$this->custo = 3;
				$this->bonusNaCa = "+1";
				$this->destrezaMaxima = "-";
				$this->penalidadeNaPericia = "-1";
				$this->falhaDeMagiaArcana = "5%";
				$this->deslocamentoMedio = "- ";
				$this->deslocamentoPequeno = "- ";
				$this->peso = "2,5 kg";
				$this->descricao = "\n Um escudo deve ser amarrado no ".
						" antebraço e empunhado na mão inábil. O escudo pequeno permite que o personagem ".
						" carregue outro item na mão inábil, embora esse objeto não possa ser usado ".
						" como arma. ".
						" Madeira ou Aço: Os escudos de madeira e de metal oferecem a mesma proteção ".
						" básica, mas reagem de forma diferente a ataques especiais (como torcer madeira e ".
						" esquentar metal). ".
						" Ataques com Escudo: O personagem é capaz de golpear um oponente com seu ".
						" escudo pequeno, usando-o como uma arma na mão inábil. Veja a Tabela 7-5: Armas ".
						" para obter o dano causado por um ataque com escudo. Quando é utilizado dessa ".
						" forma, um escudo pequeno será uma arma comum de concussão. Em relação as ".
						" penalidades nas jogadas de ataque, considere um escudo pequeno como uma arma ".
						" leve. Quando utiliza seu escudo como arma, o personagem perde seu bônus de ".
						" escudo na CA até a próxima ação (geralmente na rodada subseqüente). O bônus de ".
						" melhoria do escudo não afeta sua eficácia de ataque, embora seja possível encantá-lo ".
						" como uma arma mágica. ". 
						" Gibão de Peles";
				break;
				
			case "Escudo pequeno de metal":
				$this->custo = 9;
				$this->bonusNaCa = "+1";
				$this->destrezaMaxima = "-";
				$this->penalidadeNaPericia = "-1";
				$this->falhaDeMagiaArcana = "5%";
				$this->deslocamentoMedio = "- ";
				$this->deslocamentoPequeno = "- ";
				$this->peso = "3 kg";
				$this->descricao = " \nUm escudo deve ser amarrado no ".
						" antebraço e empunhado na mão inábil. O escudo pequeno permite que o personagem ".
						" carregue outro item na mão inábil, embora esse objeto não possa ser usado ".
						" como arma. ".
						" Madeira ou Aço: Os escudos de madeira e de metal oferecem a mesma proteção ".
						" básica, mas reagem de forma diferente a ataques especiais (como torcer madeira e ".
						" esquentar metal). ".
						" Ataques com Escudo: O personagem é capaz de golpear um oponente com seu ".
						" escudo pequeno, usando-o como uma arma na mão inábil. Veja a Tabela 7-5: Armas ".
						" para obter o dano causado por um ataque com escudo. Quando é utilizado dessa ".
						" forma, um escudo pequeno será uma arma comum de concussão. Em relação as ".
						" penalidades nas jogadas de ataque, considere um escudo pequeno como uma arma ".
						" leve. Quando utiliza seu escudo como arma, o personagem perde seu bônus de ".
						" escudo na CA até a próxima ação (geralmente na rodada subseqüente). O bônus de ".
						" melhoria do escudo não afeta sua eficácia de ataque, embora seja possível encantá-lo ".
						" como uma arma mágica. ".
						" Gibão de Peles";
				break;
				
			case "Escudo grande de madeira":
				$this->custo = 7;
				$this->bonusNaCa = "+2";
				$this->destrezaMaxima = "-";
				$this->penalidadeNaPericia = "-2";
				$this->falhaDeMagiaArcana = "15%";
				$this->deslocamentoMedio = "- ";
				$this->deslocamentoPequeno = "- ";
				$this->peso = "5 kg";
				$this->descricao = "\nUm escudo deve ser amarrado no ".
						" antebraço e empunhado na mão inábil. Um escudo grande é pesado e o personagem ".
						" não consegue utilizar a mão do escudo para realizar qualquer tarefa. ".
						" Madeira ou Aço: Os escudos de madeira e de metal oferecem a mesma proteção ".
						" básica, mas reagem de forma diferente a ataques especiais (como torcer madeira e ".
						" esquentar metal). ".
						" Ataques com Escudo: O personagem é capaz de golpear um oponente com seu ".
						" escudo grande, usando-o como uma arma na mão inábil. Veja a Tabela 7-5: Armas ".
						" para obter o dano causado por um ataque com o escudo. Quando é utilizado dessa ".
						" forma, um escudo grande será uma arma comum de concussão. Em relação as penalidades ".
						" nas jogadas de ataque, considere um escudo grande como uma arma de ".
						" uma única mão. Quando utiliza seu escudo como arma, o personagem perde seu ".
						" bônus de escudo na CA até a próxima ação (geralmente na rodada subseqüente). O ".
						" bônus de melhoria do escudo não afeta sua eficácia de ataque, embora seja possível ".
						" encantá-lo como uma arma mágica.";
				break;
				
			case "Escudo grande de metal":
				$this->custo = 20;
				$this->bonusNaCa = "+2";
				$this->destrezaMaxima = "-";
				$this->penalidadeNaPericia = "-2";
				$this->falhaDeMagiaArcana = "15%";
				$this->deslocamentoMedio = "- ";
				$this->deslocamentoPequeno = "- ";
				$this->peso = "7,5 kg";
				$this->descricao = "\nUm escudo deve ser amarrado no ".
						" antebraço e empunhado na mão inábil. Um escudo grande é pesado e o personagem ".
						" não consegue utilizar a mão do escudo para realizar qualquer tarefa. ".
						" Madeira ou Aço: Os escudos de madeira e de metal oferecem a mesma proteção ".
						" básica, mas reagem de forma diferente a ataques especiais (como torcer madeira e ".
						" esquentar metal). ".
						" Ataques com Escudo: O personagem é capaz de golpear um oponente com seu ".
						" escudo grande, usando-o como uma arma na mão inábil. Veja a Tabela 7-5: Armas ".
						" para obter o dano causado por um ataque com o escudo. Quando é utilizado dessa ".
						" forma, um escudo grande será uma arma comum de concussão. Em relação as penalidades ".
						" nas jogadas de ataque, considere um escudo grande como uma arma de ".
						" uma única mão. Quando utiliza seu escudo como arma, o personagem perde seu ".
						" bônus de escudo na CA até a próxima ação (geralmente na rodada subseqüente). O ".
						" bônus de melhoria do escudo não afeta sua eficácia de ataque, embora seja possível ".
						" encantá-lo como uma arma mágica.";
				break;
				
			case "Escudo de corpo":
				$this->custo = 30;
				$this->bonusNaCa = "+4";
				$this->destrezaMaxima = "+2";
				$this->penalidadeNaPericia = "+10";
				$this->falhaDeMagiaArcana = "50%";
				$this->deslocamentoMedio = "- ";
				$this->deslocamentoPequeno = "- ";
				$this->peso = "22,5 kg";
				$this->descricao = "\nEsse enorme escudo de madeira é quase tão alto quanto o ".
						" personagem. Na maioria dos casos, ele fornece o bônus de escudo indicado na CA. ".
						" No entanto, é possível usá-lo como cobertura total, mas o personagem não conseguirá ".
						" atacar. O escudo não oferece cobertura para magias à distância; um conjurador é capaz ".
						" de disparar a magia contra o personagem, usando o próprio escudo como alvo. É ".
						" impossível desferir um ataque usando o escudo de corpo como arma. O personagem ".
						" não consegue utilizar a mão do escudo para empunhar outros itens. ".
						" Quando o escudo é utilizado em combate, o usuário sofre -2 de penalidade nas ".
						" jogadas de ataque em função do tamanho do equipamento.";
				break;
			}
		}
	}


class EscudosMagicos extends Escudos{
	
	private $habilidade;
	private $precoBase;
	
	
	function __construct(){
		parent::__construct();
			$this->gerarNomeDoEscudo();
			$this->gerarHabilidadeMagica();	
			$this->gerarPrecoTotal();
			$this->gerarEscudo($this->getNome());
	}
	
	function getHabilidade(){
		return $this->habilidade;
	}
	
	function setHabilidade($habilidade){
		$this->habilidade = $habilidade;
	}
	
	function gerarHabilidadeMagica(){
		
		$habilidadeMagica = array("Apanhador de flexas","Esmagamento","Cegante","Fortificação leve","Deflexão de flexas","Animado","Resistência à magia (13)",
		"Resistência a ácido","Resistência ao frio","Resistência à eletricidade","Resistência ao fogo","Resistência sônica",
		"Toque espectral","Fortificação moderada","Resistência à magia (15)","Selvagem","Resistência a ácido aprimorada",
		"Resistência ao frio aprimorada","Resistência à eletricidade aprimorada","Resistência ao fogo aprimorada","Resistência sônica aprimorada",
		"Resistência à magia (17)","Controlar mortos-vivos","Fortificação pesada","Reflexão","Resistência à magia (19)","Resistência a ácido maior",
		"Resistência ao frio maior","Resistência à eletricidade maior","Resistência ao fogo maior","Resistência sônica maior",
		"Resistência à magia (21)","Escudo do Urso","Escudo do Touro","Escudo do Gato");
		
		$tamanho  = count($habilidadeMagica);
		$escolido = rand(0, $tamanho-1);
		$this->habilidade = $habilidadeMagica[$escolido];
		
		switch($habilidadeMagica[$escolido]){
		
		case "Apanhador de flexas":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 2700;
			break;
			
		case "Esmagamento":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 2000;
			break;
			
		case "Cegante":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 3750;
			break;
			
		case "Fortificação leve":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 3750;
			break;
			
		case "Deflexão de flexas":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 8000;
			break;
			
		case "Animado":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 15000;
			break;
			
		case "Resistência à magia (13)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 15000;
			break;
			
		case "Resistência a ácido":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência ao frio":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência à eletricidade":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência ao fogo":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência sônica":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Toque espectral":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
			
		case "Fortificação moderada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência à magia (15)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Selvagem":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência a ácido aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência ao frio aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
		
		case "Resistência à eletricidade aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência ao fogo aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência sônica aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência à magia (17)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 33750;
			break;
			
		case "Controlar mortos-vivos":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;

		case "Fortificação pesada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Reflexão":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência à magia (19)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência a ácido  maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência ao frio maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 32000;
			break;
			
		case "Resistência à eletricidade maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 49000;
			break;
			
		case "Resistência ao fogo maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 49000;
			break;
			
		case "Resistência sônica maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 50000;
			break;
			
		case "Resistência à magia (21)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 50000;
			break;
			
		case "Escudo do Urso":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 49000;
			break;
			
		case "Escudo do Touro":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 49000;
			break;
			
		case "Escudo do Gato":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 49000;
			break;
		}
	}
	
	function gerarPrecoTotal(){
		return ($this->precoBase + $this->getCusto());
	}

}
?>