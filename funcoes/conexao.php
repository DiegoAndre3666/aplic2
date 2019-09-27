<?php
function getConexao(){
    $dbi=mysqli_connect("localhost","root","","diego_inventario")or die("conexao falhou!");
   

    return $dbi;
}
$con = getConexao();
mysqli_query($con,"SET NAMES 'utf8'");         
mysqli_query($con,'SET character_set_connection=utf8');         
mysqli_query($con,'SET character_set_client=utf8');         
mysqli_query($con,'SET character_set_results=utf8');
