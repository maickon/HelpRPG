<?php
$sessao = new sessao();
	$meu_id = $sessao->getVar('id_user');
	menu_bar('Painel Administrativo',
		 array(
		 	array('Usuários','Cadastrar','Exibir'),
			array('Páginas','Home Page','Sobre','Histórias','Blog','Comentários blog','Anuncios'),
			array('Armas','Nova Arma','Exibir Armas'),
			array('Armaduras','Nova Armadura','Exibir Armaduras'),
			array('Escudos','Novo Escudo','Exibir Escudos'),
			array('Artefatos','Novo Artefato','Exibir Artefatos'),
			array('Histórias','Nova História','Exibir Histórias'),
			array('Aventuras','Nova Aventura','Exibir Aventuras'),
			array('Sair','Alterar Senha','Sair')
		 ),
		 array(
		 	array('#','?m=usuario&t=incluir','?m=usuario&t=listar'),
		 	array('#','?m=home_page&t=listar','?m=sobre_page&t=listar','?m=hist_page&t=listar','?m=blog_page&t=listar','?m=comentario_blog&t=listar','?m=msg_anuncio&t=listar'),
			array('#','?m=armas&t=incluir','?m=armas&t=listar'),
			array('#','?m=armaduras&t=incluir','?m=armaduras&t=listar'),
			array('#','?m=escudos&t=incluir','?m=escudos&t=listar'),
			array('#','?m=artefatos&t=incluir','?m=artefatos&t=listar'),
			array('#','?m=hist_npc&t=incluir','?m=hist_npc&t=listar'),
			array('#','?m=aventuras&t=incluir','?m=aventuras&t=listar'),
			array('#','?m=usuario&t=senha&id='.$meu_id.'','index.php?logoff=true')
			)
			);

?>