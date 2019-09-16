<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: logout.php");
}
include 'funcoes/conexao.php';

$sql = "select usuarios.*,dpto.* from usuarios,dpto where usuarios.iddpto = dpto.id order by usuarios.id";
    if(isset($_POST['bt'])){
        $palavra=$_POST['palavra'];
        $sql="select * from usuario where nome like'%".$palavra."%'";
    }
$rs = mysqli_query($con,$sql);
$sql2 = "select * from dpto order by Nome";
        $rs2 = mysqli_query($con,$sql2);

?>
<?php include 'cabecalho.php';
    include 'menubar.php';
?>
<div class="container">
        <h2>Incluir novo Usuário </h2>
        <form action="gravauser.php" method="post">
            <table>
                <tr>    
                    <td>Nome</td>
                    <td><input name="nome" type="text"/> </td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td><input name="email" type="text"> </td> 
                </tr>
                <tr>
                    <td>Ramal </td>
                    <td><input name="ramal" type="text"> </td>
                </tr>
                <tr>
                    <td>Nivel de Acesso </td>
                    <td><input name="acesso" type="text"> </td>
                </tr>
                <tr>
                    <td>
                        Departamento
                    </td>
                    <td>
                        <select name="id">
                            <?php
                                while($row = mysqli_fetch_array($rs2)) {
                                    $id=$row['id'];
                                    $Nome = $row['Nome'];
                                    echo"<option value = '$id'>$Nome</option> ";
                                }
                            ?>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="btn" name="bt" type="submit" value="gravar"/> </td>
                </tr>
            </table>
        </form>
        </div>
    </body>
</html>