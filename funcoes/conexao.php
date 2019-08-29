<?php
function getConexao(){
    $dbi=mysqli_connect("localhost","root","","inventario")or die("conexao falhou!");
        return $dbi;
}