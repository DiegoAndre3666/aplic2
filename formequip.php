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

$sql = "select equipamento.*,tipo.* from equipamento,tipo where equipamento.idtipo = tipo.id order by equipamento.id";
    if(isset($_POST['bt'])){
        $palavra=$_POST['palavra'];
        $sql="select * from equipamento where nome like'%".$palavra."%'";
    }
$rs = mysqli_query($con,$sql);
$sql2 = "select * from tipo order by nome";
        $rs2 = mysqli_query($con,$sql2);

        if($funcao=='abrir'){

        
        $sql3 = "select * from campoform where idtipo = '$tipo' order by campo asc";
        $rs3 = mysqli_query($con,$sql3);
        }

?>
<?php include 'cabecalho.php';
    include 'menubar.php';
?>
<div class="container">
        <h2>Incluir novo Equipamento </h2>
        <form class='form-control' action="gravaequip.php" method = "post" >
            <table>
                <tr>
                    <td>Tipo do Equipamento</td>
                    <td>
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
                            <input name="tipo" type="hidden" value="<?php echo $tipo; ?>"/>
                    </td>

                </tr>
                <?php 
                    if($funcao=='abrir'){

                    while($row3 = mysqli_fetch_array($rs3)) {
                    
                ?>
                        <tr>
                            <td><?php echo $row3['nomecampo']; ?></td>
                            <td><input name="<?php echo $row3['campo']; ?>" type="text" required /> </td>
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