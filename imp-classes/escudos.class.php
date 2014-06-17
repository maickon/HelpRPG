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

class escudos extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'escudos';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"nome" 					=> NULL,
				"dominio" 				=> NULL,
				"categoria" 			=> NULL,
				"custo" 				=> NULL,
				"bonusNaCa" 			=> NULL,
				"destrezaMaxima" 		=> NULL,
				"penalidadeNaPericia" 	=> NULL,
				"falhaDeMagiaArcana" 	=> NULL,
				"deslocamentoMedio" 	=> NULL,
				"deslocamentoPequeno" 	=> NULL,
				"peso" 					=> NULL,
				"descricao" 			=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
	
	function exibir_escudos($tipo){
		switch($tipo):
			case 'comum':
				$this->extras_select = utf8_decode("WHERE categoria = 'não' ORDER BY rand() limit 0,3");
			break;
			
			case 'magicas':
				$this->extras_select = utf8_decode("WHERE categoria = 'sim' ORDER BY rand() limit 0,3");
			break;
		endswitch;
		return $this->seleciona_tudo($this);
	}				
}//fim classe home
?>