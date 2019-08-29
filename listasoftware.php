<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: logout.php");
    }
    include 'funcoes/conexao.php';
    $con = getConexao();
    $sql = "select * software";
        if(isset($_POST['bt'])){
            $palavra=$_POST['palavra'];
            $sql = "select * software and nome like '%".$palavra."%' order by software.id";
            
        }
    $rs = mysqli_query($con,$sql);
?>
<?php include 'cabecalho.php';
        include 'menubar.php';
?>
    <div class="container">
        <form action="listasoftware.php"method="POST">
            <input type="text" name="palavra" size="30"/>
            <input class='btn' type="submit" name="bt" value="buscar"/>
        <a class="btn" href='listasoftware.php'>Cancelar</a>

        </form>
        <a href="cadastrosoftware.php"> + NOVO SOFTWARE </a>
        <p></P>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>CHAVE</th>
                <th>DESCRICAO</th>
                <th>VOLUME</th>
                <th>QUANTIDADE</th>
                <th>STATUS</th>
                <th>EXCLUIR</th>
                <th>EDITAR</th>
            </tr>
                  
            <?php

            while($row=mysqli_fetch_array($rs)){
            $id=$row['id'];
            $nome=$row['nome'];
            $chave=$row['chave'];
            $descricao=$row['descricao'];
            $volume = $row['volume'];
            $quantidade = $row['quantidade'];
            $status = $row['status'];
            ?>

                <tr>
                    <td><?=$id;?></td>
                    <td><?=$nome;?></td>
                    <td><?=$chave;?></td>
                    <td><?=$descricao;?></td>
                    <td><?=$volume;?></td>
                    <td><?=$quantidade;?></td>
                    <td><?=$status;?></td>



                    <td><a href="excluirsoftware.php?id=<?=$id;?>"><i class="material-icons ">delete</i></a></li></a></td>
                    <td><a href="editarsoftware.php?id=<?=$id;?>"><i class="material-icons ">editar</i></a></li></a></td>
                </tr>
                <?php
            
            }
    echo"</table></div></body></html>";
?>    
