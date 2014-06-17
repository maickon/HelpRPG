<?php

class Dados{
	private $d2;
	private $d4;
	private $d6;
	private $d8;
	private $d10;
	private $d12;
	private $d20;
	private $d100;
	

	function d2(){
		print rand(1,2);
	}
	
	function d4(){
		return rand(1,4);
	}
	
	function d6(){
		return rand(1,6);
	}
	
	function d8(){
		return rand(1,8);
	}
	
	function d10(){
		return rand(1,10);
	}
	
	function d12(){
		return rand(1,12);
	}
	
	function d20(){
		return rand(1,20);
	}
}

?>