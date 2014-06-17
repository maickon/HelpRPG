<?php
require_once(dirname(__FILE__)."/autoload.class.php");
protegeArquivo(basename(__FILE__));

class blog_page extends base {
	public function __construct($campos = array()){
		parent::__construct();
		$this->tabela = 'blog';
		if(sizeof($campos) <= 0):
			$this->campos_valores = array(
				"titulo" 			=> NULL,
				"categoria" 		=> NULL,
				"data" 				=> NULL,
				"usuario" 			=> NULL,
				"texto" 			=> NULL
			);
		else:
			$this->campos_valores = $campos;	
		endif;
		$this->campo_pk = "id";
	}//construct
		
	function exibir_blog($categoria=''){
		if($categoria != ''):
			$this->extras_select = "WHERE categoria='$categoria' ORDER BY id DESC LIMIT 3";
		else:
			$this->extras_select = "ORDER BY id DESC LIMIT 3";
		endif;
		return $this->seleciona_tudo($this);	
	}	
	
	function exibir_post($id=''){
		if($id != ''):
			$this->extras_select = "WHERE id='$id' ";
		else:
			$this->extras_select = "ORDER BY id DESC LIMIT 3";
		endif;
		return $this->seleciona_tudo($this);	
	}	
	
	function listar_categorias(){
		$sql = "SELECT DISTINCT categoria FROM blog";
		return $this->executaSQL($sql); 
	}
}//fim classe home

?>