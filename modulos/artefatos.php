<?php
require_once(dirname(dirname(__FILE__))."/funcoes.php");
// echo basename(__FILE__); retorna o nome do arquivo
$tag = new tags();
protegeArquivo(basename(__FILE__));

link_menu_bar();

$objeto = 'artefatos';
$classe = 'artefatos';
$modulo = 'artefatos';

$pagina_nome = 'Artefato';
$descriacao= array('create'=>'Cadastrando um artefato','edit'=>'Editando um artefato','destroy'=>'Apagando um artefato');

switch ($tela):
	case 'incluir':
		if(isset($_POST['cadastrar'])):
			$objeto = new $classe(array(
				"nome"				=> $_POST['nome'],
				"dominio"			=> $_POST['dominio'],
				"tipo"				=> $_POST['tipo'],	
				"descricao_hist"	=> $_POST['descricao_hist'],
				"descricao_regra" 	=> $_POST['descricao_hist']
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg(''.$pagina_nome.' criado com sucesso <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
				unset($_POST);
			endif;			
		endif;	
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$(".userForm").validate({
				rules:{
					texto:{required:true},
				}
			});
		});
	</script>
    <?php
    $tag->elemento('form','class="userForm custom" method="post" action="" enctype="multipart/form-data" ');
        $tag->elemento('fieldset');
			$tag->elemento('legend');
				 echo ($descriacao['create']);
			$tag->close('legend');
            
            $objeto = new $classe();
			
			$tag->elemento('label','for="nome"');
				echo 'Nome:';
			$tag->close('label');
			$tag->elemento('input','type="text" size="50" name="nome" autofocus="autofocus" value=""');
			
			$tag->elemento('label','for="dominio"');
				echo 'Esta arma é pública ou privada? (<b>Pública</b>: De acesso a todos, <b>Privado</b>: De acesso a apenas usuários cadastrados.):';
			$tag->close('label');
			$tag->elemento('select','style="display:none" id="customDropdown" name="dominio"');
				$resposta = array('publico','privado');
				for($i=0; $i<count($resposta); $i++):
					$tag->elemento('option');
						echo ($resposta[$i]);
					$tag->close('option');
				endfor;						
			$tag->close('select');

			$tag->elemento('label','for="tipo"');
					echo 'Tipo:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="tipo" value=""');
				
			$tag->elemento('label');
				echo ('Sua história:');
			$tag->close('label');
			$tag->elemento('textarea','class="ckeditor" id="editor1" name="descricao_hist"');
			$tag->close('textarea');
			$tag->elemento('br');
			
			$tag->elemento('label');
				echo ('Como funciona nas regras:');
			$tag->close('label');
			$tag->elemento('br');
			$tag->elemento('textarea','class="ckeditor" id="editor1" name="descricao_regra"');
			$tag->close('textarea');
			$tag->elemento('br');
			
			$tag->elemento('div','class="small-2 large-12 columns" align="center"');
				$tag->elemento('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="small button "'); 
				echo ' ';    
				$tag->elemento('input','type="submit" name="cadastrar" value="Salvar dados" class="small button "');     
			$tag->close('div');                   
        $tag->close('fieldset');
    $tag->close('form');
    
	break;	
	
	case 'listar':
		$tag->elemento('div','align="right"');
			$tag->elemento('h2','align="left"');
				$tag->elemento('a','href="?m='.$modulo.'&t=incluir" title="Novo cadastro"');
					$tag->elemento('img','src="img/plus.png" alt="Novo cadastro"','/');
						echo ($pagina_nome);
					$tag->close('a');
			$tag->close('h2');	
		$tag->close('div');
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
        <?php 
		$tag->elemento('table','cellspacing="0" cellpadding="0" border="0" class="display" id="listausers" ');
			$tag->elemento('thead');
			 	$tag->elemento('tr');
                    $tag->elemento('th');
						echo ('Nome');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Domínio');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Tipo');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Descrição histórica');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Descricao de regra');
					$tag->close('th');
					
                    $tag->elemento('th');
						echo ('Ação');
					$tag->close('th');
			 	$tag->close('tr');
				
			$tag->close('thead');			  
		$tag->close('tbody');
			
			$objeto = new $classe();
			$objeto->seleciona_tudo($objeto);
			while($resp = $objeto->retorna_dados()):
				$tag->elemento('tr'); 
					$tag->elemento('td','class="center"');
						printf('%s',$resp->nome);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->dominio);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->tipo);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->descricao_hist);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->descricao_regra);
					$tag->close('td');
										
					$tag->elemento('td','class="center"');
						$tag->elemento('div');
							$tag->elemento('a','href="?m='.$modulo.'&t=incluir" title="Novo cadastro"');
								$tag->elemento('img','src="img/plus.png" alt="Novo cadastro"','/');
							$tag->close('a');
							
							$tag->elemento('a','href="?m='.$modulo.'&t=editar&id='.$resp->id.'" title="Editar"');
								$tag->elemento('img','src="img/edit.png" alt="Editar"','/');
							$tag->close('a');
							
							$tag->elemento('a','href="?m='.$modulo.'&t=excluir&id='.$resp->id.'" title="Excluir"');
								$tag->elemento('img','src="img/cancel.png" alt="Excluir"','/');
							$tag->close('a');
						$tag->close('div');
					$tag->close('td');
				$tag->close('tr');									
			endwhile;	
       $tag->close('tbody');	
	$tag->close('table');	

	break;	
		
	case 'editar':
		$tag->elemento('h2');
			echo ($descriacao['edit']);
		$tag->close('h2');	 
		if(isAdmin() == TRUE || $sessao->getVar('id_user') == $_GET['id']):
			if(isset($_GET['id'])):
				$id = $_GET['id'];
				if(isset($_POST['editar'])):
					$objeto = new $classe(array(
						"tipo"				=> $_POST['tipo'],
						"dominio"			=> $_POST['dominio'],
						"nome"				=> $_POST['nome'],
						"descricao_hist"	=> $_POST['descricao_hist'],
						"descricao_regra" 	=> $_POST['descricao_regra']
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					$objeto->atualizar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg(''.$pagina_nome.' editado com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir '.$pagina_nome.'</a>');
						unset($_POST);
					else:
						printMsg('Nenhum dado foi alterado. <a href="?m='.$modulo.'&t=listar">Exibir '.$pagina_nome.'</a>','alerta');	
					endif;
				endif;				
				$objeto_exibir = new $classe();
				$objeto_exibir->extras_select = " WHERE id=$id";
				$objeto_exibir->seleciona_tudo($objeto_exibir);
				$objeto_resp = $objeto_exibir->retorna_dados();
			endif;
		?>
		
		<script type="text/javascript">
		$(document).ready(function(){
			$(".userForm").validate({
				rules:{
					nome:{required:true},
					img:{required:true}
				}
			});
		});
		</script>
		<?php
		 $tag->elemento('form','class="userForm custom" method="post" action="" enctype="multipart/form-data" ');
			$tag->elemento('fieldset');
				$tag->elemento('legend');
					 echo ($pagina_nome);
				$tag->close('legend');
				
				$objeto = new $classe();
				
				$tag->elemento('label','for="nome"');
					echo 'Nome:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="nome" autofocus="autofocus" value="'.$objeto_resp->nome.'"');
								
				$tag->elemento('label','for="dominio"');
					echo 'Esta arma é pública ou privada? (<b>Pública</b>: De acesso a todos, <b>Privado</b>: De acesso a apenas usuários cadastrados.):';
				$tag->close('label');
				$tag->elemento('select','style="display:none" id="customDropdown" name="dominio"');
				$resposta = array('publico','privado');
				$tag->elemento('option','select="selected"');
					echo $objeto_resp->dominio;
				$tag->close('option');
				for($i=0; $i<count($resposta); $i++):
					$tag->elemento('option');
						echo ($resposta[$i]);
					$tag->close('option');
				endfor;						
				$tag->close('select');
				
				$tag->elemento('label','for="tipo"');
					echo 'Tipo:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="tipo" value="'.$objeto_resp->tipo.'"');
				
				$tag->elemento('label');
					echo ('Sua história:');
				$tag->close('label');
				$tag->elemento('textarea','class="ckeditor" id="editor1" name="descricao_hist"');
					echo $objeto_resp->descricao_hist;
				$tag->close('textarea');
				$tag->elemento('br');
				
				$tag->elemento('label');
					echo ('Como funciona nas regras:');
				$tag->close('label');
				$tag->elemento('br');
				$tag->elemento('textarea','class="ckeditor" id="editor1" name="descricao_regra"');
					echo $objeto_resp->descricao_regra;
				$tag->close('textarea');
				$tag->elemento('br');
				
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
	
	case 'excluir':
		$tag->elemento('h2');
			echo ($descriacao['destroy']);
		$tag->close('h2');
		$sessao = new sessao();
		if(isAdmin() == TRUE || $sessao->getVar('id_user') == $_GET['id']):
			if(isset($_GET['id'])):
				$id = $_GET['id'];
				if(isset($_POST['excluir'])):
					$objeto = new $classe(array());
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					
					$objeto->deletar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg('Dados deletados com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir '.$pagina_nome.'</a>');
						unset($_POST);
					else:
						printMsg('Nenhum dado foi deletado. <a href="?m='.$modulo.'&t=listar">Exibir '.$pagina_nome.'</a>','alerta');	
					endif;
				endif;
				$objeto_exibir = new $classe();
				$objeto_exibir->extras_select = " WHERE id=$id";
				$objeto_exibir->seleciona_tudo($objeto_exibir);
				$objeto_resp = $objeto_exibir->retorna_dados();
			endif;
			
		 $tag->elemento('form','class="userForm custom" method="post" action="" enctype="multipart/form-data" ');
			$tag->elemento('fieldset');
				$tag->elemento('legend');
					 echo ($pagina_nome);
				$tag->close('legend');
				
				$objeto = new $classe();
				
				$tag->elemento('label','for="nome"');
					echo 'Nome:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="nome" disabled="disabled" autofocus="autofocus" value="'.limpar_campo_excluir('nome',$objeto_resp).'"');
				
				$tag->elemento('label','for="tipo"');
					echo 'Tipo:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="tipo" disabled="disabled" value="'.limpar_campo_excluir('tipo',$objeto_resp).'"');
				
				$tag->elemento('label');
					echo ('Sua história:');
				$tag->close('label');
				$tag->elemento('textarea','class="ckeditor" id="editor1" disabled="disabled" name="descricao_hist"');
					echo limpar_campo_excluir('descricao_hist',$objeto_resp);
				$tag->close('textarea');
				$tag->elemento('br');
				
				$tag->elemento('label');
					echo ('Como funciona nas regras:');
				$tag->close('label');
				$tag->elemento('br');
				$tag->elemento('textarea','class="ckeditor" id="editor1" disabled="disabled" name="descricao_regra"');
					echo limpar_campo_excluir('descricao_regra',$objeto_resp);
				$tag->close('textarea');
				$tag->elemento('br');
				
				$tag->elemento('div','class="small-2 large-12 columns" align="center"');
					$tag->elemento('input','type="button" onclick="location.href=\'?m='.$modulo.'&t=listar\'" value="Cancelar" class="small button "'); 
					echo ' ';    
					$tag->elemento('input','type="submit" name="excluir" value="Excluir dados" class="small button "');     
				$tag->close('div');                   
			$tag->close('fieldset');
		$tag->close('form'); 	
        else:
        	printMsg('Você não tem permissão para acessar esta página. <a href="#" onclik="history.back()">Voltar</a>','erro');
        endif;	
	break;	
endswitch;

?>