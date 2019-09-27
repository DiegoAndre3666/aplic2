<?php
    include 'funcoes/conexao.php';

    $nome_host = $_POST['nome_host'];
    $ip = $_POST['ip'];
    $processador = $_POST['processador'];
    $memoria = $_POST['memoria'];
    $patrimonial = $_POST['patrimonial'];
    $dominio = $_POST['dominio'];
    $servicetag= $_POST['servicetag'];
    $NF = $_POST['NF'];
    $serial = $_POST['serial'];
    $portas = $_POST['portas'];
    $marca = $_POST ['marca'];
    $modelo = $_POST['modelo'];
    $descricao = $_POST['descricao'];
    $status = $_POST['status'];
    $tipoarmazenamento = $_POST['tipoarmazenamento'];
    $tamanhoarmazenamento = $_POST['tamanhoarmazenamento'];
    $proprietario = $_POST['proprietario'];
    $Ventrada = $_POST['Ventrada'];
    $Vsaida = $_POST['Vsaida'];
    $KVA = $_POST['KVA'];
    $DTcompra = $_POST['DTcompra'];
    $DTinstalacao = $_POST['DTinstalacao'];
    $DTultManut = $_POST['DTultManut'];
    $chaveRSA = $_POST['chaveRSA'];
    $idtipo = $_POST['tipo'];

    $con = getConexao();
    $sql = "insert into equipamento(
                    nome_host,
                    ip,
                    processador,
                    memoria,
                    patrimonial,
                    dominio,
                    servicetag,
                    marca,
                    modelo,
                    serial,
                    NF,
                    portas,
                    descricao,
                    idtipo,
                    tipoarmazenamento,
                    tamanhoarmazenamento,
                    status)values(
                    '$nome_host',
                    '$ip',
                    '$processador',
                    '$memoria',
                    '$patrimonial',
                    '$dominio',
                    '$servicetag',
                    '$marca',
                    '$modelo',
                    '$serial',
                    '$NF',
                    '$portas',
                    '$descricao',
                    '$idtipo',
                    '$tipoarmazenamento',
                    '$tamanhoarmazenamento',
                    '$status')";
  
    //mysqli_query($con,$sql);
    if(!mysqli_query($con, $sql)){
        echo ("Erro" . mysqli_errno($con));
    }
     header("Location: listaequip.php");

?>