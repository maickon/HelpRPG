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

class aventuras extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'aventuras';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"titulo" 	=> NULL,
				"texto" 	=> NULL
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
	
	function retornar_aventura(){
		$this->extras_select = utf8_decode("WHERE RAND() LIMIT 3");
		return $this->seleciona_tudo($this); 
	}
}//fim classe aventuras

?>