<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: logout.php");
    }
    include 'funcoes/conexao.php';
    $con = getConexao();
    $sql = "select * from dpto";
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
        <a href="cadastroequipamentos.php"> + NOVO DEPARTAMENTO </a>
        <p></P>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME DO DEPARTAMENTO</th>
                
                <th>EXCLUIR</th>
                <th>EDITAR</th>
            </tr>
                  
            <?php

            while($row=mysqli_fetch_array($rs)){
            $id=$row['id'];
            $Nome=$row['Nome'];
            
            ?>

                <tr>
                    <td><?=$id;?></td>
                    <td><?=$Nome;?></td>
                 
                    <td><a href="excluirdpto.php?id=<?=$id;?>"><i class="material-icons ">delete</i></a></li></a></td>
                    <td><a href="formeditdpto.php?id=<?=$id;?>"><i class="material-icons ">edit</i></a></li></a></td>
                </tr>
                <?php
            
            }
    echo"</table></div></body></html>";
?>    
