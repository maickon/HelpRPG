<?php
/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @version   1.2
 * @link      https://github.com/maickon/HelpRPG
 */
class Armaduras {
	
	private $categoria = "Armaduras ";
	private $nome;
	private $tipo;
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
		$this->gerarTipoDeArmadura();
		$this->gerarNomeDaArmadura($this->tipo);
		$this->gerarArmadura($this->nome);
	}
	
	function getCategoria(){
		return $this->categoria;
	}
	
	function setCategoria($categoria){
		$this->categoria = $categoria;
	}
	
	function getTipo(){
		return $this->tipo;
	}
	
	function setTipo($tipo){
		$this->tipo = $tipo;
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
	
	function gerarTipoDeArmadura(){
		$categoria = Array ("Armaduras Leves","Armaduras Médias","Armaduras Pesadas");
		$tamanho  = count($categoria);
		$escolido = rand(0, $tamanho-1);
		$this->tipo = $categoria[$escolido];
		
		return $this->tipo;
	}
	
	function gerarNomeDaArmadura($tipo){
		$tamanho;
		$escolido;

		if($tipo == "Armaduras Leves"){
			$nome1 = Array ("Acolchoada","Corselete de Couro","Corselete de Couro batido","Camisão de Cota de Malha");
			$tamanho  = count($nome1);
			$escolido = rand(0, $tamanho-1);
			$this->nome = $nome1[$escolido];
		}else if($tipo == "Armaduras Médias"){
			$nome2 = Array ("Gibão de Peles","Brunea","Cota de Malha","Peitoral de Aço");
			$tamanho  = count($nome2);
			$escolido = rand(0, $tamanho-1);
			$this->nome = $nome2[$escolido];
		}else if($tipo == "Armaduras Pesadas"){
			$nome3 = Array("Cota de Talas","Loriga Segmentada","Meia Armadura","Armadura de Batalha");
			$tamanho  = count($nome3);
			$escolido = rand(0, $tamanho-1);
			$this->nome = $nome3[$escolido];
		}
		
		return $this->nome; 
	}
	
	
	
	function gerarArmadura($nome){
		switch($nome){
			
			case "Alcolchoada":
				$this->custo = 5;
				$this->bonusNaCa = "+1";
				$this->destrezaMaxima = "+8";
				$this->penalidadeNaPericia = "0";
				$this->falhaDeMagiaArcana = "5%";
				$this->deslocamentoMedio = "9 m";
				$this->deslocamentoPequeno = "6 m";
				$this->peso = "5 kg";
				$this->descricao = "\nEssa armadura é composta de várias capas acolchoadas, ".
						" feito de tecido reforçado. Ela é muito quente e costuma ficar impregnada de suor, ".
						" sujeira, piolhos e pulgas.";
				break;
				
			case "Corselete de Couro":
				$this->custo = 10;
				$this->bonusNaCa = "+2";
				$this->destrezaMaxima = "+6";
				$this->penalidadeNaPericia = "0";
				$this->falhaDeMagiaArcana = "10%";
				$this->deslocamentoMedio = "9 m";
				$this->deslocamentoPequeno = "6 m";
				$this->peso = "7.5 kg";
				$this->descricao = "\nO peitoral e os protetores de ombros dessa armadura são ".
						" feitos de couro enrijecido em óleo fervente. As demais partes são feitas de couro ".
						" flexível.";
				break;
				
			case "Corselete de Couro batido":
				$this->custo = 25;
				$this->bonusNaCa = "+3";
				$this->destrezaMaxima = "+5";
				$this->penalidadeNaPericia = "-1";
				$this->falhaDeMagiaArcana = "15%";
				$this->deslocamentoMedio = "9 m";
				$this->deslocamentoPequeno = "6 m";
				$this->peso = "10 kg";
				$this->descricao = "\nEssa armadura é fabricada com couro resistente, ".
						" mas flexível (diferente do couro enrijecido do corselete de couro comum), reforçado ".
						" com rebites de metal.";
				break;
				
			case "Camisão de Cota de Malha":
				$this->custo = 100;
				$this->bonusNaCa = "+4";
				$this->destrezaMaxima = "+4";
				$this->penalidadeNaPericia = "-2";
				$this->falhaDeMagiaArcana = "20%";
				$this->deslocamentoMedio = "9 m";
				$this->deslocamentoPequeno = "6 m";
				$this->peso = "12.5 kg";
				$this->descricao = "\n Um camisão de cota de malha protege o torso, ".
						" deixando os membros do personagem livres e com liberdade de movimento. Ela ".
						" inclui um gibão acolchoado que evita a fricção com a pele e amortece o impacto de ".
						" golpes. A armadura inclui um elmo de metal.";
				break;
				
			case "Gibão de Peles":
				$this->custo = 15;
				$this->bonusNaCa = "+3";
				$this->destrezaMaxima = "+4";
				$this->penalidadeNaPericia = "-3";
				$this->falhaDeMagiaArcana = "20%";
				$this->deslocamentoMedio = "6 m";
				$this->deslocamentoPequeno = "4,5 m";
				$this->peso = "12,5 kg";
				$this->descricao = "\nEssa armadura é fabricada com múltiplas camadas de couro ".
						" e peles de animais. Ela é rígida e atrapalha bastante os movimentos. É a armadura ".
						" preferida dos druidas que não usam armaduras metálicas.";
				break;
				
			case "Brunea":
				$this->custo = 50;
				$this->bonusNaCa = "+4";
				$this->destrezaMaxima = "+3";
				$this->penalidadeNaPericia = "-4";
				$this->falhaDeMagiaArcana = "25%";
				$this->deslocamentoMedio = "6 m";
				$this->deslocamentoPequeno = "4,5 m";
				$this->peso = "15 kg";
				$this->descricao = "\nEssa armadura e formada por um colete e protetores de perna (algumas ".
						" vezes inclui uma saia) de couro, coberta com plaquetas de metal sobrepostas, semelhantes ".
						" a escamas de um peixe. A armadura inclui um par de manoplas.";
				break;
				
			case "Cota de Malha":
				$this->custo = 150;
				$this->bonusNaCa = "+5";
				$this->destrezaMaxima = "+2";
				$this->penalidadeNaPericia = "-5";
				$this->falhaDeMagiaArcana = "30%";
				$this->deslocamentoMedio = "6 m";
				$this->deslocamentoPequeno = "4,5 m";
				$this->peso = "20 kg";
				$this->descricao = "\nEssa armadura é feita de pequenos anéis metálicos entrelaçados. ".
						" Ela inclui um gibão acolchoado que evita a fricção com a pele e amortece o impacto ".
						" de golpes. A maior parte do peso da armadura fica nos ombros, tomando-a uma ".
						" armadura incomoda de usar por um longo período de tempo. A armadura inclui ".
						" um par de manoplas.";
				break;
				
			case "Peitoral de Aço":
				$this->custo = 200;
				$this->bonusNaCa = "+5";
				$this->destrezaMaxima = "+3";
				$this->penalidadeNaPericia = "-4";
				$this->falhaDeMagiaArcana = "25%";
				$this->deslocamentoMedio = "6 m";
				$this->deslocamentoPequeno = "4,5 m";
				$this->peso = "15 kg";
				$this->descricao = "\nUm peitoral de aço recobre o tórax e as costas do personagem. ".
						" A armadura inclui um elmo e uma proteção de metal para as pernas. Uma camisa ou ".
						" camisão de couro é colocado sob o peitoral para proteger os membros sem restringir ".
						" demais os movimentos do personagem.";
				break;
				
			case "Cota de Talas":
				$this->custo = 20;
				$this->bonusNaCa = "+6";
				$this->destrezaMaxima = "+0";
				$this->penalidadeNaPericia = "-7";
				$this->falhaDeMagiaArcana = "40%";
				$this->deslocamentoMedio = "6 m²";
				$this->deslocamentoPequeno = "4,5² m";
				$this->peso = "22,5 kg";
				$this->descricao = "\nEssa armadura é composta de pequenas talas verticais de metal, ".
						" costuradas sobre couro e usada sobre um gibão acolchoado. Uma cota de malha ".
						" flexível protege as juntas. A armadura inclui um par de manoplas.";
				break;
				
			case "Loriga Segmentada":
				$this->custo = 250;
				$this->bonusNaCa = "+6";
				$this->destrezaMaxima = "+1";
				$this->penalidadeNaPericia = "-6";
				$this->falhaDeMagiaArcana = "35%";
				$this->deslocamentoMedio = "6 m²";
				$this->deslocamentoPequeno = "4,5² m";
				$this->peso = "17,5 kg";
				$this->descricao = "\nEssa armadura é composta de tiras verticais de metal sobrepostas, ".
						" costuradas sobre um forro de couro ou cota de malha. Essas tiras cobrem ".
						" as áreas vitais, enquanto a cota de malha e o couro protegem as juntas e permitem ".
						" o movimento. Correias e fivelas distribuem o peso uniformemente. A armadura ".
						" inclui um par de manoplas.";
				break;
				
			case "Meia Armadura":
				$this->custo = 600;
				$this->bonusNaCa = "+7";
				$this->destrezaMaxima = "+0";
				$this->penalidadeNaPericia = "-7";
				$this->falhaDeMagiaArcana = "40%";
				$this->deslocamentoMedio = "6 m²";
				$this->deslocamentoPequeno = "4,5² m";
				$this->peso = "25 kg";
				$this->descricao = "\nEssa armadura é uma combinação de cota de malha e placas ".
						" de metal (peitoral, ombreiras, protetores de antebraço, pernas e abdome) para as ".
						" áreas vitais. Correias e fivelas sustentam a armadura e distribuem o peso por todo o ".
						" corpo, mas a armadura estará menos fixa que a armadura completa. A meia-armadura ".
						" inclui um par de manoplas.";
				break;
				
			case "Armadura de Batalha":
				$this->custo = 1500;
				$this->bonusNaCa = "+8";
				$this->destrezaMaxima = "+1";
				$this->penalidadeNaPericia = "-6";
				$this->falhaDeMagiaArcana = "35%";
				$this->deslocamentoMedio = "6 m²";
				$this->deslocamentoPequeno = "4,5² m";
				$this->peso = "22,5 kg";
				$this->descricao = "\nEssa armadura consiste de placas forjadas e encaixadas ".
						" de modo a recobrir o corpo inteiro. A armadura inclui manoplas, botas pesadas de ".
						" couro, um elmo com visor e um gibão grosso e acolchoado (para ser usado debaixo ".
						" das placas). Correias e fivelas distribuem o peso por todo o corpo, portanto ela não ".
						" atrapalha o movimento como uma cota de talas, embora a cota seja mais leve. Cada ".
						" armadura deve ser ajustada para o seu usuário por um mestre armeiro, mas uma ".
						" armadura de batalha recuperada pode ser adaptada para um novo proprietário com ".
						" o custo de 200 a 800 (2d4 x 100) peças de ouro.";
				break;
		}
	}
	
	
	function tornarArmaduraObraPrima(){
		$nome = $this->nome;
		switch($nome){
			
		case "Alcolchoada":
			$this->custo = 155;
			break;
			
		case "Corselete de Couro":
			$this->custo = 160;
			break;
			
		case "Corselete de Couro batido":
			$this->custo = 175;
			$this->penalidadeNaPericia = "0";
			break;
			
		case "Camisão de Cota de Malha":
			$this->custo = 250;
			$this->penalidadeNaPericia = "-1";
			break;
			
		case "Gibão de Peles":
			$this->custo = 165;
			$this->penalidadeNaPericia = "-2";
			break;
			
		case "Brunea":
			$this->custo = 200;
			$this->penalidadeNaPericia = "-3";
			break;
			
		case "Cota de Malha":
			$this->custo = 300;
			$this->penalidadeNaPericia = "-4";
			break;
			
		case "Peitoral de Aço":
			$this->custo = 350;
			$this->penalidadeNaPericia = "-3";
			break;
			
		case "Cota de Talas":
			$this->custo = 350;
			$this->penalidadeNaPericia = "-6";
			break;
			
		case "Loriga Segmentada":
			$this->custo = 750;
			$this->penalidadeNaPericia = "-5";
			break;
			
		case "Meia Armadura":
			$this->custo = 1650;
			$this->penalidadeNaPericia = "-6";
			break;
			
		case "Armadura de Batalha":
			$this->custo = 1500;
			$this->penalidadeNaPericia = "-5";
			break;
			
		
		}
	}

}

class ArmadurasMagicas extends Armaduras{
	
	var $habilidade ;
	var $precoBase;

	function __construct(){
		parent::__construct();	
		$this->gerarTipoDeArmadura();
		$this->gerarNomeDaArmadura($this->getTipo());
		$this->gerarArmadura($this->getNome());
		$this->gerarHabilidadeMagica();
	}
	
	function getHabilidade(){
		return $this->habilidade;
	}
	
	function setHabilidade($habilidade){
		$this->habilidade = $habilidade;
	}
	
	function gerarHabilidadeMagica(){
		
		$habilidadeMagica = array(
		"Camuflagem","Fortificação leve","Escorregadia","Sombria","Silenciosa","Resistência à magia (13)","Escorregadia aprimorada",
		"Sombria aprimorada","Silenciosa aprimorada","Resistência a ácido","Resistência a frio","Resistência a eletricidade",
		"Resistência ao fogo","Resistência sônica","Toque espectral","Invulnerabilidade","Fortificação moderada","Resistência à magia (15)",
		"Selvagem","Escorregadia maior","Sombria maior","Silenciosa maior","Resistência a ácido aprimorada","Resistência ao frio aprimorada",
		"Resistência à eletricidade aprimorada","Resistência ao fogo aprimorada","Resistência sônica aprimorada","Resistência à magia (17)",
		"Forma etéria","Controlar mortos-vivos","Fortificação pesada","Resistência à magia (19)","Resistência a ácido  maior",
		"Resistência ao frio maior","Resistência à eletricidade maior","Resistência ao fogo maior","Resistência sônica maior",
		"Resistência à magia (21)","Armadura do Urso","Armadura do Touro","Armadura do Gato");
		
		$tamanho  = count($habilidadeMagica);
		$escolido = rand(0, $tamanho-1);
		
		switch($habilidadeMagica[$escolido]){
		
		case "Camuflagem":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 2700;
			break;
			
		case "Fortificação leve":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 2000;
			break;
			
		case "Escorregadia":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 3750;
			break;
			
		case "Sombria":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 3750;
			break;
			
		case "Silenciosa":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 8000;
			break;
			
		case "Resistência à magia (13)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 15000;
			break;
			
		case "Escorregadia aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 15000;
			break;
			
		case "Sombria aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 15000;
			break;
			
		case "Silenciosa aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência a ácido":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência a frio":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 18000;
			break;
			
		case "Resistência a eletricidade":
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
			
		case "Invulnerabilidade":
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
			
		case "Escorregadia maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 33750;
			break;
			
		case "Sombria maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 33750;
			break;
			
		case "Silenciosa maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 33750;
			break;
			
		case "Resistência a ácido aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência ao frio aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
		
		case "Resistência à eletricidade aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência ao fogo aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência sônica aprimorada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 42000;
			break;
			
		case "Resistência à magia (17)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 32000;
			break;
			
		case "Forma etéria":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 49000;
			break;
			
		case "Controlar mortos-vivos":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 49000;
			break;

		case "Fortificação pesada":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 50000;
			break;
			
		case "Resistência à magia (19)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 50000;
			break;
			
		case "Resistência a ácido  maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência ao frio maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência à eletricidade maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência ao fogo maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência sônica maior":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Resistência à magia (21)":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Armadura do Urso":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Armadura do Touro":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
			
		case "Armadura do Gato":
			$this->habilidade = $habilidadeMagica[$escolido];
			$this->precoBase = 66000;
			break;
		}
	}
	
	function gerarPrecoTotal(){
		return ($this->precoBase + $this->getCusto());
	}

}

?>