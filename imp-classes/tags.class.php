<?php
class tags{
	private $sinal_maior;
	private $sinal_menor;
	private $barra;
	
	function __construct(){
		$this->sinal_maior = ">";
		$this->sinal_menor = "<";
		$this->barra = "/";
	}
	
	function elemento($tag,$propiedades='',$barra=''){
		$this->barra = $barra;
		echo "$this->sinal_menor$tag $propiedades$this->barra$this->sinal_maior";
	}
	
	function close($tag){
		$this->barra = '/';
		echo "$this->sinal_menor$this->barra$tag$this->sinal_maior";
	}
	
	
	function loadCss($arquivo=null, $media='screen', $import=false){
	if($arquivo != null):
		if($import == true):
			echo '<style type="text/css">@import url("'.BASEURL.CSSPATH.$arquivo.'.css");</style>';
		else:
			echo '<link rel="stylesheet" type="text/css" href="'.BASEURL.CSSPATH.$arquivo.'.css" media="'.$media.'" />';
		endif;
	endif;
	}
	
	function loadJs($arquivo=null, $remoto=false){
		if($arquivo != null):
			if($remoto == false) $arquivo = JSPATH.$arquivo.'.js';
				echo '<script type="text/javascript" src="'.$arquivo.'"></script>';		
		endif;
	}
	
	function loadCkEditor($arquivo=null, $remoto=false){
		if($arquivo != null):
			if($remoto == false) $arquivo = $arquivo.'.js';
				echo '<script type="text/javascript" src="'.$arquivo.'"></script>';		
		endif;
	}

}
?>