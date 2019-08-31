<?php
function getConexao(){
    $dbi=mysqli_connect("localhost","root","","diego_inventario")or die("conexao falhou!");
        return $dbi;
}