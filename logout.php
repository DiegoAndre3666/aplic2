<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');

function geralog($usuario){
	$ip = $_SERVER['REMOTE_ADDR'];
	$hora = date ("h:i:s");
	$data = date ("y-m-d");
	
	$linha = $ip."-".$data."-".$hora."-".$usuario." saiu".PHP_EOL;
	file_put_contents('temp/ascessolog',$linha,FILE_APPEND);
	
}

geralog($_SESSION['nome']);
unset($_SESSION['id']);
session_destroy();
header('Location: login.php');
?>
	