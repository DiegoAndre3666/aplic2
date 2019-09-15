<?php
    session_start();
    include 'funcoes/conexao.php';
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    
    $con = getConexao();
    $sql = "select * from usuarios where nome = '$nome' and senha = '$senha'";
    $rs = mysqli_query($con,$sql);
    
    if($row = mysqli_fetch_array($rs)){
     $_SESSION['id'] = $row['id'];
     $_SESSION['nome'] = $row['nome'];
     header("location: menu.php");
    }else{
        header("location: login.php");
    }
?>