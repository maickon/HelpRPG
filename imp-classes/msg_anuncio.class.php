<?php
require_once(dirname(__FILE__)."/autoload.class.php");
protegeArquivo(basename(__FILE__));

class msg_anuncio extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'msg_anuncio';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"nome" 				=> NULL,
				"texto" 			=> NULL,
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
		
}//fim classe home

?>