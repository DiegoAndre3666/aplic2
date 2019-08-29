<?php
    include 'funcoes/conexao.php';
    $name = $_POST['nome'];
    $marca = $_POST ['marca'];
    $modelo = $_POST['modelo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];

    $con = getConexao();
    $sql= "insert into tipo(nome,marca,modelo,descricao,status)values('$name','$marca','$modelo',$descricao,$status)";
    mysqli_query($con,$sql);
    header("Location: listaequipamento.php");
?>