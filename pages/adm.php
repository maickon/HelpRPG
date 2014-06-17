<?php
auto_classes(array('sessao.class','usuario.class','usuarioAdmin.class','TagElement.class'),IMPCLASSESPATH);
verificar_login();

if(isset($_POST['logar'])):
	$usuario = new Usuario($_POST['usuario'],$_POST['senha']);
	if($usuario->logar($usuario)):
		redireciona('index.php?p=painel');
		echo 'aa';
	else:
		redireciona('index.php?erro=1');
		echo 'bb';
	endif;	
endif;

$tag->div('row');
	$tag->div('small-2 large-8 columns centered push-2','','center');	
		$tag->fieldset();
			$tag->legend();
				echo 'Seja Bem vindo Aventureiro';
			$tag->Clegend();
			$tag->div('small-2 large-5 columns');
				$tag->br();
				$tag->form('','post');
					$tag->label();
						echo utf8_decode('Usuário');
					$tag->Clabel();
					$tag->input('nome','','','usuario','text','',$_POST['usuario']='');
			$tag->Cdiv();
			
			$tag->div('small-2 large-5 columns');		
				$tag->br();
					$tag->label();
						echo utf8_decode('Senha');
					$tag->Clabel();
					$tag->input('senha','','','senha','password','',$_POST['senha']='');
			$tag->Cdiv();
			
			$tag->div('small-2 large-2 columns');		
				$tag->br();
				$tag->br();
					$tag->input('','','','logar','submit','','Logar','','','','small button black');
				$tag->Cform();
			$tag->Cdiv();
			
			$tag->div('small-2 large-12 columns');
				if(isset($_GET['erro'])) alert_box('Usuário ou senha incorreos, contate o administrador!');
			$tag->Cdiv();
		$tag->Cfieldset();
	$tag->Cdiv();
$tag->Cdiv();	
$pics = slect_list();
$tag->div('row');
	$tag->div('small-6 large-8 columns centered push-2','','center');
		$tag->div('','featured','','orbit');
			for($i=0; $i <= count($pics); $i++):
				if(isset($pics[$i])):
					$tag->img(BASEURL.'img/slide/'.$pics[$i].'','','','img_slide');
				 endif;    
			endfor;
		$tag->Cdiv();	  
 	$tag->Cdiv();
$tag->Cdiv();	
?>