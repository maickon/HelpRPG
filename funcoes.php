<?php
inicializa();
function inicializa(){
	$init = 1;
	if(file_exists(dirname(__FILE__).'/config.php')):
		require_once(dirname(__FILE__).'/config.php');
	else:
		$init = 0;
		$tag->elemento('div','class="alert-box alert"');
			die(utf8_decode('O Arquivode configuração não foi inicializado, contate o adminstrador.'));
		$tag->close('div');
	endif;
	
	if(!defined('BASEPATH') || !defined('BASEURL')):
		$init = 0;
		$tag->elemento('div','class="alert-box alert"');
			die(utf8_decode('Faltam configurações básicas do sistema, contate o adminstrador.'));
		$tag->close('div');
	endif;
	
	if($init == 1):
		$imp_classes = array('sessao.class','usuario.class','usuarioAdmin.class','tag_element.class','tags.class','armas.class','artefatos.class',
		'armaduras.class','comentario_blog.class','historias.class','escudos.class');
		$classes = array('ideias.class','monstros.class','nomes','personagem.class','artefatos_montado.class');
		_autoload($imp_classes,IMPCLASSESPATH);
		_autoload($classes,CLASSESPATH);
		_autoload(array('constantes'),MODULOSPATH);
	endif;
	
	if(isset($_GET['logoff']) == TRUE):
		$user = new usuarioAventureiro();
		$user->logoff();
		exit;
	endif;	
	//require_once(BASEPATH.CLASSPATH.'autoload.php');
}
function _autoload($list_file, $dir=''){
	(!empty($dir)) 		 ? $dir_ = $dir : $dir_='';
	for($c=0; $c<count($list_file); $c++):
		require_once(dirname(__FILE__).'/'.$dir_.$list_file[$c].'.php');
	endfor;
}
function verificaLogin(){
	$sessao = new Sessao();
	if($sessao->getNvars() <= 0 || $sessao->getVar('logado') != TRUE || $sessao->getVar('ip') != $_SERVER['REMOTE_ADDR']):
		redireciona('index.php?p=adm&erro=3');
	endif;
}
function printMsg($msg = NULL, $tipo = NULL){
	$tag = new tags();
	if($msg != NULL):
		switch($tipo):
			case 'erro':
				$tag->elemento('div','class="erro"');
						echo $msg;
				$tag->close('div');
				break;
			case 'alerta':
				$tag->elemento('div','class="alerta"');
						echo $msg;
				$tag->close('div');
				break;
			case 'pergunta':
				$tag->elemento('div','class="pergunta"');
						echo $msg;
				$tag->close('div');
				break;
			case 'secesso':
				$tag->elemento('div','class="sucesso"');
						echo $msg;
				$tag->close('div');
				break;
			default:
				$tag->elemento('div','class="sucesso"');
						echo $msg;
				$tag->close('div');
				break;
		endswitch;
	endif;
}

function isAdmin(){
	verificaLogin();
	$sessao = new Sessao();
	$userAdmin = new usuarioAdmin(array(
		'tipo' => NULL,
	));
	$id_user = $sessao->getVar('id_user');
	$userAdmin->extras_select = " WHERE id=$id_user";
	$userAdmin->seleciona_campos($userAdmin);
	$resp = $userAdmin->retorna_dados();
	if($resp = $resp->tipo == 'administrador'):
		return TRUE;
	else:
		return FALSE;
	endif;
}
function protegeArquivo($nome_arquivo, $redir_para='index.php?p=adm&erro=3'){
	$url = $_SERVER["PHP_SELF"];
	if(preg_match("/$nome_arquivo/i", $url)):
		//redireciona para outra URL
		redireciona($redir_para);
	endif;
}//fim protegeArquivo

function antiInject($string){
	$string = preg_replace("/(from|select|insert|delet|where|drop table|show table|#|\*|--|\\\\)/i","",$string);
	$string = trim($string);//limpa espaços vazios
	$string = strip_tags($string);//tiras tags php e html
	if(!get_magic_quotes_gpc())
		$string = addslashes($string);//adiciona barras invertidas a uma string	
	return $string;
}

function codificarSenha($senha){
	return md5($senha);
}

function load_modulo($modulo=null,$tela=null){
	$tag = new tags();
	if($modulo == null || $tela ==  null):
		$tag->elemento('div','class="alert-box alert"');
			die(utf8_decode('Erro na função <strong>'.__FUNCTION__.'</strong>: Faltam parâmetros para execução.'));
		$tag->close('div');
	else:
		if(file_exists(MODULOSPATH."$modulo".".php")):
			include_once(MODULOSPATH."$modulo".".php");
		else:
			$tag->elemento('div','class="alert-box alert"');
				die(utf8_decode('Módulo inexistente neste sistema'));
			$tag->close('div');
		endif;
	endif;
}

function load_page($page=null,$tela=null){
	$tag = new tags();
	if($page == null || $tela ==  null):
		$tag->elemento('div','class="alert-box alert"');
			die(utf8_decode('Erro na função <strong>'.__FUNCTION__.'</strong>: Faltam parâmetros para execução.'));
		$tag->close('div');
	else:
		if(file_exists(PAGEPATH."$page".".php")):
			include_once(PAGEPATH."$page".".php");
		else:
			$tag->elemento('div','class="alert-box alert"');
				die(utf8_decode('Módulo inexistente neste sistema'));
			$tag->close('div');
		endif;
	endif;
}

function protege_arquivo($nome_arquivo, $redir_para='index.php?erro=3'){
	$url = $_SERVER['PHP_SELF'];
	if(preg_match("/$nome_arquivo/",$url)):
		redir_para($redir_para);
	endif;
}

function redir_para($url=''){
	header('Location: '.BASEURL.$url);
}

function rand_logo_bar(){
	$pics = array ("logo1","logo2","logo3","logo4","logo5","logo6","logo7","logo8","logo9","logo10"
				   ,"logo11","logo12","logo13","logo14","logo15","logo16","logo17","logo18","logo19","logo20");
	$escolido = rand(0, count($pics)-1);
	return $pics[$escolido];
}

function slect_list(){		
	
	$escolido = rand(1,9);
		switch($escolido):
			case 1:
			$lista = Array('01.jpg','02.jpg','03.jpg','04.jpg','05.jpg','06.jpg',
						   '07.jpg','08.jpg','09.jpg','10.jpg','11.jpg','12.jpg');
			break;
			case 2:			   
			$lista = Array('17.jpg','18.jpg','19.jpg','20.jpg','21.jpg','22.jpg',
						   '23.jpg','24.jpg','25.jpg','26.jpg','27.jpg','28.jpg');
			break;
			case 3:			   
			$lista = Array('33.jpg','34.jpg','35.jpg','36.jpg','37.jpg','38.jpg',
						   '39.jpg','40.jpg','41.jpg','42.jpg','43.jpg','44.jpg');
			break;
			case 4:			   
			$lista = Array('49.jpg','50.jpg','51.jpg','52.jpg','53.jpg','54.jpg',
						   '55.jpg','56.jpg','57.jpg','33.jpg','34.jpg','01.jpg');
			break;
			case 5:			   
			$lista = Array('51.jpg','52.jpg','03.jpg','35.jpg','36.jpg','06.jpg',
						   '07.jpg','47.jpg','48.jpg','10.jpg','50.jpg','51.jpg');
			break;
			case 6:			   
			$lista = Array('47.jpg','48.jpg','03.jpg','04.jpg','05.jpg','06.jpg',
						   '07.jpg','08.jpg','46.jpg','47.jpg','11.jpg','12.jpg');
			break;
			case 7:
			$lista = Array('13.jpg','14.jpg','15.jpg','16.jpg','02.jpg','29.jpg',
							'51.jpg','52.jpg','13.jpg','14.jpg','15.jpg','16.jpg');
			break;
			case 8:				
			$lista = Array('45.jpg','46.jpg','47.jpg','48.jpg','02.jpg','29.jpg',
							'51.jpg','52.jpg','13.jpg','14.jpg','15.jpg','16.jpg');
			break;
			case 9:				
			$lista = Array('30.jpg','22.jpg','13.jpg','14.jpg','15.jpg','16.jpg',
							'29.jpg','30.jpg','31.jpg','32.jpg','51.jpg','52.jpg');
			break;
		endswitch;			
		
	return $lista;	
		
}

function corrigirModificadorMagico($objeto){
	if($objeto->getBonusMagico() == '0'):
		return ' +1';
	else:	
		return ' +'.$objeto->getBonusMagico();
	endif;
}

function corrigirHabilidadeMagica($objeto){
	if($objeto->getHabilidadeMagica1() == 'Sem habilidade' && 
	   $objeto->getHabilidadeMagica2() == 'Sem habilidade' && 
	   $objeto->getHabilidadeMagica3() == 'Sem habilidade' && 
	   $objeto->getHabilidadeMagica4() == 'Sem habilidade'):
		return 'Sem habilidade';
	else:
		echo utf8_decode($objeto->getHabilidadeMagica1().' '.$objeto->getHabilidadeMagica2().' '.$objeto->getHabilidadeMagica3().' '.$objeto->getHabilidadeMagica4());
	endif;
}

function gerar_personagem_montado($nivel='', $racas='', $classes='', $tipo='', $sexo='', $nome='', $player_nome='', $cabelos='', $olhos='', $pele='',
								  $tendencia='', $altura='', $peso='', $idade='', $divindade='', $religiao='', $local='', $equipamentos='', $itens='',
								  $armas='', $armaduras='', $historias='', $atributos=false, $for='', $des='', $con='', $int='', $sab='', $car=''){
	$personagem = new Personagem();
	$personagem->construtor_montado($nivel,$racas, $classes, $tipo, $sexo, $nome, $player_nome, $cabelos, $olhos, $pele,
								    $tendencia, $altura, $peso, $idade, $divindade, $religiao, $local, $equipamentos, $itens,
								    $armas, $armaduras, $historias, $atributos,$for, $des, $con, $int, $sab, $car);
	
	return $personagem;
}

function gerar_monstro_montado($nivel='', $subtipo='', $tipo='', $tamanho=''){
	$monstro = new Monstros();
	$monstro->construtor_montado($nivel, $subtipo, $tipo, $tamanho);
	return $monstro;
}

function validacao_de_hablidades($for,$con,$des,$int,$sab,$car){
	if($for == '' || $con == '' || $des == '' || $int == '' || $sab == '' || $car == ''):
		header('Location:index.php?p=montar_ficha&alert=true');
	endif;
}

function alert_box($msg='Preencha todos os atributos!'){
	$tag = new tags();
	$tag->elemento('div','class="alert-box alert"');
		echo utf8_decode($msg);
	$tag->close('div');
}

function verificar_login(){
	$sessao = new Sessao();
	if($sessao->getNvars()<=0 || $sessao->getVar('logado') != true):
		redireciona('index.php?erro=true');
	else:
		return true;	
	endif;
}

function redireciona($url=''){
	header("Location:".$url);
}

function link_sair(){
	$sessao = new Sessao();
	$tag = new tags();
	if($sessao->getNvars()>0 || $sessao->getVar('logado') == true):
		$tag->elemento('ul','class="right"');
			$tag->elemento('li','class="divider"');
			$tag->close('li');
			$tag->elemento('li');
				$tag->elemento('a','href="index.php?logoff=true"');
					echo utf8_decode('Sair');
				$tag->close('a');
			$tag->close('li');
		$tag->close('ul');
	endif;
}

function rotear_pagina($page){
	switch($page):
		case 'fichas': load_page('fichas','index');
		break;
		
		case 'post': load_page('post','index');
		break;
		
		case 'blog': load_page('helprpg_blog','index');
		break;
		
		case 'monstros': load_page('monstros','index');
		break;
		
		case 'adm': load_modulo('usuario','login');
		break;
		
		case 'cliente': load_modulo('usuario_cliente','login');
		break;
		
		case 'adm_cliente': load_modulo('usuario_cliente','incluir');
		break;
		
		case 'montar_ficha': load_page('montar_ficha','index');
		break;
		
		case 'historias': load_page('historiaNpc','index');
		break;
		
		case 'historias_play': load_page('historias_play','index');
		break;
		
		case 'aventuras': load_page('aventuras','index');
		break;
		
		case 'armas': load_page('armas','index');
		break;
		
		case 'armaduras': load_page('armaduras','index');
		break;
		
		case 'armaduras_magicas': load_page('armaduras_magicas','index');
		break;
		
		case 'artefatos': load_page('artefatos','index');
		break;
		
		case 'escudos': load_page('escudos','index');
		break;
		
		case 'escudos_magicos': load_page('escudos_magicos','index');
		break;
		
		case 'sobre': load_page('sobre','index');
		break;
		
		default: load_page('principal','index');		
	endswitch;
}

function footer_bar($menus,$links){
	$tag = new tags();
	$tag->elemento('div','class="black" align="center"');
		$tag->elemento('div','class="row"');			
				$tag->elemento('div','class="small-2 large-12 columns align="center"');
					
					$tag->elemento('br');
					$tag->elemento('br');
					for($m=0; $m<count($menus); $m++):
						echo ' - ';
						$tag->elemento('a','href="'.BASEURL.'index.php?p='.$links[$m].'"');
							echo utf8_decode($menus[$m]);
						$tag->close('a');	
						
						if($m == count($menus)-1):
							echo ' - ';
							$tag->elemento('br');
							$tag->elemento('br');
							
							$tag->elemento('a','href="https://www.facebook.com/maickon.rangel"');
								echo 'Desenvolvivo por Maickon Rangel &copy; 2013';	
							$tag->close('a');
							
							$tag->elemento('br');
							$tag->elemento('br');
							$tag->elemento('br');
							$tag->elemento('br');
						endif;	
					endfor;
			$tag->close('div');
		$tag->close('div');
	$tag->close('div');
}

function link_menu_bar(){
	$menus = array('Home Page','Blog','Sobre','Histórias','Armas','Armaduras','Escudos','Artefatos');
	$links = array('?m=home_page&t=listar','?m=blog_page&t=listar','?m=sobre_page&t=listar','?m=hist_page&t=listar','?m=armas&t=listar','?m=armaduras&t=listar','?m=escudos&t=listar','?m=artefatos&t=listar');
	$tag = new tags();
	$tag->elemento('div');
		$tag->elemento('div','class="row"');			
				$tag->elemento('div','class="small-2 large-12 columns align="center"');
					$tag->elemento('p','class="link_menu_bar" ');
						for($m=0; $m<count($menus); $m++):
							$tag->elemento('a','href="'.$links[$m].'" class="link"');
								echo ' &bull; '.utf8_decode($menus[$m]);
							$tag->close('a');	
						endfor;
					$tag->close('p');
			$tag->close('div');
		$tag->close('div');
	$tag->close('div');
}
function logo_bar($img){
	$tag = new tags();
	$tag->elemento('div','class="'.rand_logo_bar().'"');
		$tag->elemento('div','class="row"');
			$tag->elemento('div','class="small-2 large-12 columns"');
				$tag->elemento('div','class="small-2 large-12 columns"');
					$tag->elemento('a','href="index.php"');
						$tag->elemento('img','src="'.$img.'"');
					$tag->close('a');	
				$tag->close('div');		
			$tag->close('div');
		$tag->close('div');			
	$tag->close('div');
}

function menu_bar($site_nome,$menus,$links,$dropdown = 1){
	$tag = new tags();
	$sessao = new sessao();
	$tag->elemento('nav','class="top-bar"');
		$tag->elemento('ul','class="title-area"');
			$tag->elemento('li','class="divider"');
			$tag->close('li');
			$tag->elemento('li','class="name"');
				$tag->elemento('h1');				
					$user = $sessao->getVar('nome_user');
					isset($user)?$logoff='?logoff=true':$logoff='';
					$tag->elemento('a','href="index.php'.$logoff.'"');
						echo $site_nome;
					$tag->close('a');
				$tag->close('h1');
			$tag->close('li');			
		$tag->close('ul');
		
		$tag->elemento('section','class="top-bar-section"');
			$tag->elemento('ul','align="left"');
					for($m=0; $m<count($menus); $m++):
					$tag->elemento('li','class="divider"');
					$tag->close('li');	
					if($dropdown == 1)://identifica se é um drop down
						$tag->elemento('li','class="has-dropdown"');
							$tag->elemento('a','href="index.php?p='.$links[$m][0].'"');
								echo utf8_decode($menus[$m][0]);
							$tag->close('a');
								$tag->elemento('ul','class="dropdown"');
									for($d=1; $d<count($menus[$m]); $d++):
										$tag->elemento('li','class="divider"');
										$tag->close('li');
										$tag->elemento('li');																	
											$tag->elemento('a','href="'.$links[$m][$d].'"');
												echo utf8_decode($menus[$m][$d]);
											$tag->close('a');																				
										$tag->close('li');
									endfor;
								$tag->close('ul');
						$tag->close('li');
					else:
						for($m=0; $m<count($menus); $m++):
							$tag->elemento('li','class="divider"');
							$tag->close('li');
							$tag->elemento('li');
								$tag->elemento('a','href="'.$links[$m].'"');
									echo utf8_decode($menus[$m]);
								$tag->close('a');
							$tag->close('li');				
						endfor;						
					endif;				
				endfor;
				$tag->elemento('li','class="divider"');
				$tag->close('li');
			$tag->close('ul');					
		$tag->close('section');
	$tag->close('nav');
}

function exibir_pagina_escolida($objeto,$classe,$nome){
		$objeto = new $classe();
		$objeto->extras_select = "WHERE nome='$nome'";
		$objeto->seleciona_tudo($objeto);
		while($objeto_resp = $objeto->retorna_dados()):
				echo utf8_decode($objeto_resp->texto); 
		endwhile;
}

function exibir_pagina($objeto,$classe){
		$objeto = new $classe();
		$objeto->seleciona_tudo($objeto);
		while($objeto_resp = $objeto->retorna_dados()):
				echo utf8_decode($objeto_resp->texto); 
		endwhile;
}

function exibir_historia($objeto,$classe,$id){
		$objeto = new $classe();
		$objeto->extras_select = "WHERE id=$id";
		$objeto->seleciona_tudo($objeto);
		while($objeto_resp = $objeto->retorna_dados()):
				echo utf8_decode($objeto_resp->texto); 
		endwhile;
}


function ordenar_itens_de_pagina($objeto,$classe){
	$tag = new tags();
	$objeto = new $classe();
	$objeto->seleciona_tudo($objeto);
	
	$tag->elemento('ul');
	while($objeto_resp = $objeto->retorna_dados()):
		$tag->elemento('li');
			$tag->elemento('a','href="?p=historias_play&id='.$objeto_resp->id.'" class="link"');
				echo ($objeto_resp->titulo);
			$tag->close('a');
		$tag->close('li');
	endwhile;
	$tag->close('ul'); 	
}

function voltar(){
	$tag = new tags();
	if($_GET['id']==1):
		$id = '';
	else:
		$id = $_GET['id']-1;
	endif;
	$tag->elemento('div','class="small-2 large-12 columns"');
		$tag->elemento('div','class="row"');
			$tag->elemento('a','href="?p=historias_play&id='.$id.'" class="link"');
				echo ('&bull;Voltar um item ');
			$tag->close('a');
			
			$tag->elemento('a','href="?p=historias_play" class="link"');
				echo ('&bull;Voltar ao indice');
			$tag->close('a');
		$tag->close('div');
	$tag->close('div');
}

function limpar_campo_excluir($propriedade,$objeto){
	if($objeto):
		$campo=$objeto->$propriedade;
		return $campo;
	else:
		$campo='';
		return $campo;
	endif;	
}

function tratar_bonus_magicos($objeto){
	if($objeto->getBonusMagico() <= 0):
		return '';
	else:
		return ' +'.$objeto->getBonusMagico();
	endif;
}

function tratar_habilidade_magica1($objeto){
	if($objeto->getHabilidadeMagica1() == 'Sem habilidade'):
		return '';
	else:
		return $objeto->getHabilidadeMagica1();
	endif;	
}
function tratar_habilidade_magica2($objeto){
	if($objeto->getHabilidadeMagica2() == 'Sem habilidade'):
		return '';
	else:
		return $objeto->getHabilidadeMagica2();
	endif;	
}
function tratar_habilidade_magica3($objeto){
	if($objeto->getHabilidadeMagica3() == 'Sem habilidade'):
		return '';
	else:
		return $objeto->getHabilidadeMagica3();
	endif;	
}
function tratar_habilidade_magica4($objeto){
	if($objeto->getHabilidadeMagica4() == 'Sem habilidade'):
		return '';
	else:
		return $objeto->getHabilidadeMagica4();
	endif;	
}

function checked($objeto){
	if($objeto->ativo == 's'):
		$checked  = 'checked = "checked"';
	else:
		$checked = '';
	endif;
	return $checked;
}

function criar_pasta($nome){
	if(mkdir(BLOGPATH.$nome)):
		printMsg('Um arquivo com nome <b>'.$nome.'</b> foi criado com sucesso!');
	else:
		printMsg('Nenhum arquivo foi criado!','erro');
	endif;
}
function enviar_img($arquivo,$pasta){
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'],BLOGPATH.$pasta.'/'.$_FILES['arquivo']['name'])):
		printMsg('Imagem <b>'.$_FILES['arquivo']['name'].'</b> enviada com sucesso');
	else:
		printMsg('Imagem não enviada!','erro');
	endif;	
}

function ler_diretorio($nome){
	$pasta = opendir(BLOGPATH.$nome);
	while($p = readdir($pasta)):
		if($p != '.' and $p != '..'):
			echo '|'.$p.' ';
		endif;
	endwhile;  
}

function painel_upload($modulo){
	$tag = new tags();
	
	if(isset($_POST['enviar'])):
		enviar_img($_FILES['arquivo'],$_POST['pasta']);
	endif;

	if(isset($_POST['criar_pasta'])):
		criar_pasta($_POST['nome']);
	endif;
	
	$tag->elemento('div','class="large-12 columns"');
		$tag->elemento('div','class="row"');
		
			$tag->elemento('div','class="large-5 columns"');
				$tag->elemento('div','class="row"');
					$tag->elemento('form','class="userForm custom" method="post" action="" enctype="multipart/form-data" ');
						$tag->elemento('fieldset');
							$tag->elemento('legend');
								 echo ('Upload de imagem');
							$tag->close('legend');
							
							$tag->elemento('label','for="nome"');
								echo 'Nome da pasta a ser criada:';
							$tag->close('label');
							$tag->elemento('input','type="text" size="50" name="nome" autofocus="autofocus" value=""');
							
							$tag->elemento('div','class="small-2 large-12 columns" align="center"');
								$tag->elemento('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="small button "'); 
								echo ' ';    
								$tag->elemento('input','type="submit" name="criar_pasta" value="Criar Pasta" class="small button "');     
							$tag->close('div'); 
						$tag->close('fieldset');
					$tag->close('form');
				$tag->close('div');
			$tag->close('div');
			
			$tag->elemento('div','class="large-6 columns"');
				$tag->elemento('div','class="row"');
					$tag->elemento('form','class="userForm custom" method="post" action="" enctype="multipart/form-data" ');
						$tag->elemento('fieldset');
							$tag->elemento('legend');
								 echo ('Upload de imagem');
							$tag->close('legend');
							
							$tag->elemento('label','for="pasta"');
								echo 'Selecione uma dessas pastas para fazer upload de uma foto:';
							$tag->close('label');
							$tag->elemento('select','style="display:none" id="customDropdown" name="pasta"');
								$pasta = opendir(BLOGPATH);
								while($p = readdir($pasta)):
									$tag->elemento('option');
										if($p != '.' and $p != '..'):
											echo $p;
										endif;
									$tag->close('option');
								endwhile;  					
							$tag->close('select');
							
							$tag->elemento('label','for="arquivo"');
								echo 'Imagem a ser enviada:';
							$tag->close('label');
							$tag->elemento('input','type="file" size="50" name="arquivo" value=""');
							
							$tag->elemento('div','class="small-2 large-12 columns" align="center"');
								$tag->elemento('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="small button "'); 
								echo ' ';    
								$tag->elemento('input','type="submit" name="enviar" value="Enviar imagem" class="small button "');     
							$tag->close('div'); 
						$tag->close('fieldset');
					$tag->close('form');
				$tag->close('div');
			$tag->close('div');
	
		$tag->close('div');
	$tag->close('div');
}

function hora_atual(){
	$tempo = localtime(time(),TRUE);
	$hora = $tempo['tm_hour'];
	$min = $tempo['tm_min'];
	$segundos = $tempo['tm_sec'];
	
	return "$hora : $min : $segundos ";
}

function data_postagem($sessao,$data){
	$tempo = localtime(strtotime($data),TRUE);
	$dia = $tempo['tm_mday'];
	$mes = $tempo['tm_mon'];
	$ano = $tempo['tm_year']+1900;
	$semana = $tempo['tm_wday'];
	
	return "Escrito por <a>".$sessao."</a>, em ".$dia." de ". descobrir_mes($mes)." de $ano";
}

function data_comentario($sessao,$data){
	$tempo = localtime(strtotime($data),TRUE);
	$dia = $tempo['tm_mday'];
	$mes = $tempo['tm_mon'];
	$ano = $tempo['tm_year']+1900;
	$semana = $tempo['tm_wday'];
	
	return "No dia ".$dia." de ". descobrir_mes($mes)." de $ano, <a>".$sessao."</a> comentou este post.";
}

function descobrir_samana($dia){
	switch($dia):
		case 0:$semana = 'Domingo';
			break;
		case 1:$semana = 'Segunda feira';
			break;
		case 2:$semana = 'Terça feira';
			break;
		case 3:$semana = 'Quarta feira';
			break;
		case 4:$semana = 'Quinta feira';
			break;
		case 5:$semana = 'Sexta feira';
			break;
		case 6:$semana = 'Sábado';
			break;	
		default:$semana = 'Erro, o parâmerto está incorreto';						
	endswitch;
	return $semana;
}

function descobrir_mes($mes){
	switch($mes):
		case 0:$novo_mes = 'Janeiro';
			break;
		case 1:$novo_mes = 'Fevereiro';
			break;
		case 2:$novo_mes = 'Março';
			break;
		case 3:$novo_mes = 'Abril';
			break;
		case 4:$novo_mes = 'Maio';
			break;
		case 5:$novo_mes = 'Junho';
			break;
		case 6:$novo_mes = 'Julho';
			break;					
		case 7:$novo_mes = 'Agosto';
			break;
		case 8:$novo_mes = 'Setembro';
			break;
		case 9:$novo_mes = 'Outubro';
			break;
		case 10:$novo_mes = 'Novembro';
			break;
		case 11:$novo_mes = 'Dezembro';
			break;		
		default:$novo_mes = 'Erro, o parâmerto está incorreto';	
	endswitch;
	return $novo_mes;
}

function formatar_data_string($data){
	if($data == ''):
		$data = '';
	else:
		$data = explode('/', $data);
		$data = "{$data[2]}-{$data[0]}-{$data[1]}";
	endif;
	return $data;
}

function retornar_data_atual(){
	$tempo = localtime(time(),TRUE);
	$dia = $tempo['tm_mday'];
	$mes = $tempo['tm_mon']+1;
	$ano = $tempo['tm_year']+1900;
	$atual_time = "$dia/$mes/$ano";
	$atual = explode('/', $atual_time);
	$atual = "{$atual[2]}-{$atual[1]}-{$atual[0]}";
	$atual = strtotime($atual);
	return $atual;
}

function retornar_data_final($data_inicio){
	$inicio = explode('/', $data_inicio);
	$inicio = "{$inicio[2]}-{$inicio[1]}-{$inicio[0]}";
	$final = strtotime($inicio . "+1 month");
	$fim = date('d/m/Y',$final);					
	$fim = explode('/', $fim);
	//ou $fim = explode('/', date('d/m/Y',strtotime($inicio . "+1 month")));
	$fim = "{$fim[2]}-{$fim[1]}-{$fim[0]}";
	$fim = strtotime($fim);
	return $fim;
}

function total_recursos($objeto, $classe){
	$objeto = new $classe();
	return total_recursos_privados($objeto);
}

function total_recursos_privados($objeto){
	$objeto->extras_select = utf8_decode("WHERE dominio='privado'");	
	$objeto->seleciona_tudo($objeto);
	$count = 0;
	while($objeto_resp = $objeto->retorna_dados()):
		$count++;
	endwhile;
	return $count;
}

function enviar_email($nome,$email,$login,$senha){
		$meu_nome 	= strip_tags(trim(antiInject($nome)));
		$meu_email 	= strip_tags(trim(antiInject($email)));
		$meu_login 	= strip_tags(trim(antiInject($login)));
		$minha_senha= strip_tags(antiInject($senha));
		$emailremetente = "contato@helprpg.com.br";
		
		$mensagem = '
		<html>
			<head>
		 		<title>Sua conta de e-mail no HelpRpg</title>
			</head>
		<body>
		<div class="row">
			<div class="small-2 large-12 columns">
				<div class="panel">
					<p>
						Você acabou de criar uma conta no HelpRpg. Seja bem vindo a este mundo cheio de recursos para suas campanhas de D&D.
						
					</p>
					<p>
						
						Sua senha no HelpRpg:'.$login.'<br />
						Seu login no HelpRpg:'.$minha_senha.'
					</p>
					<p>	
						Estou muito feliz pela sua escolha. Meus agradecimentos, 
					</p>
					<p>	
						Maickon Rangel - Criador do HelpRpg
					</p>
				</div>
			</div>
		</div>
		';
		
       	$corpo = "Conta criada pelo usuário denominado abaixo:";
      	$corpo .= "Nome: " . $nome . "\n";
       	$corpo .= "Email: " . $email . "\n";
     	
		$assunto = "Confirmação de conta no HelpRpg";
		
		$headers = "MIME-Version: 1.1\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: $emailremetente\r\n"; 
		$headers .= "Return-Path: $meu_email \r\n"; 
	 
  	  	if(mail($meu_email, $assunto, $mensagem, $headers)):
			printMsg(utf8_decode('E-mail enviado com sucesso !'));
    	else:
			printMsg(utf8_decode('Um erro ocorreu, tente novamente.'));	      
		endif;
}
function limitar($string, $tamanho, $encode = 'UTF-8') {
    if( strlen($string) > $tamanho )
        $string = mb_substr($string, 0, $tamanho - 3, $encode) . '...';
    else
        $string = mb_substr($string, 0, $tamanho, $encode);
 
    return $string;
}
function total_registros($objeto, $classe, $categoria, $busca=false){
	if($busca == true):
		$count = 0;
		while($objeto_resp = $objeto->retorna_dados()):
			$count++;
		endwhile;
	else:
		$objeto = new $classe();
		switch($categoria):
			case 'armas_simples':
				$objeto->extras_select = "WHERE categoria='Armas Simples'";
			break;
			
			case 'armas_comuns':
				$objeto->extras_select = "WHERE categoria='Armas Comuns'";
			break;
			
			case 'armas_exoticas':
				$objeto->extras_select = utf8_decode("WHERE categoria='Armas Exóticas'");
			break;
			
			case 'armas_magicas':
				
			break;
		endswitch;
		
		$objeto->seleciona_tudo($objeto);
		$count = 0;
		while($objeto_resp = $objeto->retorna_dados()):
			$count++;
		endwhile;
	endif;	
	return $count;
}
function categoria($categoria){
		switch($categoria):
			case 'armas_simples':
				$cat = utf8_decode('Armas Simples');
			break;
			
			case 'armas_comuns':
				$cat = utf8_decode('Armas Comuns');
			break;
			
			case 'armas_exoticas':
				$cat = utf8_decode('Armas Exóticas');
			break;
			
			case 'armas_magicas':
				$cat = utf8_decode('Armas Mágicas');
			break;
		endswitch;
		
		return $cat;
}	
function exibir_armas($objeto, $classe, $num_reg, $select=false, $categoria='',$a='',$num){
	$tag = new tags();
	if(!isset($_GET['pg'])):
		$pg = 0;
	else:
		$pg = $_GET['pg'];	
	endif;
	$inicial = $pg*$num_reg;
	
	$objeto = new $classe();
	$quantidade_reg = 0;
	if($a != 'armas_magicas'):
		$tag->elemento('div','class="small-2 large-12 columns"');	
			if(isset($_POST["botao"]) && $_POST["botao"] == 'Buscar'):
				$objeto->buscar_armas(isset($_POST['nome'])?$_POST['nome']:'');	
				$quantidade_reg = total_registros($objeto,null,isset($_GET['a'])?$_GET['a']:'armas_comuns',true);  // pega o tipo no BD
				while($objeto_resp = $objeto->retorna_dados()):
					echo 'teste';
					var_dump($objeto_resp);
				endwhile;
			else:
				$objeto->exibir_armas(isset($_GET['a'])?$_GET['a']:'',$inicial,$num_reg);
				$quantidade_reg = total_registros('armas','armas',isset($_GET['a'])?$_GET['a']:'armas_comuns');  // pega o tipo no BD
			endif;			
				while($objeto_resp = $objeto->retorna_dados()):
					$tag->elemento('div','class="armas"');
					
						$tag->elemento('div','class="nome"');
							echo ($objeto_resp->nome); 
						$tag->close('div');
					
					$tag->elemento('div','class="bloco1"');
					
						$tag->elemento('div','class="categoria h"');
							echo ($objeto_resp->categoria);
						$tag->close('div');
					
						$tag->elemento('div','class="dados h"');
							echo ($objeto_resp->tipo);
						$tag->close('div');
						
						$tag->elemento('div','class="dados h"');
							echo ($objeto_resp->preco);
						$tag->close('div');
						
						$tag->elemento('div','class="dados h"');
							echo ($objeto_resp->decisivo);
						$tag->close('div');
						
						$tag->elemento('div','class="dados h"');
							echo ($objeto_resp->distancia);
						$tag->close('div');
						
						$tag->elemento('div','class="dados h"');
							echo ($objeto_resp->peso);
						$tag->close('div');
						
						$tag->close('div');
						
						$tag->elemento('div','class="descricao h"');
							echo ($objeto_resp->descricao);
						$tag->close('div');
					$tag->close('div');
				endwhile;
				
		$tag->close('div');
		paginacao($quantidade_reg, $pg, $num,isset($_GET['a'])?$_GET['a']:'armas_comuns');   //pega a página
	else:
	$armas = new ArmasMagicas();
	$armas->seleciona_tudo($armas);
	$quantidade_reg = 0;
	$tag->elemento('div','class="small-2 large-12 columns"');
		if(isset($_POST["botao"]) && $_POST["botao"] == 'Buscar'):
			$armas->buscar_armas(isset($_POST['nome'])?$_POST['nome']:'');
			$quantidade_reg = total_registros($armas,null,isset($_GET['a'])?$_GET['a']:'armas_comuns',true);  // pega o tipo no BD
		else:	
			$armas->exibir_armas(isset($_GET['a'])?$_GET['a']:'',$inicial,$num_reg);
			$quantidade_reg = total_registros('armas','ArmasMagicas',isset($_GET['a'])?$_GET['a']:'armas_comuns');  // pega o tipo no BD	
		endif;		
			while($objeto_resp = $armas->retorna_dados()):
				$i=0;
				$armas_lista = array();
				$escolido[$i] = $armas_lista[$i] = new ArmasMagicas();
				
				$tag->elemento('div','class="armas"');
				
					$tag->elemento('div','class="nome"');
						echo ($objeto_resp->nome.tratar_bonus_magicos($escolido[$i]).utf8_decode(' '.tratar_habilidade_magica1($escolido[$i]).
																								 ' '.tratar_habilidade_magica2($escolido[$i]).
																								 ' '.tratar_habilidade_magica3($escolido[$i]).
																								 ' '.tratar_habilidade_magica4($escolido[$i]))); 
					$tag->close('div');
				
				$tag->elemento('div','class="bloco1"');
				
					$tag->elemento('div','class="categoria h"');
						echo ($objeto_resp->categoria);
					$tag->close('div');
				
					$tag->elemento('div','class="dados h"');
						echo utf8_decode('Artefato - '.($escolido[$i]->getArtefato()));
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo ($objeto_resp->tipo);
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo ($objeto_resp->preco+$escolido[$i]->gerarCustoDaArma()).' PO';
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo ($objeto_resp->decisivo);
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo ($objeto_resp->distancia);
					$tag->close('div');
					
					$tag->elemento('div','class="dados h"');
						echo ($objeto_resp->peso);
					$tag->close('div');
					
					$tag->close('div');
					
					$tag->elemento('div','class="descricao h"');
						echo ($objeto_resp->descricao);
					$tag->close('div');
				$tag->close('div');
				
				$i++;
			endwhile;
			
	$tag->close('div');
	paginacao($quantidade_reg, $pg, $num,isset($_GET['a'])?$_GET['a']:'armas_comuns');   //pega a página
	endif;	
}

function paginacao($quantidade_reg, $pg, $num_reg, $pagina_nome='produtos'){

	$qtd_pag = ceil($quantidade_reg/$num_reg);
	$qtd_pag++;
	echo '<div class="row">';
	echo '<div class="small-2 large-12 columns page_links">';
	echo '<div class="grupo_links">';
	if($pg > 0):
		echo '<a href="?p=armas&a='.$pagina_nome.'&pg='.($pg-1).'">
        		<div class="page">&laquo;</div>
        	  </a>';
	else:
		//echo '<div class="page">&laquo;</div>';
	endif;
	 
	for($i_pg=1; $i_pg<$qtd_pag; $i_pg++):
		if($pg == ($i_pg-1)):
			echo '<div class="page atual">'.$i_pg.'</div>';	
		else:
			$i_pg2 = $i_pg-1;
			echo '<a href="?p=armas&a='.$pagina_nome.'&pg='.$i_pg2.'">
        			<div class="page">'.$i_pg.'</div>
        		 </a>';
		endif;	
    endfor; 
        
	if(($pg+2) < $qtd_pag):
		echo '<a href="?p=armas&a='.$pagina_nome.'&pg='.($pg+1).'">
        		<div class="page">&raquo;</div>
        	 </a>';
	endif;
	
   echo '</div>';   
   echo '</div>';
   echo '</div>';
}

function jogador($user){
	if($user):
		$link = $user;
	else:
		$link = 'HelpRPG';
	endif;
	return $link;
}
?>