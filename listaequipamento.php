<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: logout.php");
    }
    include 'funcoes/conexao.php';
    $con = getConexao();
    $sql = "select * from equipamento";
        if(isset($_POST['bt'])){
            $palavra=$_POST['palavra'];
            $sql = "select * from equipamento where nome_host like '%".$palavra."%' or marca like '%".$palavra."%'  order by equipamento.id";
        }
    $rs = mysqli_query($con,$sql);
?>
<?php include 'cabecalho.php';
        include 'menubar.php';
?>
    <div class="container">
        <form action="listaequipamento.php"method="POST">
            <input type="text" name="palavra" size="30"/>
            <input class='btn' type="submit" name="bt" value="buscar"/>
        <a class="btn" href='listaequipamento.php'>Cancelar</a>

        </form>
        <a href="cadastroequipamentos.php"> + NOVO EQUIMMENTO </a>
        <p></P>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME HOST</th>
                <th>MARCA</th>
                <th>MODELO</th>
                <th>IP</th>
                <th>PROCESSADOR</th>
                <th>MEMORIA</th>
                <th>PATRIMONIAL</th>
                <th>DOMINIO</th>
                <th>STATUS</th>
                <th>DESCRICAO</th>
                <th>EXCLUIR</th>
                <th>EDITAR</th>
            </tr>
                  
            <?php

            while($row=mysqli_fetch_array($rs)){
            $id=$row['id'];
            $nome_host=$row['nome_host'];
            $marca=$row['marca'];
            $modelo=$row['modelo'];
            $ip=$row['ip'];
            $processador=$row['processador'];
            $memoria=$row['memoria'];
            $patrimonial=$row['patrimonial'];
            $dominio=$row['dominio'];
            $status=$row['status'];
            $descricao=$row['descricao'];
            ?>

                <tr>
                    <td><?=$id;?></td>
                    <td><?=$nome_host;?></td>
                    <td><?=$marca;?></td>
                    <td><?=$modelo;?></td>
                    <td><?=$ip;?></td>
                    <td><?=$processador;?></td>
                    <td><?=$memoria;?></td>
                    <td><?=$patrimonial;?></td>
              
                    <td><?=$dominio;?></td>
                    <td><?=$status;?></td>
                    <td><?=$descricao;?></td>
                    <td><a href="excluirequipamento.php?id=<?=$id;?>"><i class="material-icons ">delete</i></a></li></a></td>
                    <td><a href="formeditequipamento.php?id=<?=$id;?>"><i class="material-icons ">edit</i></a></li></a></td>
                </tr>
                <?php
            
            }
    echo"</table></div></body></html>";
?>    
