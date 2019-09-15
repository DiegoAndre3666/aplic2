<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: logout.php");
    }
    include 'funcoes/conexao.php';
    $con = getConexao();
    
    $sql = "select usuarios.*,dpto.Nome, usuarios.id as iduser from usuarios,dpto where usuarios.iddpto=dpto.id order by usuarios.nome";
        if(isset($_POST['bt'])){
            $palavra=$_POST['palavra'];
            $sql = "select usuarios.*,dpto.Nome, usuarios.id as iduser from usuarios,dpto where usuarios.iddpro =dpto.id and nome like '%".$palavra."%' order by usuarios.id";
            
        }
    $rs = mysqli_query($con,$sql);
?>
<?php include 'cabecalho.php';
        include 'menubar.php';
?>
    <div class="container">
        <form action="listauser.php"method="POST">
            <input type="text" name="palavra" size="30"/>
            <input class='btn' type="submit" name="bt" value="buscar"/>
        <a class="btn" href='listauser.php'>Cancelar</a>

        </form>
        <a href="formuser.php"> + NOVO USUÁRIO </a>
        <p></P>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>E-MAIL</th>
                <th>RAMAL</th>
                <th>NÍVEL ACESSO</th>
                <th>DEPARTAMENTO</th>
                <th>EXCLUIR</th>
                <th>EDITAR</th>
            </tr>
                  
            <?php

            while($row=mysqli_fetch_array($rs)){
            $id=$row['id'];
            $nome=$row['nome'];
            $email=$row['email'];
            $ramal=$row['ramal'];
            $acesso=$row['acesso'];
            $Nome=$row['Nome'];
            ?>

                <tr>
                    <td><?=$id;?></td>
                    <td><?=$nome;?></td>
                    <td><?=$email;?></td>
                    <td><?=$ramal;?></td>
                    <td><?=$acesso;?></td>
                    <td><?=$Nome;?></td>

                    <td><a href="excluiralunos.php?id=<?=$id;?>"><i class="material-icons ">delete</i></a></li></a></td>
                    <td><a href="formedit.php?id=<?=$id;?>"><i class="material-icons ">edit</i></a></li></a></td>
                </tr>
                <?php
            
            }
    echo"</table></div></body></html>";
?>    
