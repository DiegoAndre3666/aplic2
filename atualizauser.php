<?php
    include 'funcoes/conexao.php';
    function validauser($email3){

        //include 'funcoes/conexao.php';
      
        $sql = "select email from usuarios where email='".$email3."'";
        $result=mysqli_query($con,$sql);
        $rowcount=mysqli_num_rows($result);
        if($rowcount>0){
            return true;
        }else{
            return false;
        }
    }
    function validaemail($emailform,$iduser){

        //include 'funcoes/conexao.php';
        
        $sql = "select email from usuarios where id='".$iduser."'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        if($row['email']==$emailform){
            return true;
        }else{
            return false;
        }
    }
    //include 'funcoes/conexao.php';
    $id = $_POST['id'];
   
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $ramal = $_POST['ramal'];
    //$senha = $_POST['senha'];
    $acesso = $_POST['acesso'];
    $iddpto = $_POST['id'];

    if(!validaemail($email,$id)){
        if(validauser($email)){
            
            echo "<script>alert('E-mail já cadastrado!');</script>";
            echo "<script>history.go(-1)</script>";
        }else{ 
        
        // echo 'vou gravar1';
       
        $sql= "update usuarios set nome='$nome',email='$email',ramal='$ramal',senha='0',acesso='$acesso',iddpto='$iddpto' where id = '$id'";
        mysqli_query($con,$sql);
        echo "<script>alert('Usuário atualizado com Sucesso!');</script>";
        header("Location: listauser.php");
        }
    }else{
        
       //  echo 'vou gravar2';
      
        $sql= "update usuarios set nome='$nome',email='$email',ramal='$ramal',senha='0',acesso='$acesso',iddpto='$iddpto' where id = '$id'";
        mysqli_query($con,$sql);
        echo "<script>alert('Usuário atualizado com Sucesso!');</script>";
        header("Location: listauser.php");
    }
 

   
?>