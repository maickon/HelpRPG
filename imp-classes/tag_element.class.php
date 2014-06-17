<?php

/**
 * HelpRPG, Um site criado com intuito de ajudar os mestre de RPG que jogam no sistema d20.
 *
 * @author    Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @copyright 2012-2013 Maickon José Rangel <maickonmaickonmaickon@Gmaicl.com>
 * @version   1.2
 * @link      https://github.com/maickon/HelpRPG
 */

class TagElement{
	
	function hr($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<hr '.$class_.' '.$id_.' />';
	}
	function br($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<br '.$class_.' '.$id_.' />';
	}
	function img($src = '',$class = '',$id = '', $alt=''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		(!empty($src))   ? $src_ = 'src="'.$src.'"' : $src_='';
		(!empty($alt))   ? $alt_ = 'alt="'.$alt.'"' : $alt_='';
		print '<img '.$src_.' '.$class_.' '.$id_.' '.$alt.' />';
	}
	
	function div($class = '',$id = '', $align = '', $orbit=''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		(!empty($align)) ? $align_ = 'align="'.$align.'"' : $align_='';
		(!empty($orbit)) ? $orbit_ = 'data-orbit' : $orbit_=' ';
		print '<div '.$class_.' '.$id_.' '.$align_.' '.$orbit_.'>';
	}
	
	function Cdiv(){
		print '</div>';
	}
	
	function head(){
		print '<head>';
	}
	
	function Chead(){
		print '</head>';
	}
	
	function title(){
		print '<title>';
	}
	
	function Ctitle(){
		print '</title>';
	}
	
	function body(){
		print '<body>';
	}
	
	function Cbody(){
		print '</body>';
	}
	
	function html(){
		print '<html>';
	}
	
	function Chtml(){
		print '</html>';
	}
	
	function meta($charset='', $name='', $content=''){
		(!empty($charset)) 	 ? $charset_ = 'content="'.$charset.'"' : $charset_='';
		(!empty($name))	 	 ? $name_ = 'name="'.$name.'"' : $name_=' ';
		(!empty($content))	 ? $content_ = 'content="'.$content.'"' : $content_=' ';
		print '<meta '.$charset_.' '.$name_.' '.$content_.' />';
	}
	
	function link($rel='', $type='', $href=''){
		(!empty($rel)) 	 ? $rel_ = 'rel="'.$rel.'"' : $rel_='';
		(!empty($type))	 ? $type_ = 'type="'.$type.'"' : $type_=' ';
		(!empty($href))	 ? $href_ = 'href="'.$href.'"' : $href_=' ';
		print '<link '.$rel_.' '.$type_.' '.$href_.' />';
	}
	
	function script($type='', $src=''){
		(!empty($type))	 ? $type_ = 'type="'.$type.'"' : $type_=' ';
		(!empty($src)) 	 ? $src_ = 'src="'.$src.'"' : $src_='';
		print '<script '.$type_.' '.$src_.' />';
	}
	
	function Cscript(){
		print '</script>';
	}
	
	function ul($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<ul '.$class_.' '.$id_.' />';
	}
	
	function Cul(){
		print '</ul>';
	}
	
	function li($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<li '.$class_.' '.$id_.' />';
	}
	
	function Cli(){
		print '</li>';
	}
	
	function a($href='', $class = '',$id = '', $target='', $title=''){
		(!empty($href))  ? $href_ = 'href="'.$href.'"' : $href_='';
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		(!empty($target)) ? $target_ = 'target="'.$target.'"' : $target_=' ';
		(!empty($title)) ? $title_ = 'title="'.$title.'"' : $title_=' ';
		print '<a '.$href_.' '.$class_.' '.$id_.' '.$title.''.$title_. '>';
	}
	
	function Ca(){
		print '</a>';
	}
	
	function form($action='',$method='', $class='', $enctype='', $name='', $target=''){
		(!empty($action)) ? $action_ = 'action="'.$action.'"' : $action_='';
		(!empty($method)) ? $method_ = 'method="'.$method.'"' : $method_='';
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($enctype))? $enctype_ = 'enctype="'.$enctype.'"' : $enctype_=' ';
		(!empty($name)) ? $name_ = 'method="'.$name.'"' : $name_='';
		(!empty($target))? $target_ = 'target="'.$target.'"' : $target_=' ';
		print '<form '.$action_.' '.$method_.' '.$class_.' '.$enctype_.' '.$name_.' '.$target_.'>';
	}
	
	function Cform(){
		print '</form>';
	}
	
	function label($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<label '.$class_.' '.$id_.'>';
	}
	
	function Clabel(){
		print '</label>';
	}
	
	function input($placeholder='', $alt='', $title='', $name='',$type='', $disabled='', $value='', $size='', $maxlength='', $readonly='',$class=''){
		(!empty($placeholder)) ? $placeholder_ = 'placeholder="'.$placeholder.'"' : $placeholder_='';
		(!empty($alt)) 		   ? $alt_ = 'alt="'.$alt.'"' : $alt_='';
		(!empty($title)) 	   ? $title_ = 'title="'.$title.'"' : $title_='';
		(!empty($name)) 	   ? $name_ = 'name="'.$name.'"' : $name_='';
		(!empty($type)) 	   ? $type_ = 'type="'.$type.'"' : $type_='';
		(!empty($disabled))	   ? $disabled_ = 'disabled' : $disabled_='';
		(!empty($value)) 	   ? $value_ = 'value="'.$value.'"' : $value_='';
		(!empty($size))		   ? $size_ = 'size="'.$size.'"' : $size_='';
		(!empty($maxlength))   ? $maxlength_ = 'maxlength="'.$maxlength.'"' : $maxlength_='';
		(!empty($readonly))	   ? $readonly_ = 'readonly="true"' : $readonly_='';
		(!empty($class))	   ? $class_ = 'class="'.$class.'"' : $class_='';
		print '<input '.$placeholder_.' '.$alt_.' '.$title_.' '.$name_.' '.$type_.' '.$disabled_.' '.$value_.' '.$size_.' '.$maxlength_.' '.$readonly_.' '.$class_.' />';
	}
	
	function h1($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<h1 '.$class_.' '.$id_.' />';
	}
	
	function Ch1(){
		print '</h1>';
	}
	
	function h2($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<h2 '.$class_.' '.$id_.' />';
	}
	
	function Ch2(){
		print '</h2>';
	}
	
	function h3($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<h3 '.$class_.' '.$id_.' />';
	}
	
	function Ch3(){
		print '</h3>';
	}
	
	function h4($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<h4 '.$class_.' '.$id_.' />';
	}
	
	function Ch4(){
		print '</h4>';
	}
	
	function h5($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<h5 '.$class_.' '.$id_.' />';
	}
	
	function Ch5(){
		print '</h5>';
	}
	
	function h6($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<h6 '.$class_.' '.$id_.' />';
	}
	
	function Ch6(){
		print '</h6>';
	}
	
	function nav($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<nav '.$class_.' '.$id_.' />';
	}
	
	function Cnav(){
		print '</nav>';
	}
	
	function section ($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<section  '.$class_.' '.$id_.' />';
	}
	
	function Csection(){
		print '</section>';
	}
	
	function span($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<span  '.$class_.' '.$id_.' />';
	}
	
	function Cspan(){
		print '</span>';
	}
	
	function p($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<p '.$class_.' '.$id_.' />';
	}
	
	function Cp(){
		print '</p>';
	}
	
	function b($class = '',$id = ''){
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		print '<b '.$class_.' '.$id_.' />';
	}
	
	function Cb(){
		print '</b>';
	}
	
	function loadCss($arquivo=null, $media='screen', $import=false){
	if($arquivo != null):
		if($import == true):
			echo '<style type="text/css">@import url("'.BASEURL.CSSPATH.$arquivo.'.css");</style>';
		else:
			echo '<link rel="stylesheet" type="text/css" href="'.BASEURL.CSSPATH.$arquivo.'.css" media="'.$media.'" />';
		endif;
	endif;
	}
	
	function loadJs($arquivo=null, $remoto=false){
		if($arquivo != null):
			if($remoto == false) $arquivo = JSPATH.$arquivo.'.js';
				echo '<script type="text/javascript" src="'.$arquivo.'"></script>';		
		endif;
	}
	
	function loadCkEditor($arquivo=null, $remoto=false){
		if($arquivo != null):
			if($remoto == false) $arquivo = $arquivo.'.js';
				echo '<script type="text/javascript" src="'.$arquivo.'"></script>';		
		endif;
	}
	
	function select($style='',$id='',$class='',$name=''){
		(!empty($style)) ? $style_ = 'style="'.$style.'"' : $style_='';
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		(!empty($name))	 ? $name_ = 'name="'.$name.'"' : $name_=' ';
		print '<select '.$style_.' '.$class_.' '.$id_.' '.$name_.' >';
	}
	
	function Cselect(){
		print '</select>';
	}
	
	function option($selecionado='', $value=''){
		(!empty($selecionado)) ? $selecionado_ = 'SELECTED="'.$selecionado.'"' : $selecionado_='';	
		(!empty($value)) ? $value_ = 'value="'.$value.'"' : $value_='';	
		print '<option '.$selecionado_.' '.$value_.' >';
	}
	
	function Coption(){
		print '</option>';
	}
	
	function dropdiv($href='',$class = '',$id = '', $align = '', $orbit=''){
		(!empty($href)) ? $href_ = 'href="'.$href.'"' : $href_='';
		(!empty($class)) ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($id))	 ? $id_ = 'id="'.$id.'"' : $id_=' ';
		(!empty($align)) ? $align_ = 'align="'.$align.'"' : $align_='';
		(!empty($orbit)) ? $orbit_ = 'data-orbit' : $orbit_=' ';
		print '<div '.$href_.' '.$class_.' '.$id_.' '.$align_.' '.$orbit_.'>';
	}
	
	function Cdropdiv(){
		print '</div>';
	}
	
	function text_area($placeholder='', $class='', $alt='', $title='', $name='',$type='', $disabled='', $value='', $size='', $maxlength='', $readonly=''){
		(!empty($placeholder)) ? $placeholder_ = 'placeholder="'.$placeholder.'"' : $placeholder_='';
		(!empty($class)) 	   ? $class_ = 'class="'.$class.'"' : $class_='';
		(!empty($alt)) 		   ? $alt_ = 'alt="'.$alt.'"' : $alt_='';
		(!empty($title)) 	   ? $title_ = 'title="'.$title.'"' : $title_='';
		(!empty($name)) 	   ? $name_ = 'name="'.$name.'"' : $name_='';
		(!empty($type)) 	   ? $type_ = 'type="'.$type.'"' : $type_='';
		(!empty($disabled))	   ? $disabled_ = 'disabled' : $disabled_='';
		(!empty($value)) 	   ? $value_ = 'value="'.$value.'"' : $value_='';
		(!empty($size))		   ? $size_ = 'size="'.$size.'"' : $size_='';
		(!empty($maxlength))   ? $maxlength_ = 'maxlength="'.$maxlength.'"' : $maxlength_='';
		(!empty($readonly))	   ? $readonly_ = 'readonly="true"' : $readonly_='';
		print '<textarea '.$placeholder_.' '.$class_.' '.$alt_.' '.$title_.' '.$name_.' '.$type_.' '.$disabled_.' '.$value_.' '.$size_.' '.$maxlength_.' '.$readonly_.' >';
	}
	
	function Ctext_area(){
		print '</textarea>';
	}
	
	function submit($name='',$type='',$value='',$class=''){
		(!empty($name)) 	? $name_ = 'name="'.$name.'"' : $name_='';
		(!empty($type)) 	? $type_ = 'type="'.$type.'"' : $type_='';
		(!empty($value)) 	? $value_ = 'value="'.$value.'"' : $value_='';
		(!empty($class)) 	? $class_ = 'class="'.$class.'"' : $class_='';
		
		print '<input '.$name_.' '.$type_.' '.$value_.' '.$class_.' />';
	}
	
	function fieldset($class='', $id=''){
		(!empty($id)) 		? $id_ = 'id="'.$id.'"' : $id_='';
		(!empty($class)) 	? $class_ = 'class="'.$class.'"' : $class_='';
		
		print '<fieldset '.$class_.' '.$id_.' >';
	}
	
	function Cfieldset(){
		print '</fieldset>';
	}
	
	function legend($class='', $id=''){
		(!empty($id)) 		? $id_ = 'id="'.$id.'"' : $id_='';
		(!empty($class)) 	? $class_ = 'class="'.$class.'"' : $class_='';
		
		print '<legend '.$class_.' '.$id_.' >';
	}
	
	function Clegend(){
		print '</legend>';
	}
}

?>