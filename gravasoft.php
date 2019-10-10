<?php
    include 'funcoes/conexao.php';

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $chave = $_POST['chave'];
    $descricao = $_POST['descricao'];
    $qtd = $_POST['qtd'];
    $volume = $_POST['volume'];
    $idtiposoftware = $_POST['idtiposoftware'];
    $status = $_POST['status'];
    $nome_host = $_POST['nome_host'];
      
    //$con = getConexao();
    $sql = "insert into equipamento(id,nome,chave,descricao,qtd,volume,idtiposoftware,status,nome_host           )values(
                    '$id',
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
     header("Location: listaequip.php");

?>