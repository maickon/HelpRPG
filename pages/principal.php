<?php
$pics = slect_list();

$tag->elemento('div','class="large-4 columns"');	
	$tag->elemento('div','class="featured" data-orbit');
		for($i=0; $i <= count($pics); $i++):
			if(isset($pics[$i])):
				$tag->elemento('img','src="'.BASEURL.'img/slide/'.$pics[$i].'" id="img_slide"');
			 endif;    
		endfor;
	$tag->close('div');	  
 $tag->close('div');

$tag->elemento('div','class="large-8 columns"');
	
	$tag->elemento('div','class="large-12 columns"');
		$tag->elemento('div','class="large-6 columns" align="left"');
			$tag->elemento('a','href="index.php"');
				$tag->elemento('img','src="img/helpRpg.png" class="help_rpg"');
			$tag->close('a');	
		$tag->close('div');
			
		$tag->elemento('div','class="large-6 columns" align="right"');	   
			$tag->elemento('h5');
				echo utf8_decode('Visitantes');
			$tag->close('h5');
			$tag->elemento('script','type="text/javascript" src="http://counter3.statcounterfree.com/private/counter.js?c=e1a2606a166e15b5deb0a15f9ac479ea"');
			$tag->close('script');
		$tag->close('div');
	$tag->close('div');
			   
	$tag->elemento('h5');
		$tag->elemento('p');
			exibir_pagina($home_page='home_page',$classe='home_page'); 
		$tag->close('p');
		
		
	$tag->close('h5');	
$tag->close('div');

$tag->elemento('div','class="large-8 columns"');	
		
$tag->close('div');			 
?>