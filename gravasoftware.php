<?php
    include 'funcoes/conexao.php';
    $name = $_POST['nome'];
    $chave = $_POST ['chave'];
    $status = $_POST['status'];
    $volume = $_POST['volume'];
    $quantidade = $_POST['quantidade'];
    $descricao = $_POST['descricao'];

    $con = getConexao();
    $sql= "insert into software(nome,chave,status,volume,quantide,descricao)values('$name','$chave','$status',$ivolume,'$quantidade','$descricao')";
    mysqli_query($con,$sql);
    header("Location: listasoftware.php");
?>