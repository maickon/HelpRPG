<?php
/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @version   1.2
 * @link      https://github.com/maickon/HelpRPG
 */
protegeArquivo(basename(__FILE__));

class artefatos extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'artefatos';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"nome" 				=> NULL,
				"dominio" 			=> NULL,
				"descricao_hist" 	=> NULL,
				"descricao_regra" 	=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct

	function gerar_artefatos(){
		$this->extras_select = " WHERE RAND() LIMIT 1,3";
		$this->seleciona_tudo($this);
	}
		
}//fim classe home

?>