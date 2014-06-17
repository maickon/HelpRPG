<?php
//&raquo;

$tag->elemento('div','class="small-2 large-12 columns"');	
	$pages = array('Armas Comuns &rArr;','Armas Simples &rArr;','Armas Exóticas &rArr;','Armas Mágicas &rArr;');
	$links = array('?p=armas&a=armas_comuns','?p=armas&a=armas_simples','?p=armas&a=armas_exoticas','?p=armas&a=armas_magicas');
	
	$tag->elemento('div','class="small-2 large-6 columns"');
		$tag->elemento('ul','class="inline-list"');
			for($i=0; $i<count($pages); $i++):
				$tag->elemento('li');
					$tag->elemento('a','href="'.$links[$i].'" class="link"');					
						$tag->elemento('b');
							echo utf8_decode($pages[$i]);
						$tag->close('b');					
					$tag->close('a');
				$tag->close('li');
			endfor;
		$tag->close('ul');
	$tag->close('div');
	
	if(!isset($_GET['a'])):
		$_GET['a'] = 'armas_comuns';
	endif;
	
	$tag->elemento('form','action="?p=armas&a='.$_GET['a'].'" method="post" class="custom"');
		$tag->elemento('div','class="small-2 large-6 columns"');
			$tag->elemento('div','class="small-2 large-7 columns"');
				$tag->elemento('label');
					echo 'Buscar arma?';
				$tag->close('label');
				$tag->elemento('input','type="text" name="nome"');	
			$tag->close('div');	
			
			$tag->elemento('div','class="small-2 large-5 columns"');
				$tag->elemento('br','','/');
				$tag->elemento('ul','class="inline-list"');
					$tag->elemento('li');
						$tag->elemento('input','name="botao" type="submit" value="Buscar" class="small button"');
					$tag->close('li');			
				$tag->close('ul');	
			$tag->close('div');
		$tag->close('div');
	$tag->close('form');
$tag->close('div');

if(isset($_GET['a'])):
	$a = $_GET['a'];
else:
	$a = '';
endif;

$num = 3; 
			
$pg = exibir_armas('armas','armas',$num,true,categoria(isset($_GET['a'])?$_GET['a']:'armas_comuns'),$a,$num);  // pega o tipo no BD

?>