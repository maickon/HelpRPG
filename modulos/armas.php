<?php
require_once(dirname(dirname(__FILE__))."/funcoes.php");
// echo basename(__FILE__); retorna o nome do arquivo
$tag = new tags();
protegeArquivo(basename(__FILE__));

link_menu_bar();

$objeto = 'armas';
$classe = 'armas';
$modulo = 'armas';

$pagina_nome = 'Arma';
$descriacao= array('create'=>'Cadastrando uma arma','edit'=>'Editando uma arma','destroy'=>'Apagando uma arma');

switch ($tela):
	case 'incluir':
		if(isset($_POST['cadastrar'])):
			$objeto = new $classe(array(
				"nome"			=> $_POST['nome'],
				"dominio"		=> $_POST['dominio'],
				"dano" 			=> $_POST['dano'],
				"preco" 		=> $_POST['preco'],
				"decisivo" 		=> $_POST['decisivo'],
				"distancia" 	=> $_POST['distancia'],
				"peso" 			=> $_POST['peso'],
				"tipo" 			=> $_POST['tipo'],
				"descricao" 	=> $_POST['descricao'],
				"categoria" 	=> $_POST['categoria']
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg(''.$pagina_nome.' criada com sucesso <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
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
		
			$tag->elemento('label','for="dano"');
				echo 'Dano:';
			$tag->close('label');
			$tag->elemento('input','type="text" size="50" name="dano" value=""');
			
			$tag->elemento('label','for="preco"');
				echo 'Preço:';
			$tag->close('label');
			$tag->elemento('input','type="text" size="50" name="preco" value=""');
			
			$tag->elemento('label','for="decisivo"');
				echo 'Decisivo:';
			$tag->close('label');
			$tag->elemento('input','type="text" size="50" name="decisivo" value=""');
			
			$tag->elemento('label','for="distancia"');
				echo 'Distância:';
			$tag->close('label');
			$tag->elemento('input','type="text" size="50" name="distancia" value=""');
			
			$tag->elemento('label','for="peso"');
				echo 'Peso:';
			$tag->close('label');
			$tag->elemento('input','type="text" size="50" name="peso" value=""');
			
			$tag->elemento('label','for="peso"');
				echo 'Tipo:';
			$tag->close('label');
			$tag->elemento('select','style="display:none" id="customDropdown" name="tipo"');
				$tipos = array('Armas Leves - Corpo a Corpo','Armas de Uma Mão - Corpo a Corpo','Armas de Duas Mãos - Corpo a Corpo','Armas de Ataque à Distância');
				for($i=0; $i<count($tipos); $i++):
					$tag->elemento('option');
						echo ($tipos[$i]);
					$tag->close('option');
				endfor;						
			$tag->close('select');
			
			$tag->elemento('label','for="peso"');
				echo 'Categoria:';
			$tag->close('label');
			$tag->elemento('select','style="display:none" id="customDropdown" name="categoria"');
				$tipos = array('Armas Simples','Armas Comuns','Armas Exóticas','Armas Mágicas');
				for($i=0; $i<count($tipos); $i++):
					$tag->elemento('option');
						echo ($tipos[$i]);
					$tag->close('option');
				endfor;						
			$tag->close('select');

			$tag->elemento('label');
				echo ('Descrição:');
			$tag->close('label');
			$tag->elemento('br');
			$tag->elemento('textarea','class="ckeditor" id="editor1" name="descricao"');
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
						echo ('Nova Arma');
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
						echo ('Dano');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Preço');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Decisivo');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Distância');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Peso');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('tipo');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Categoria');
					$tag->close('th');
					
					$tag->elemento('th');
						echo ('Descricao');
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
						printf('%s',$resp->dano);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->preco);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->decisivo);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->distancia);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->peso);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->tipo);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->categoria);
					$tag->close('td');
					
					$tag->elemento('td','class="center"');
						printf('%s',$resp->descricao);
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
						"nome"			=> $_POST['nome'],
						"dominio"		=> $_POST['dominio'],
						"dano" 			=> $_POST['dano'],
						"preco" 		=> $_POST['preco'],
						"decisivo" 		=> $_POST['decisivo'],
						"distancia" 	=> $_POST['distancia'],
						"peso" 			=> $_POST['peso'],
						"tipo" 			=> $_POST['tipo'],
						"descricao" 	=> $_POST['descricao'],
						"categoria" 	=> $_POST['categoria']
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					$objeto->atualizar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg(''.$pagina_nome.' editada com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir '.$pagina_nome.'</a>');
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
				
				$tag->elemento('label','for="custo"');
					echo 'Dano:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="dano" value="'.$objeto_resp->dano.'"');
				
				$tag->elemento('label','for="preco"');
					echo 'Preço:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="preco" value="'.$objeto_resp->preco.'"');
				
				$tag->elemento('label','for="decisivo"');
					echo 'Decisivo:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="decisivo" value="'.$objeto_resp->decisivo.'"');
				
				$tag->elemento('label','for="distancia"');
					echo 'Distância:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="distancia" value="'.$objeto_resp->distancia.'"');
				
				$tag->elemento('label','for="peso"');
					echo 'Peso:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="peso" value="'.$objeto_resp->peso.'"');
				
				$tag->elemento('select','style="display:none" id="customDropdown" name="tipo"');
					$tipos = array('Armas Leves - Corpo a Corpo','Armas de Uma Mão - Corpo a Corpo','Armas de Duas Mãos - Corpo a Corpo','Armas de Ataque à Distância');
					$tag->elemento('option','SELECTED');
						echo ($objeto_resp->tipo);
					$tag->close('option');
					for($i=0; $i<count($tipos); $i++):
						$tag->elemento('option');
							echo ($tipos[$i]);
						$tag->close('option');
					endfor;						
				$tag->close('select');
				
				$tag->elemento('select','style="display:none" id="customDropdown" name="categoria"');
					$categorias = array('Armas Simples','Armas Comuns','Armas Exóticas','Armas Mágicas');
					$tag->elemento('option','SELECTED');
						echo ($objeto_resp->categoria);
					$tag->close('option');
					for($i=0; $i<count($categorias); $i++):
						$tag->elemento('option');
							echo ($categorias[$i]);
						$tag->close('option');
					endfor;						
				$tag->close('select');
				
				$tag->elemento('label');
					echo ('Descrição:');
				$tag->close('label');
				$tag->elemento('br');
				$tag->elemento('textarea','class="ckeditor" id="editor1" name="descricao"');
					echo ($objeto_resp->descricao);
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
				
				$tag->elemento('label','for="custo"');
					echo 'Dano:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="dano" disabled="disabled" value="'.limpar_campo_excluir('dano',$objeto_resp).'"');
				
				$tag->elemento('label','for="preco"');
					echo 'Preço:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="preco" disabled="disabled" value="'.limpar_campo_excluir('preco',$objeto_resp).'"');
				
				$tag->elemento('label','for="decisivo"');
					echo 'Decisivo:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="decisivo" disabled="disabled" value="'.limpar_campo_excluir('decisivo',$objeto_resp).'"');
				
				$tag->elemento('label','for="distancia"');
					echo 'Distância:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="distancia" disabled="disabled" value="'.limpar_campo_excluir('distancia',$objeto_resp).'"');
				
				$tag->elemento('label','for="peso"');
					echo 'Peso:';
				$tag->close('label');
				$tag->elemento('input','type="text" size="50" name="peso" disabled="disabled" value="'.limpar_campo_excluir('peso',$objeto_resp).'"');
				
				$tag->elemento('label','for="tipo"');
					echo 'Tipo:';
				$tag->close('label');
				$tag->elemento('select','style="display:none" id="customDropdown" name="tipo" disabled="disabled"');
					$tipos = array('Armas Leves - Corpo a Corpo','Armas de Uma Mão - Corpo a Corpo','Armas de Duas Mãos - Corpo a Corpo','Armas de Ataque à Distância');
					$tag->elemento('option','SELECTED');
						echo limpar_campo_excluir('tipo',$objeto_resp);
					$tag->close('option');
					for($i=0; $i<count($tipos); $i++):
						$tag->elemento('option');
							echo ($tipos[$i]);
						$tag->close('option');
					endfor;						
				$tag->close('select');
				
				$tag->elemento('label','for="categoria"');
					echo 'Categoria:';
				$tag->close('label');
				$tag->elemento('select','style="display:none" id="customDropdown" name="categoria" disabled="disabled"');
					$tipos = array('Armas Simples','Armas Comuns','Armas Exóticas','Armas Mágicas');
					$tag->elemento('option','SELECTED');
						echo limpar_campo_excluir('categoria',$objeto_resp);
					$tag->close('option');
					for($i=0; $i<count($tipos); $i++):
						$tag->elemento('option');
							echo ($tipos[$i]);
						$tag->close('option');
					endfor;						
				$tag->close('select');

				$tag->elemento('label');
					echo ('Descrição:');
				$tag->close('label');
				$tag->elemento('br');
				$tag->elemento('textarea','class="ckeditor" id="editor1" disabled="disabled" name="descricao"');
					echo limpar_campo_excluir('descricao',$objeto_resp);
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