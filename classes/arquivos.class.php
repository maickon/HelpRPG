<?php

/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @version   1.2
 * @link      https://github.com/maickon/HelpRPG
 */
 
class Arquivo{
	public $arquivo;
	public $handle;
	public $texto;
	public $erro = Array();
	
	function __construct($nome){
		$this->arquivo = $nome;
	}
	function abrir(){
		if(!$this->handle = fopen($this->arquivo, "w")):
			$this->erro = "Erro abrindo o arquivo ($this->arquivo)";
		endif;	
	}
	function escrever($texto){
		$this->texto = $texto;
		if(!fwrite($this->handle, $this->texto)):
			$this->erro = "Erro escrevendo no arquivo ($this->arquivo)";
		endif;
	}
	
	function close_file(){
		return fclose($this->handle);
	}
	
	function ler_linha($numero = null){
		$count = 0;
		$this->handle = fopen($this->arquivo, "r");
		if($numero == null):
			while(!feof($this->handle)):
				$bufer = fgets($this->handle,4096);
				echo $bufer;
			endwhile;
			$this->close_file();
		else:
			while(!feof($this->handle)):
				$count++;
				$bufer = fgets($this->handle,4096);
				if($count == $numero):
					return  $bufer;
				endif;	
			endwhile;
			$this->close_file();
		endif;		
	}

	function ler_texto($numero = NULL){
		$count = 0;
		$bufer = '';
		$this->handle = fopen($this->arquivo, "r");
		if($numero != null):
			while(!feof($this->handle)):
				$count++;
				$bufer = $bufer.'<br />'.fgets($this->handle,4096);
				if($numero == $count):
					return $bufer;
					exit;
				endif;	
			endwhile;
			$this->close_file();
		else:
			return false;	
		endif;	
	}
}