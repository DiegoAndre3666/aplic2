<?php
    include 'funcoes/conexao.php';
    $name = $_POST['nome'];
    $email = $_POST ['email'];
    $fone = $_POST['ramal'];
    $senha = $_POST['senha'];
    $acesso = $_POST['acesso'];
    $iddpto = $_POST['dpto'];

    $con = getConexao();
    $sql= "insert into usuarios('nome','email','ramal','senha','acesso','iddpto')values('$name','$email','$fone','$senha','$acesso','$iddpto')";
    mysqli_query($con,$sql);
    header("Location: listauser.php");
?>