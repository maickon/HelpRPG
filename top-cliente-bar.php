<?php
$sessao = new sessao();
	$meu_id = $sessao->getVar('id_user');
	$user = $sessao->getVar('nome_user');
	menu_bar('Painel Administrativo, seja bem vindo '.$user.'',
		array('Alterar senha','Excluir conta','Logof'),
	 	array('?m=usuario_cliente&t=senha&id='.$meu_id.'','?m=usuario_cliente&t=excluir&id='.$meu_id.'','index.php?logoff=true'),
		FALSE);

?>