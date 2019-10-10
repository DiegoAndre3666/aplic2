<?php 
    session_start();
    //if(!isset($_SESSION['id'])){
      //  header("location: logout.php");
    //}
    include 'funcoes/conexao.php';
    
    if(isset($_GET['tiposoftware'])){
        $tiposoftware=$_GET['tiposoftware'];
    }else{
        $tiposoftware='0';
    }
    if(isset($_GET['funcao'])){
        $funcao=$_GET['funcao'];
    }else{
        $funcao='0';
    }

    
   
    $sql = "select * from software where idtiposoftware = '".$tiposoftware."'";
        if(isset($_POST['bt'])){
            $palavra=$_POST['palavra'];
            $sql = "select * from software where nome_host like '%".$palavra."%' or nome like '%".$palavra."%'  order by software.id";
        }
    $rs = mysqli_query($con,$sql);
    
    $sql2 = "select * from tiposoftware order by nome";
            $rs2 = mysqli_query($con,$sql2);

            $sql3 = "select * from camposoft where idtiposoftware = '$tiposoftware' order by camposoft.idorder";
            $rs3 = mysqli_query($con,$sql3);
            
?>

    <div class="container">
       
        <?php
        if($funcao=='abrir'){

        ?>
        <table border="1">
            <tr> 
            <th>ID</th>
            <?php while($row3 = mysqli_fetch_array($rs3)) { echo' <th>'.$row3['campoformsoft'].'</th>';}?> 
                
            </tr>
                  
            <?php

            while($row=mysqli_fetch_array($rs)){
            

                $sql4 = "select * from camposoft where idtiposoftware = '".$row['idtiposoftware']."' order by camposoft.idorder";
                $rs4 = mysqli_query($con,$sql4);
            ?>

                <tr>
                <?php 
                echo'<td>'.$row['id'].'</td>';
                while($row4 = mysqli_fetch_array($rs4)) {
                    
                    echo'<td>'.$row[$row4['camposoft']].'</td>';                    
                    
                    }
                    
                    ?>
                    
                  
                    
                </tr>
                <?php
            
            }
    echo"</table>";}else{
        echo"Total de Softwares: ";
    }
    echo"</div></body></html>";
?>    
