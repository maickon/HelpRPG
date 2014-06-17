<?php
/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @version   1.2
 * @link      https://github.com/maickon/HelpRPG
 */
 
class Bazar{
	private $nd;
	private $apresentacao;
	private $bonus_magico;
	private $categoria_magica;
	private $categoria_arma;
	private $tipo;
	private $raridade;

	private $itens;
	
	
	function getNd(){
		return $this->nd;
	}
	
	function setNd($nd){
		$this->nd = $nd;
	}
	
	function getApresentacao(){
		return $this->apresentacao;
	}
	
	function setApresentacao($apresentacao){
		$this->apresentacao = $apresentacao;
	}
	
	function getBonus_magico(){
		return $this->bonus_magico;
	}
	
	function setBonus_magico($bonus_magico){
		$this->bonus_magico = $bonus_magico;
	}
	
	function getCategoria_magica(){
		return $this->categoria_magica;
	}
	
	function setCategoria_magica($categoria_magica){
		$this->categoria_magica = $categoria_magica;
	}
	
	function getCategoria_arma(){
		return $this->categoria_arma;
	}
	
	function setCategoria_arma($categoria_arma){
		$this->categoria_arma = $categoria_arma;
	}
	
	function getTipo(){
		return $this->tipo;
	}
	
	function setTipo($tipo){
		$this->tipo = $tipo;
	}
	
	function getRaridade(){
		return $this->raridade;
	}
	
	function setRaridade($raridade){
		$this->raridade = $raridade;
	}
	
	function apresentacao(){
		$saudacao = array(
		'Olá aventureiro, o que você deseja.',
		'Seja bem vindo a amigo.',
		'Posso ajuda-lo?',
		'O que queres nobre aventureiro?',
		'Seja bem vindo e fique a vontade.',
		);
		
		$escolido = rand(0,count($saudacao)-1);
		return $escolido;
	}
	
	function gerar_raridade(){	
		if($this->nd <= 8):
			$this->raridade = 'Menor';
			
		elseif($this->nd > 8  && $this->nd <= 16):
			$this->raridade = 'Médio';
		else:
			$this->raridade = 'Maior';
		endif;
	}
	
	function gerar_tipo(){
		$tipos = array('Armaduras','Escudos','Armas','Poçoes','Anéis','Bastões','Pergaminhos','Cajados','Varinhas','Itens maravilhosos');
		$this->tipo = rand(0,count($tipos)-1);
	}
	
	function armas(){
		
	}
	
}

?>