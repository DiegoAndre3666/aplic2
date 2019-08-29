<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: logout.php");
    }
    include 'funcoes/conexao.php';
    $con = getConexao();
    $sql = "select * from tipo order by tipo.id";
        if(isset($_POST['bt'])){
            $palavra=$_POST['palavra'];
            $sql = "select tipo.*,equipamento.descricao, equipamento.id as equipamento from equipamento,tipo where equipamento.idtipo =tipo.id and nome like '%".$palavra."%' order by .id";
            
        }
    $rs = mysqli_query($con,$sql);
        include 'cabecalho.php';
        include 'menubar.php';
?>
    <div class="container">
        <form action="gravaequipamentos.php"method="POST">
            <input type="text" name="palavra" size="30"/>
            <input class='btn' type="submit" name="bt" value="buscar"/>
        <a class="btn" href='cadastroequipamentos.php'>Cancelar</a>

        </form>
        <a class="btn" href="gravaquipamentos.php"> + NOVO EQUIPAMENTO </a>
        <p></P>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>DESCRICAO</th>
                <th>STATUS</th>
                <th>EXCLUIR</th>
                <th>EDITAR</th>
            </tr>
                  
            <?php

            while($row=mysqli_fetch_array($rs)){
            $id=$row['id'];
            $nome=$row['nome'];
            $marca=$row['marca'];
            $modelo=$row['modelo']
            $descricao=$row['descricao'];
            $status=$row['status'];
            ?>

                <tr>
                    <td><?=$id;?></td>
                    <td><?=$nome;?></td>
                    <td><?=$marca;?></td>
                    <td><?=$modelo;?></td>
                    <td><?=$descricao;?></td>
                    <td><?=$status;?></td>
                    <td><a href="excluirequipamneto.php?id=<?=$id;?>"><i class="material-icons ">delete</i></a></li></a></td>
                    <td><a href="formeditequipamento.php?id=<?=$id;?>"><i class="material-icons ">edit</i></a></li></a></td>
                </tr>
                <?php
            
            }
    echo"</table></div></body></html>";
?>    