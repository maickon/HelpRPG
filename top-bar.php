<?php
$sessao = new sessao();
$user = $sessao->getVar('nome_user');
if($user):
	$link = 'Olá '.$user.', deseja sair?';
else:
	$link = 'HelpRpg.com';
endif;
menu_bar(utf8_decode($link),
	 array('Nosso Blog','Fichas','Histórias','Aventuras','Artefatos','Armas','Armaduras','Escudos','Monstros','Sobre','Cadastrar-se','Login'),
	 array('?p=blog','?p=fichas','?p=historias','?p=aventuras','?p=artefatos','?p=armas','?p=armaduras','?p=escudos','?p=monstros','?p=sobre','?p=adm_cliente','?p=cliente'),
	 FALSE);
?>