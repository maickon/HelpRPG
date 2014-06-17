<?php 
require_once(dirname(dirname(__FILE__))."/funcoes.php");

$pagina_nome = 'Aventureiro';
$objeto = 'usuarioAventureiro';
$classe = 'usuarioAventureiro';
$modulo = 'usuario_cliente';

$pagina_nome = utf8_decode('Usuários');
$descriacao= array('create'=>'Venha se tornar um cliente aventureiro e desfrute de nossos recursos.','edit'=>'Editar usuário','destroy'=>'Apagar usuário');

switch ($tela):
		case 'login':
		$sessao = new sessao();
		if ($sessao->getNvars() > 0 && $sessao->getVar('logado') == TRUE && $sessao->getVar('ip') == $_SERVER['REMOTE_ADDR']) redireciona('painel-aventureiro.php?m=true'); 
		if(isset($_POST['logar'])):
			$objeto = new $classe();
			$objeto->setValor('login',antiInject($_POST['usuario']));
			$objeto->setValor('senha',antiInject($_POST['senha']));
			if($objeto->logar($objeto)):
				redireciona('painel-aventureiro.php?m=true');
			else:
				redireciona('?p=cliente&erro=2');
			endif;
		endif;
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".userForm").validate({
				rules:{
					usuario:{required: true, minlength:3},
					senha:{required:true, rangelength:[4,10]
					}
				}
			});
		});
		</script>
        <?php
		$tag->elemento('div','class="row"');
			$tag->elemento('div','class="small-2 large-8 columns centered push-2" align="center"');	
				$tag->elemento('form','method="post" class="userForm"');
					$tag->elemento('fieldset');
						$tag->elemento('legend');
							echo 'Seja Bem vindo Aventureiro';
						$tag->close('legend');
						
						$tag->elemento('div','class="small-2 large-5 columns"');
							$tag->elemento('br');
								$tag->elemento('label');
									echo utf8_decode('Usuário');
								$tag->close('label');
								$tag->elemento('input','type="text" size="50" name="usuario" id="usuario" autofocus="autofocus"','/');
						$tag->close('div');
						
						$tag->elemento('div','class="small-2 large-5 columns"');		
							$tag->elemento('br');
								$tag->elemento('label');
									echo utf8_decode('Senha');
								$tag->close('label');
								$tag->elemento('input','type="password" size="50" name="senha" id="senha"','/');
						$tag->close('div');
						
						$tag->elemento('div','class="small-2 large-2 columns"');		
							$tag->elemento('br');
							$tag->elemento('br');
								$tag->elemento('input','name="logar" type="submit" value="Logar" class="small button black"','/');
						$tag->close('div');
						
						$tag->elemento('div','class="small-2 large-12 columns"');
							if(isset($_GET['erro'])):
								$erro = $_GET['erro'];
							else:
								$erro = '';
							endif;	
								
							switch ($erro):
								case 1:
									echo utf8_decode('<div class="sucesso">Você fez logoff do sistema.</div>');
								break;
								
								case 2:
									echo utf8_decode('<div class="erro">Dados incorretos ou sua validade de conta expirou.</div>');
								break;
								
								case 3:
									echo utf8_decode('<div class="erro">Faça login de antes de acessar a página solicitada.</div>');
								break;
								
								case 4:
									echo utf8_decode('<div class="alerta">Alerta.</div>');
								break;
								
								case 5:
									echo '<div class="pergunta">Pergunta.</div>';
								break;	
							endswitch;
	
						$tag->close('div');
					$tag->close('fieldset');
				$tag->close('form');
			$tag->close('div');
		$tag->close('div');	
		$pics = slect_list();
		$tag->elemento('div','class="row"');
			$tag->elemento('div','class="small-1 large-8 columns centered push-2" align="center"');
				$tag->elemento('div','class="featured" data-orbit');
					for($i=0; $i <= count($pics); $i++):
						if(isset($pics[$i])):
							$tag->elemento('img','src="'.BASEURL.'img/slide/'.$pics[$i].'" class="img_slide"');
						 endif;    
					endfor;
				$tag->close('div');	  
			$tag->close('div');
		$tag->close('div');	
		    
        break;
    
        case 'incluir':
		$tag->elemento('h3');
			echo utf8_decode($descriacao['create']);
		$tag->close('h3');
			if(isset($_POST['cadastrar'])):		
				$objeto = new $classe(array(
					'nome'=>$_POST['nome'],
					'email'=>$_POST['email'],
					'login'=>$_POST['login'],
					'senha'=>codificarSenha($_POST['senha']),
					'ativo'=>'s',
					'tipo'=>'cliente',
					));
			if($objeto->usuJaExiste('login',$_POST['login'])):
				printMsg(utf8_decode('Este login ja está cadastrado, escolha outro nome de usuário.'),'erro');
				$duplicado = TRUE;
			else:
				$duplicado = FALSE;
			endif;
			if($duplicado != TRUE):
				$objeto->inserir($objeto);
				if($objeto->linhas_afetadas == 1):
					printMsg(utf8_decode('Você acabou de criar uma conta no Help Rpg, agora efetue o depósito e contate-nos por email.'));
					enviar_email($_POST['nome'],$_POST['email'],$_POST['login'],$_POST['senha']);
					unset($_POST);
				endif;
			endif;	
		endif;
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".userForm").validate({
				rules:{
					nome:{required:true, minlength:3},	
					email:{required:true, email:true},
					login:{required:true, minlength:5},
					senha:{required:true, rangelength:[4,10]},
					senhaconf:{required:true,equalTo:"#senha"}
			}
		});
    });
    </script>
    <?php
    	$tag->elemento('form','class="userForm" method="post" action=""');
        	$tag->elemento('fieldset');
				$tag->elemento('legend');
					echo utf8_decode('Crie sua conta agora no Help Rpg! É simple e fácil.');
				$tag->close('legend');
        	
				$tag->elemento('label','for="nome"');
					echo 'Nome:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="nome" autofocus="autofocus" value=""');
           		 											
				$tag->elemento('label','for="email"');
					echo 'Email:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="email" value=""');           		 
	            
				$tag->elemento('label','for="login"');
					echo 'Login:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="login" value=""');
	
				$tag->elemento('label','for="senha"');
					echo 'Senha:';
				$tag->close('label');
				$tag->elemento('input','type="password" size="50" name="senha" id="senha" value=""');
	       			
				$tag->elemento('label','for="senhaconf"');
					echo 'Repita a senha:';
				$tag->close('label');
				$tag->elemento('input','type="password" size="50" name="senhaconf" id="senhaconf" value=""');
				
      			$tag->elemento('div','class="small-2 large-12 columns" align="center"');
					$tag->elemento('input','type="button" onclick="location.href=\'painel-aventureiro.php\'" value="Cancelar" class="small button "');  
					echo ' ';    
					$tag->elemento('input','type="submit" name="cadastrar" value="Salvar dados" class="small button "');     
				$tag->close('div');  
        $tag->close('fieldset'); 
    $tag->close('form'); 
	break;

	case 'editar':
		echo utf8_decode('<h2>Edição de usuários</h2>');
		$sessao = new sessao();
		if(isAdmin() == TRUE || $sessao->getVar('id_user') == $_GET['id']):
			if(isset($_GET['id'])):
				$id = $_GET['id'];
				if(isset($_POST['editar'])):
					$objeto = new $classe(array(
						'nome' =>$_POST['nome'],
						'email' =>$_POST['email'],
						'tipo' =>$_POST['tipo'],
						'ativo' =>($_POST['ativo']=='on') ? 's' : 'n'
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					if(isset($duplicado) != TRUE):
						$objeto->atualizar($objeto);
						if($objeto->linhas_afetadas == 1):
							printMsg('Dados alterados com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
							unset($_POST);
						else:
							printMsg('Nenhum dado foi alterado. <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>','alerta');	
						endif;
					endif;
				endif;
				
				$objeto_edit = new $classe();
				$objeto_edit->extras_select = " WHERE id=$id";
				$objeto_edit->seleciona_tudo($objeto_edit);
				$objeto_resp = $objeto_edit->retorna_dados();
			else:
				printMsg(utf8_decode('Usuário não definido.'),'erro');
			endif;
			?>
			
			<script type="text/javascript">
			$(document).ready(function(){
				$(".userForm").validate({
					rules:{
						nome:{required:true, minlength:3},
						email:{required:true},
						tipo:{required:true, tipo:true}
					}
				});
			});
			</script>
            <?php
			
			$tag->elemento('form','class="userForm custom" method="post" action=""');
				$tag->elemento('fieldset');
					$tag->elemento('legend');
						echo utf8_decode($descriacao['edit']);
					$tag->close('legend');
				
					$tag->elemento('label','for="nome"');
						echo 'Nome:';
					$tag->close('label');
					$tag->elemento('input','type="text" size="50" name="nome" autofocus="autofocus" value="'.$objeto_resp->nome.'"');
																
					$tag->elemento('label','for="email"');
						echo 'Email:';
					$tag->close('label');
					$tag->elemento('input','type="text" size="50" name="email" value="'.$objeto_resp->email.'"');           		 
					
					$tag->elemento('label','for="login"');
						echo 'Login:';
					$tag->close('label');
					$tag->elemento('input','type="text" size="50" name="login" value="'.$objeto_resp->login.'"');
						
					$tag->elemento('div','class="small-2 large-12 columns" align="center"');
						$tag->elemento('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="small button "'); 
						echo ' ';    
						$tag->elemento('input','type="submit" name="cadastrar" value="Salvar dados" class="small button "');     
					$tag->close('div');  
				$tag->close('fieldset'); 
			$tag->close('form');
			 
		else:
			printMsg(utf8_decode('Você não tem permissão para acessar esta página.'),'erro');
		endif;	
	break;	
				
	case 'senha':
		echo utf8_decode('<h2>Edição de senha</h2>');
		$sessao = new sessao();
		if(isAdmin() == TRUE || $sessao->getVar('id_user') == $_GET['id']):
			if(isset($_GET['id'])):
				$id = $_GET['id'];
				if(isset($_POST['mudasenha'])):
					$objeto = new $classe(array(
						'senha'=>codificarSenha($_POST['senha']),
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
				
					$objeto->atualizar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg('Senha alterada com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
						unset($_POST);
					else:
						printMsg('Nenhum dado foi alterado. <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>','alerta');	
					endif;
				endif;
				
				$objeto_edit = new $classe();
				$objeto_edit->extras_select = " WHERE id=$id";
				$objeto_edit->seleciona_tudo($objeto_edit);
				$objeto_resp = $objeto_edit->retorna_dados();
			else:
				printMsg(utf8_decode('Usuário não definido'),'erro');
			endif;
			?>
			
			<script type="text/javascript">
			$(document).ready(function(){
				$(".userForm").validate({
					rules:{
						login:{required:true, minlength:5},
						senha:{required:true, rangelength:[4,10]},
						//senhaconf:{required:true,equalTo:"#senha"}
					}
				});
			});
			</script>
		<?php 
		$tag->elemento('form','class="userForm custom" method="post" action=""');
			$tag->elemento('fieldset');
				$tag->elemento('legend');
					echo utf8_decode($descriacao['edit']);
				$tag->close('legend');
			
				$tag->elemento('label','for="nome"');
					echo 'Nome:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="nome" disabled="disabled" value="'.limpar_campo_excluir('nome',$objeto_resp).'"');
															
				$tag->elemento('label','for="email"');
					echo 'Email:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="email" disabled="disabled" value="'.limpar_campo_excluir('email',$objeto_resp).'"');           		 
				
				$tag->elemento('label','for="login"');
					echo 'Login:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="login" disabled="disabled" value="'.limpar_campo_excluir('login',$objeto_resp).'"');
		
				$tag->elemento('label','for="tipo"');
					echo utf8_decode('Tipo de usuário:');
				$tag->close('label');				
				
				$tag->elemento('select','style="display:none" id="customDropdown" name="tipo" disabled="disabled"');
				
					$tag->elemento('option','slected="SELECTED"');
						echo limpar_campo_excluir('tipo',$objeto_resp);
					$tag->close('option');
					$tipos = array('administrador','cliente');
					for($i=0; $i<count($tipos); $i++):
						$tag->elemento('option');
							echo utf8_decode($tipos[$i]);
						$tag->close('option');
					endfor;						
				$tag->close('select');
			
				$tag->elemento('label','for="senha"');
					echo 'Senha:';
				$tag->close('label');
				$tag->elemento('input','type="password" size="50" name="senha" autofocus="autofocus" value=""');
				
				$tag->elemento('label','for="senhaconf"');
					echo 'Confirmar senha:';
				$tag->close('label');
				$tag->elemento('input','type="password" size="50" name="senhaconf" value=""');
							
				$tag->elemento('div','class="small-2 large-12 columns" align="center"');
					$tag->elemento('input','type="button" onclick="location.href=\'painel-aventureiro.php\'" value="Cancelar" class="small button "'); 
					echo ' ';    
					$tag->elemento('input',utf8_decode('type="submit" name="mudasenha" value="Salvar alterações" class="small button "'));     
				$tag->close('div');  
			$tag->close('fieldset'); 
		$tag->close('form');
		else:
			printMsg(utf8_decode('Você não tem permissão para acessar esta página.'),'erro');
		endif;	
	break;
	
	case 'excluir':
		echo utf8_decode('<h2>Exclusão de usuários</h2>');
		$sessao = new sessao();
		if(isAdmin() == TRUE || $sessao->getVar('id_user') == $_GET['id']):
			if(isset($_GET['id'])):
				$id = $_GET['id'];
				if(isset($_POST['excluir'])):
					$objeto = new $classe();
					$objeto->valor_pk = $id;
					$objeto->extras_select = " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();

					$objeto->deletar($objeto);				
					if($objeto->linhas_afetadas == 1):
						printMsg('Registro excluido com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
						unset($_POST);
					else:
						printMsg('Nenhum registro foi excluido. <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>','alerta');	
					endif;
				endif;
				
				$objeto_edit = new $classe();
				$objeto_edit->extras_select = " WHERE id=$id";
				$objeto_edit->seleciona_tudo($objeto_edit);
				$objeto_resp = $objeto_edit->retorna_dados();
			else:
				printMsg('Usuário não definido, <a href="m='.$modulo.'&t=listar">Escolha um usuário para excluir</a>','erro');
			endif;
			
			$tag->elemento('form','class="userForm custom" method="post" action=""');
				$tag->elemento('fieldset');
					$tag->elemento('legend');
						echo utf8_decode($descriacao['destroy']);
					$tag->close('legend');
				
					$tag->elemento('label','for="nome"');
					echo 'Nome:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="nome" disabled="disabled" value="'.limpar_campo_excluir('nome',$objeto_resp).'"');
															
				$tag->elemento('label','for="email"');
					echo 'Email:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="email" disabled="disabled" value="'.limpar_campo_excluir('email',$objeto_resp).'"');           		 
				
				$tag->elemento('label','for="login"');
					echo 'Login:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="login" disabled="disabled" value="'.limpar_campo_excluir('login',$objeto_resp).'"');
		
				$tag->elemento('label','for="tipo"');
					echo utf8_decode('Tipo de usuário:');
				$tag->close('label');				
				
				$tag->elemento('select','style="display:none" id="customDropdown" name="tipo" disabled="disabled"');
				
					$tag->elemento('option','slected="SELECTED"');
						echo limpar_campo_excluir('tipo',$objeto_resp);
					$tag->close('option');
					$tipos = array('administrador','cliente');
					for($i=0; $i<count($tipos); $i++):
						$tag->elemento('option');
							echo utf8_decode($tipos[$i]);
						$tag->close('option');
					endfor;						
				$tag->close('select');
															
				$tag->elemento('div','class="small-2 large-12 columns" align="center"');
					$tag->elemento('input','type="button" onclick="location.href=\'painel-aventureiro.php\'" value="Cancelar" class="small button "');  
						echo ' ';    
					$tag->elemento('input','type="submit" name="excluir" value="Apagar dados" class="small button "');     
				$tag->close('div');  
			$tag->close('fieldset'); 
		$tag->close('form');
 
		else:
			printMsg(utf8_decode('Você não tem permissão para acessar esta página.'),'erro');
		endif;	
	break;
		
default:
		echo '<p>A tela solicitada não existe.</p>';
	break;
endswitch;
?>