<?php
    function validauser($email2){

        include 'funcoes/conexao.php';
       
        $sql = "select email from usuarios where email='".$email2."'";
        $result=mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($result);
        if($rowcount>0){
            return true;
        }else{
            return false;
        }
    }
   
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $ramal = $_POST['ramal'];
    //$senha = $_POST['senha'];
    $acesso = $_POST['acesso'];
    $iddpto = $_POST['id'];

   if(validauser($email)){
        
       echo "<script>alert('E-mail já cadastrado!');</script>";
       echo "<script>history.go(-1)</script>";
   }else{
    echo "<script>alert('Usuário cadastrado com Sucesso!');</script>";
      // echo 'vou gravar';
   
    $sql= "insert into usuarios(nome,email,ramal,senha,acesso,iddpto)values('".$name."','".$email."','".$ramal."','0','".$acesso."','".$iddpto."')";
    mysqli_query($con,$sql);
    header("Location: listauser.php");
   }

   
?>