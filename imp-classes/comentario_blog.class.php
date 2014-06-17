<?php
require_once(dirname(__FILE__)."/autoload.class.php");
protegeArquivo(basename(__FILE__));

class comentario_blog extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'comentario_blog';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"data" 				=> NULL,
				"blog_id" 			=> NULL,
				"usuario" 			=> NULL,
				"texto" 			=> NULL
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct

	
	function listar_comentarios($id){
		$this->extras_select = "WHERE blog_id = '$id'";
		return $this->seleciona_tudo($this); 
	}	
}//fim classe home

?>