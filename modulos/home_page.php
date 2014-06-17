<?php
require_once(dirname(dirname(__FILE__))."/funcoes.php");
// echo basename(__FILE__); retorna o nome do arquivo
$tag = new tags();
protegeArquivo(basename(__FILE__));
$page_names = array('Home Page','Sobre',utf8_encode('Histórias'));
$page_links = array('?m=home_page&t=listar','?m=sobre_page&t=listar','?m=hist_page&t=listar');
link_menu_bar($page_names,$page_links);

$objeto = 'home_page';
$classe = 'home_page';
$modulo = 'home_page';

$pagina_nome = 'Home Page';
$descriacao= array('create'=>'Cadastrando minha Home Page','edit'=>'Editando minha Home Page','destroy'=>'Apagando minha Home Page');

switch ($tela):
	case 'incluir':
		if(isset($_POST['cadastrar'])):
			$objeto = new $classe(array(
				"texto"	=> $_POST['texto']
			));
			$objeto->inserir($objeto);
			if($objeto->linhas_afetadas == 1):
				printMsg('Página criada com sucesso <a href="?m='.$modulo.'&t=listar">Exibir cadastros</a>');
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
    $tag->elemento('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
        $tag->elemento('fieldset');
			$tag->elemento('legend');
				 echo ($descriacao['create']);
			$tag->close('legend');
            
             $objeto = new $classe();
			$tag->elemento('label');
				echo ('Minha página:');
			$tag->close('label');
			$tag->elemento('br');
			$tag->elemento('textarea','class="ckeditor" id="editor1" name="texto"');
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
		echo '<div align="right">';
			echo '<h2 align="left">';
				echo '<a href="?m='.$modulo.'&t=incluir" title="Novo cadastro"><img src="img/plus.png" alt="Novo cadastro" />Nova Página</a>';
			echo '</h2>';	
		echo '</div>';
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
						echo ('Página');
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
						printf('%s',$resp->texto);
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
						"texto" => $_POST['texto']
					));
					$objeto->valor_pk = $id;
					$objeto->extras_select =  " WHERE id=$id";
					$objeto->seleciona_tudo($objeto);
					$resp = $objeto->retorna_dados();
					$objeto->atualizar($objeto);
					if($objeto->linhas_afetadas == 1):
						printMsg('Página editada com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir página</a>');
						unset($_POST);
					else:
						printMsg('Nenhum dado foi alterado. <a href="?m='.$modulo.'&t=listar">Exibir página</a>','alerta');	
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
		 $tag->elemento('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
			$tag->elemento('fieldset');
				$tag->elemento('legend');
					 echo ($pagina_nome);
				$tag->close('legend');
				
				 $objeto = new $classe();
				$tag->elemento('label');
					echo ('Minha página:');
				$tag->close('label');
				$tag->elemento('br');
				$tag->elemento('textarea','class="ckeditor" id="editor1" name="texto"');
					if($objeto_resp) echo $objeto_resp->texto;
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
						printMsg('Dados deletados com sucesso. <a href="?m='.$modulo.'&t=listar">Exibir página</a>');
						unset($_POST);
					else:
						printMsg('Nenhum dado foi deletado. <a href="?m='.$modulo.'&t=listar">Exibir página</a>','alerta');	
					endif;
				endif;
				$objeto_exibir = new $classe();
				$objeto_exibir->extras_select = " WHERE id=$id";
				$objeto_exibir->seleciona_tudo($objeto_exibir);
				$objeto_resp = $objeto_exibir->retorna_dados();
			endif;
			
		 $tag->elemento('form','class="userForm" method="post" action="" enctype="multipart/form-data" ');
			$tag->elemento('fieldset');
				$tag->elemento('legend');
					 echo ($pagina_nome);
				$tag->close('legend');
				
				 $objeto = new $classe();
				$tag->elemento('label');
					echo ('Minha página:');
				$tag->close('label');
				$tag->elemento('br');
				$tag->elemento('textarea','class="ckeditor" id="editor1" name="texto" disabled="disabled"');
					echo limpar_campo_excluir('texto',$objeto_resp);
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