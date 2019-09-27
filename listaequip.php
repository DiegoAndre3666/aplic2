<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: logout.php");
    }
    include 'funcoes/conexao.php';
    
    if(isset($_GET['tipo'])){
        $tipo=$_GET['tipo'];
    }else{
        $tipo='0';
    }
    if(isset($_GET['funcao'])){
        $funcao=$_GET['funcao'];
    }else{
        $funcao='0';
    }


   
    $sql = "select * from equipamento where idtipo = '".$tipo."'";
        if(isset($_POST['bt'])){
            $palavra=$_POST['palavra'];
            $sql = "select * from equipamento where nome_host like '%".$palavra."%' or marca like '%".$palavra."%'  order by equipamento.id";
        }
    $rs = mysqli_query($con,$sql);
    
    $sql2 = "select * from tipo order by nome";
            $rs2 = mysqli_query($con,$sql2);

            $sql3 = "select * from campoform where idtipo = '$tipo' order by campo asc";
            $rs3 = mysqli_query($con,$sql3);
            
?>
<?php include 'cabecalho.php';
        include 'menubar.php';
?>
    <div class="container">
        <form action="listaequipamento.php"method="POST">
            <input type="text" name="palavra" size="30"/>
            <input class='btn' type="submit" name="bt" value="buscar"/>
        <a class="btn" href='listaequipamento.php'>Cancelar</a><br><br>

        <select onChange='window.location.href=this.value'>
                            <?php
                             echo"<option value = '' selected disabled>Selecionar</option> ";
                                while($row = mysqli_fetch_array($rs2)) {
                                    $id=$row['id'];
                                    $nome = $row['nome'];
                                    if($id==$tipo){
                                    echo"<option value = '?tipo=$id&funcao=abrir' selected>$nome</option> ";
                                    }else{
                                        echo"<option value = '?tipo=$id&funcao=abrir' >$nome</option> ";
                                    }
                                }
                            ?>
                        </select> 

        </form>
        <a href="formequip.php" class="btn"> + NOVO EQUIMMENTO </a>
        <p></P>
        <?php
        if($funcao=='abrir'){

        ?>
        <table border="1">
            <tr> 
            <th>ID</th>
            <?php while($row3 = mysqli_fetch_array($rs3)) { echo' <th>'.$row3['nomecampo'].'</th>';}?> 
                
            </tr>
                  
            <?php

            while($row=mysqli_fetch_array($rs)){
            

            $sql4 = "select * from campoform where idtipo = '".$row['idtipo']."' order by campo asc";
            $rs4 = mysqli_query($con,$sql4);
            ?>

                <tr>
                <?php 
                echo'<td>'.$row['id'].'</td>';
                while($row4 = mysqli_fetch_array($rs4)) {
                    
                    echo'<td>'.$row[$row4['campo']].'</td>';
                    
                    
                    }
                    echo'<td><a href="excluirequipamento.php?id='.$row['id'].'"><i class="material-icons ">delete</i></a></li></a></td>
                    <td><a href="formeditequipamento.php?id='.$row['id'].'"><i class="material-icons ">edit</i></a></li></a></td>';
                    ?>
                    
                  
                    
                </tr>
                <?php
            
            }
    echo"</table>";}else{
        echo"Total de Equipamentos: ";
    }
    echo"</div></body></html>";
?>    
