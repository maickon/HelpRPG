<?php

define("BASEPATH",dirname(__FILE__)."/");
//define("BASEURL","http://helprpg.orgfree.com/");
define("BASEURL","http://127.0.0.1/Zend/HelpRpg/");
//define("BASEURL","http://helprpg.com.br/");
define("ADMURL","/painel-adm.php");
define("CLASSESPATH","classes/");
define("BLOGPATH","img/blog/");
define("IMPCLASSESPATH","imp-classes/");
define("MODULOSPATH","modulos/");
define("PAGEPATH","pages/");
define("CSSPATH","css/");
define("JSPATH","js/");
define('CKEDITORPATH',"ckeditor/");

//database
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "help_rpg");

//define("DBHOST", "mysql06.redehost.com.br");
//define("DBUSER", "help_rpg");
//define("DBPASS", "Helprpg201327");	
//define("DBNAME", "help_rpg");


define('FATOR_ANO', (365 * 60 * 60 * 24));
define('FATOR_MES', (30 * 60 * 60 * 24));
define('FATOR_DIA', (60 * 60 * 24));
define('FATOR_HORA', (60 * 60));
define('FATOR_MINUTO', 60);

?>