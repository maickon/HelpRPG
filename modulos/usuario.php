<?php 
require_once(dirname(dirname(__FILE__))."/funcoes.php");
protegeArquivo(basename(__FILE__));
if(isset($_GET['p']) && $_GET['p'] == 'adm'):
else:
	link_menu_bar();
endif;
$pagina_nome = 'Usuário';
$objeto = 'user';
$classe = 'usuarioAdmin';
$modulo = 'usuario';

$pagina_nome = 'Usuários';
$descriacao= array('create'=>'Novo usuário','edit'=>'Editar usuário','destroy'=>'Apagar usuário');

switch ($tela):
	case 'login':
		$sessao = new sessao();
		if ($sessao->getNvars() > 0 && $sessao->getVar('logado') == TRUE && $sessao->getVar('ip') == $_SERVER['REMOTE_ADDR']) redireciona('painel-adm.php?m=true'); 
		if(isset($_POST['logar'])):
			$objeto = new $classe();
			$objeto->setValor('login',antiInject($_POST['usuario']));
			$objeto->setValor('senha',antiInject($_POST['senha']));
			if($objeto->logar($objeto)):
				redireciona('painel-adm.php?m=true');
			else:
				redireciona('?p=adm&erro=2');
			endif;
		endif;
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$(".userForm").validate({
				rules:{
				usuario:{required:true, minlength:3},
				senha:{required:true, rangelength:[4,10]}
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
									echo ('Usuário');
								$tag->close('label');
								$tag->elemento('input','type="text" size="50" name="usuario" autofocus="autofocus"','/');
						$tag->close('div');
						
						$tag->elemento('div','class="small-2 large-5 columns"');		
							$tag->elemento('br');
								$tag->elemento('label');
									echo utf8_decode('Senha');
								$tag->close('label');
								$tag->elemento('input','type="password" size="50" name="senha"','/');
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
									echo ('<div class="sucesso">Você fez logoff do sistema.</div>');
								break;
								
								case 2:
									echo ('<div class="erro">Dados incorretos ou você não é um administrador.</div>');
								break;
								
								case 3:
									echo ('<div class="erro">Faça login de antes de acessar a página solicitada.</div>');
								break;
								
								case 4:
									echo ('<div class="alerta">Alerta.</div>');
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
		$tag->elemento('h2');
			echo ($descriacao['create']);
		$tag->close('h2');
			if(isset($_POST['cadastrar'])):		
				$objeto = new $classe(array(
					'nome'=>$_POST['nome'],
					'email'=>$_POST['email'],
					'login'=>$_POST['login'],
					'tipo' =>NULL,
					'senha'=>codificarSenha($_POST['senha']),
					'ativo'=>'s',
					'tipo'=>$_POST['tipo'],	
					));
			if($objeto->usuJaExiste('login',$_POST['login'])):
				printMsg('Este login ja está cadastrado, escolha outro nome de usuário.','erro');
				$duplicado = TRUE;
			else:
				$duplicado = FALSE;
			endif;
			if($duplicado != TRUE):
				$objeto->inserir($objeto);
				if($objeto->linhas_afetadas == 1):
					printMsg('Dados inserido com sucesso <a href="'.ADMURL.'?m='.$modulo.'&t=listar">Exibir cadastros</a>');
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
					email:{required:true, email: true},
					login:{required:true, minlength:5},
					senha:{required:true, rangelength:[4,10]},
					senhaconf:{required:true,equalTo:"#senha"},
					tipo:{required:true, tipo:true}
			}
		});
    });
    </script>
    <?php
    	$tag->elemento('form','class="userForm custom" method="post" action=""');
        	$tag->elemento('fieldset');
				$tag->elemento('legend');
					echo $descriacao['create'];
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
	
				$tag->elemento('label','for="tipo"');
					echo 'Tipo de usuário:';
				$tag->close('label');				
				
				$tag->elemento('select','style="display:none" id="customDropdown" name="tipo"');
					$tipos = array('administrador','cliente');
					for($i=0; $i<count($tipos); $i++):
						$tag->elemento('option');
							echo utf8_decode($tipos[$i]);
						$tag->close('option');
					endfor;						
				$tag->close('select');
							
      			$tag->elemento('div','class="small-2 large-12 columns" align="center"');
					$tag->elemento('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="small button "'); 
					echo ' ';    
					$tag->elemento('input','type="submit" name="cadastrar" value="Salvar dados" class="small button "');     
				$tag->close('div');  
        $tag->close('fieldset'); 
    $tag->close('form'); 
	break;

	case 'listar':
		echo '<h2>Usuários cadastrados</h2>';
		$tag->loadCss('data_table',NULL,TRUE);
		$tag->loadJs('jquery_datatables');
		?>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#listausers').dataTable({
				"oLanguage":{
					"sLengthMenu": "Mostrar _MENU_ elementos por página",
					"sZeroRecords": "Nenhum dado encontrado para exibição",
					"sInfo": "Mostrando _START_ a _END_ de _TOTAL_ de registros",
					"sInfoEmpty": "Nenhum registro para ser exibido",
					"sInfoFiltered": "(filtrado de _MAX_ registros no total)",
					"sSearch": "Pesquisar"
				}, 
					"sSrollY": "400px",
					"bPaginatc": false,
					"aaSorting": [[0, "asc"]]
				});
			});
		</script>
		<table cellspacing="0" cellpadding="0" border="0" class="display" id="listausers">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Login</th>
					<th>Tipo</th>
					<th>Cadastrado</th>
                    <th>Inicio</th>
					<th>Ativo</th>
					<th>Ações</th>
				</tr>
			</thead>
		<tbody>
		<?php 
		$objeto = new $classe();
		$objeto->seleciona_tudo($objeto);
		while($resp = $objeto->retorna_dados()):
			if($resp->tipo == 'administrador')$link = '<a href="?m='.$modulo.'&t=incluir" title="Novo cadastro"><img src="img/plus.png" alt="Novo cadastro" /></a> ';
			echo '<tr>'; 
				printf('<td class="center">%s</td>',$resp->nome);
				printf('<td class="center">%s</td>',$resp->email);
				printf('<td class="center">%s</td>',$resp->login);
				printf('<td class="center">%s</td>',$resp->tipo);
				printf('<td class="center">%s</td>',date("d/m/Y",strtotime($resp->data_cadastro)));
				$atual = retornar_data_atual();
				$fim = retornar_data_final(date("d/m/Y",strtotime($resp->data_inicio)));
				if($atual >= $fim):
					printf('<td class="center fim" title="Este usuário teve o seu mês vencido no dia %s." >%s</td>',date("d/m/Y",$fim),date("d/m/Y",strtotime($resp->data_inicio)));
				else:
					printf('<td class="center ok" title="Este usuário ainda está em dia. Sua conta funcionará até o dia %s.">%s</td>',date("d/m/Y",$fim),date("d/m/Y",strtotime($resp->data_inicio)));
				endif;
				
				printf('<td class="center">%s</td>',$resp->ativo);
				printf('
				<td class="center">
					<div>'
						.$link.
					   '<a href="?m='.$modulo.'&t=editar&id=%s" title="Editar"><img src="img/edit.png" alt="Editar" /></a> 
						<a href="?m='.$modulo.'&t=senha&id=%s" title="Alterar senha"><img src="img/pass.png" alt="Alterar senha" /></a>
						<a href="?m='.$modulo.'&t=excluir&id=%s" title="Excluir"><img src="img/cancel.png" alt="Excluir" /></a>
					</div>
				</td>',$resp->id,$resp->id,$resp->id);
			echo '</tr>';
		endwhile;
		?>
		</tbody>
	</table>
    <?php 
    break;

	case 'editar':
		echo '<h2>Edição de usuários</h2>';
		$sessao = new sessao();
		if(isAdmin() == true || $sessao->getVar('id_user') == $_GET['id']):
			if(isset($_GET['id'])):
				$id = $_GET['id'];
				if(isset($_POST['editar'])):
					$objeto = new $classe(array(
						'nome' =>$_POST['nome'],
						'email' =>$_POST['email'],
						'login' =>$_POST['login'],
						'tipo' =>$_POST['tipo'],
						'data_inicio' =>formatar_data_string($_POST['data_inicio']),
						'ativo' =>$_POST['ativo']
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
				printMsg('Usuário não definido, <a href="m='.$modulo.'&t=listar">Escolha um usuário para alterar</a>','erro');
			endif;
			?>
			
			<script type="text/javascript">
			$(document).ready(function(){
				$(".userForm").validate({
					rules:{
						nome:{required:true, minlength:3},
						email:{required:true,email: true},
						tipo:{required:true, tipo:true},
						login:{required:true, minlength:5}
					}
				});
			});
			</script>
            
            <script>
		  	$(function() {
				$( "#datepicker" ).datepicker();
		  	});
		  </script>

            <?php
			
			$tag->elemento('form','class="userForm custom" method="post" action=""');
				$tag->elemento('fieldset');
					$tag->elemento('legend');
						echo $descriacao['edit'];
					$tag->close('legend');
				
					$tag->elemento('label','for="data_inicio"');
						echo 'Definir data de início para liberação da conta::';
					$tag->close('label');
					$tag->elemento('input','type="text" id="datepicker" size="50" name="data_inicio" value=""');
					$tag->elemento('br','','/');
				
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
					
					$tag->elemento('label','for="ativo"');
						echo 'Usuário ativo?:';
					$tag->close('label');
					$tag->elemento('select','style="display:none" id="customDropdown" name="ativo"');
					
						$tag->elemento('option','slected="SELECTED"');
							echo utf8_decode(''.$objeto_resp->ativo.'');
						$tag->close('option');
						$tipos = array('s','n');
						for($i=0; $i<count($tipos); $i++):
							$tag->elemento('option');
								echo utf8_decode($tipos[$i]);
							$tag->close('option');
						endfor;						
					$tag->close('select');
						
					$tag->elemento('label','for="tipo"');
						echo 'Tipo de usuário:';
					$tag->close('label');				
					
					$tag->elemento('select','style="display:none" id="customDropdown" name="tipo"');
					
						$tag->elemento('option','slected="SELECTED"');
							echo utf8_decode(''.$objeto_resp->tipo.'');
						$tag->close('option');
						$tipos = array('administrador','cliente');
						for($i=0; $i<count($tipos); $i++):
							$tag->elemento('option');
								echo utf8_decode($tipos[$i]);
							$tag->close('option');
						endfor;						
					$tag->close('select');
								
					$tag->elemento('div','class="small-2 large-12 columns" align="center"');
						$tag->elemento('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="small button "'); 
						echo ' ';    
						$tag->elemento('input','type="submit" name="editar" value="Editar dados" class="small button "');     
					$tag->close('div');  
				$tag->close('fieldset'); 
			$tag->close('form');
			 
		else:
			printMsg('Você não tem permissão para acessar esta página. <a href="#" onclik="history.back()">Voltar</a>','erro');
		endif;	
	break;	
				
	case 'senha':
		echo '<h2>Edição de senha</h2>';
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
				printMsg('Usuário não definido, <a href="m='.$modulo.'&t=listar">Escolha um usuário para alterar</a>','erro');
			endif;
			?>
			
			<script type="text/javascript">
			$(document).ready(function(){
				$("#userForm").validate({
					rules:{
						login:{
							required:true, 
							minlength:5
							},
						senha:{
							required:true, 
							rangelength:[4,10]
							},
						senhaconf:{
							required:true,
							equalTo:"#senha"
						}
					}
				});
			});
			</script>
		<?php 
		$tag->elemento('form','class="custom" id="userForm" method="post" action=""');
			$tag->elemento('fieldset');
				$tag->elemento('legend');
					echo $descriacao['edit'];
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
					echo 'Tipo de usuário:';
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
				$tag->elemento('input','type="password" size="50" name="senha" id="senha" autofocus="autofocus"','','/');
				
				$tag->elemento('label','for="senhaconf"');
					echo 'Confirmar senha:';
				$tag->close('label');
				$tag->elemento('input','type="password" size="50" id="senhaconf" name="senhaconf"','','/');
							
				$tag->elemento('div','class="small-2 large-12 columns" align="center"');
					$tag->elemento('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="small button "'); 
					echo ' ';    
					$tag->elemento('input','type="submit" name="mudasenha" value="Salvar alterações" class="small button "');     
				$tag->close('div');  
			$tag->close('fieldset'); 
		$tag->close('form');
		else:
			printMsg('Você não tem permissão para acessar esta página. <a href="#" onclik="history.back()">Voltar</a>','erro');
		endif;	
	break;
	
	case 'excluir':
		echo '<h2>Exclusão de usuários</h2>';
		$sessao = new sessao();
		if(isAdmin() == TRUE):
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
						echo $descriacao['destroy'];
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
					echo 'Tipo de usuário:';
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
					$tag->elemento('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="small button "'); 
						echo ' ';    
					$tag->elemento('input','type="submit" name="excluir" value="Apagar dados" class="small button "');     
				$tag->close('div');  
			$tag->close('fieldset'); 
		$tag->close('form');
 
		else:
			printMsg('Você não tem permissão para acessar esta página. <a href="#" onclik="history.back()">Voltar</a>','erro');
		endif;	
	break;
		
default:
		echo '<p>A tela solicitada não existe.</p>';
	break;
endswitch;
?>