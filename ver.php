<?php 

require("includes/config.php");
require_once("lang/lang-{$lang}.php");
require("includes/functions.php");
require("includes/error_display.php");

//conect mysql server
$mysql = connectmysql();


//$url='http://www.razalive.com/demoface.php?id=2837&f=.m3u8';

$numero = $_SERVER['QUERY_STRING'];
$pagina="FALSE";

if(is_numeric($numero)){
	$id = $numero;
	$CANAL = existe_404($mysql, $id);
}else{
	//usuario trato de meter algo que no es numero.
	$CANAL = 0;
}

if ($CANAL) {
	//registro encontrado

	//print_r($CANAL);

	$title = "{$PROGNA} - " . $CANAL["nombre"];

	printheader($title);
	adsense();
echo "
<center>

<iframe scrolling=\"no\" frameborder=\"0\" allowtransparency=\"true\" style=\"border:none; overflow:hidden;\" src=\"" . $CANAL["stream_url"] . "\" allowfullscreen=\"\">
</iframe>

</center>";

}else{
	$title = "{$web_error_404}";	

	printheader($title);
	adsense();
	marca_roto($mysql,$id);
	//EXISTE_URL_EXTERNA regreso error 404
	echo "<center>";
	echo "<h1>{$error_404_msg1}</h1>";
	echo "<h2>{$error_404_msg2}</h2>";
	echo "<h3>{$error_404_msg3}</h3>";
	echo "<h3>{$error_404_msg4}</h3>";
	echo "<h3>{$error_404_msg5}</h3>";
	echo "</center>";
}
disqus();
printfooter();
exit;
