<?php

session_start();
	
	if(!isset($_SESSION['id'])){
		header("Location: logout.php");
	}
	include 'funcoes/conexao.php';
	$id = $_GET['id'];
	$con = getConexao();
	$sql = "select * from usuario where id = $id";
	
	$rs  = mysqli_query($con,$sql);
	
	
		while($row = mysqli_fetch_array($rs)){
			$nome = $row ['nome'];
			$email = $row ['email'];
            $fone = $row ['ramal'];
            $fone = $row ['dpto'];
			
			break;
        }
        $sql2 = "select * from dpto";
        $rs2 = mysqli_query($con,$sql2);
        
	include 'cabecalho.php';
	include 'menubar.php';

?>
	<div class="container">
	<form action = "atualizauser.php" method = "post">

		<table>
			<tr><td>Id </td><td><input type= "text" name= "id" value= "<?=$id;?>"/> </td></tr>
			<tr><td>Nome </td><td><input type= "text" name= "nome" value= "<?=$nome;?>"/> </td></tr>
			<tr><td>Email </td><td><input type= "text" name= "email" value= "<?=$email;?>"/> </td></tr>
			<tr><td>Ramal </td><td><input type= "text" name= "Ramal" value= "<?=$ramal;?>"/> </td></tr>
            <tr><td>Departamento </td><td><input type= "text" name= "dpto" value= "<?=$Nome;?>"/> </td></tr>
			
			<tr><td>Departamento</td><td><select name="idcurso" class="browser-defalt">
			<?php
                    while ($row = mysqli_fetch_array($rs2))
					{
						$id = $row['id'];
						$Nome = $row['dpto'];
						
						if($id !=$id){
							
							echo "<option value=".$id.">".$Nome."</option>";

						}else{
							echo "<option value=".$id."  selected='selected'>".$Nome."</option>";

						}
					}
			?>
			</select>
			
			<tr><td></td><td><input class="btn" name="bt" type="submit" value="gravar" /> </td></tr>
		</table>
	</form>
	</div>
</body>
</html>
	
	