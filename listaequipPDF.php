<?php 
    session_start();
    //if(!isset($_SESSION['id'])){
      //  header("location: logout.php");
    //}
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

    <div class="container">
       
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
                    
                    ?>
                    
                  
                    
                </tr>
                <?php
            
            }
    echo"</table>";}else{
        echo"Total de Equipamentos: ";
    }
    echo"</div></body></html>";
?>    
