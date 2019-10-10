<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: logout.php");
}
include 'funcoes/conexao.php';


if(isset($_GET['tiposoftware'])){
    $tiposoftware=$_GET['tiposoftware'];
}else{
    $tipo='0';
}
if(isset($_GET['funcao'])){
    $funcao=$_GET['funcao'];
}else{
    $funcao='0';
}

$sql = "select software.*,tiposoftware.* from software,tiposoftware where software.idtiposoftware = tiposoftware.id order by software.id";
    if(isset($_POST['bt'])){
        $palavra=$_POST['palavra'];
        $sql="select * from software where nome like'%".$palavra."%'";
    }
$rs = mysqli_query($con,$sql);
$sql2 = "select * from tiposoftware order by nome";
        $rs2 = mysqli_query($con,$sql2);

        if($funcao=='abrir'){
   
        $sql3 = "select * from camposoft where idtiposoftware = '$tiposoftware' order by camposoft.idorder";
        $rs3 = mysqli_query($con,$sql3);
        }

?>
<?php include 'cabecalho.php';
    include 'menubar.php';
?>
<div class="container">
        <h2>Incluir novo Software </h2>
        <form class='form-control' action="gravasoft.php" method = "post" >
            <table>
                <tr>
                    <td>Tipo do software</td>
                    <td>
                        <select onChange='window.location.href=this.value'>
                            <?php
                             echo"<option value = '' selected disabled>Selecionar</option> ";
                                while($row = mysqli_fetch_array($rs2)) {
                                    $id=$row['id'];
                                    $nome = $row['nome'];
                                    if($id==$tiposoftware){
                                    echo"<option value = '?tiposoftware=$id&funcao=abrir' selected>$nome</option> ";
                                    }else{
                                        echo"<option value = '?tiposoftware=$id&funcao=abrir' >$nome</option> ";
                                    }
                                }
                            ?>
                            <input name="tiposoftware" type="hidden" value="<?php echo $tiposoftware; ?>"/>
                    </td>

                </tr>
                <?php 
                    if($funcao=='abrir'){

                    while($row3 = mysqli_fetch_array($rs3)) {
                    
                ?>
                        <tr>
                            <td><?php echo $row3['campoformsoft']; ?></td>
                            <td><input name="<?php echo $row3['camposoft']; ?>" type="text" required /> </td>
                        </tr>
                <?php }
                    }
                if($funcao=='abrir'){?>
                    <tr>
                    <td></td>
                    <td><input class="btn" name="bt" type="submit" value="gravar"/> </td>
                </tr>
                <?php } ?>
            </table>
        </form>
        </div>
    </body>
</html>