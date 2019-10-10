<?php
    include 'funcoes/conexao.php';

    
    $nome = $_POST['nome'];
    $chave = $_POST['chave'];
    $descricao = $_POST['descricao'];
    $qtd = $_POST['qtd'];
    $volume = $_POST['volume'];
    $idtiposoftware = $_POST['tiposoftware'];
    $status = $_POST['status'];
    $nome_host = $_POST['nome_host'];
      
    //$con = getConexao();
    $sql = "insert into software(nome,chave,descricao,qtd,volume,idtiposoftware,status,nome_host)values(
                    '$nome',
                    '$chave',
                    '$descricao',
                    '$qtd',
                    '$volume',
                    '$idtiposoftware',
                    '$status',
                    '$nome_host')";
  
    //mysqli_query($con,$sql);
    //if(!mysqli_query($con, $sql)){
      //  echo ("Erro" . mysqli_errno($con));
    //}
    header("Location: listasoft.php");

?>