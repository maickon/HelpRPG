<?php
require(CLASSESPATH.'arquivos.class.php');
$arquivo = new Arquivo(BASEPATH.'prestigio/monge_espiritual.txt');

$tag->div('row');
	$tag->div('small-2 large-12 columns','','center');	
		$tag->h3();
			echo utf8_decode('Artefatos');
		$tag->Ch3();
	$tag->Cdiv();
	
	$tag->div('small-2 large-12 columns','','center');
		$tag->form('index.php?p=prestigio','POST','custom');
			$tag->text_area('','text-area-prestigio ckeditor','','','editor1');
				$arquivo->ler_linha();
			$tag->Ctext_area();
			$tag->submit('botao','submit','Enviar Ficha','small button');
		$tag->Cform();	
	
		if(isset($_POST['botao']) && $_POST['botao'] == 'Enviar Ficha'):
			$arquivo->abrir();	
			$arquivo->escrever($_POST['editor1']);
			$arquivo->close_file();
		endif;	
		//
	$tag->Cdiv();
$tag->Cdiv();		
?>