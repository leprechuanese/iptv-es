<?php

require("includes/config.php");
require_once("lang/lang-{$lang}.php");
require("includes/functions.php");
require("includes/error_display.php");

//conect mysql server
$mysql = connectmysql();


$pagina_numero = $_SERVER['QUERY_STRING'];

$pagina="FALSE";

if(is_numeric($pagina_numero)){
    $pagina = $pagina_numero;
} //else{
    //$f = explode("&", $pagina_numero);
    //if(!@$f[1]){
    //    if($pagina_numero != ""){
    //        header("Location: ./?" . rand(1, getTotalFactoNumber($mysql)) . "&" . $pagina_numero );
    //    }else{
    //        header("Location: ./?" . rand(1, getTotalFactoNumber($mysql)));
    //    }
    //}else{
    //    if(is_numeric($f[1])){
    //        $person = $f[0];
    //        $pagina = getfactov2($f[1], $mysql);
    //    }else{
    //        $person = $f[1];
    //        $pagina = getfactov2($f[0], $mysql);
    //    }
    //}
///}


$title = "{$pag_titulo}";



printheader($title);
printmosaicbody1($pagina,$mysql);
disqus();
adsense();
printfooter();
exit;
