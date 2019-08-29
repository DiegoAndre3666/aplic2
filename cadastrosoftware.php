<?php 
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: logout.php");
    }
    include 'funcoes/conexao.php';
    $con = getConexao();
    $sql = "insert into";
        if(isset($_POST['bt'])){
            $palavra=$_POST['palavra'];
            $sql = "select equipamento.*,tipo.descricao, equipamento.id as idequipamento from equipamento,tipo where equipamento.idtipo =tipo.id and nome like '%".$palavra."%' order by equipamento.id";
            
        }
    $rs = mysqli_query($con,$sql);
    $sql2 = 'select descricao from software where tipo = $tipo';
        $rs2 = mysqli_query($con,$sql2);

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cadastro de Software</title>
  </head>
  <body>
    <div class="container">
        <h1>Cadastro de Software</h1>
        <form>
                <div class="form-group" action="gravasoftware.php" method="post">
                <div class="form-check">
                    <div class="row">
                    <div class="col-2">
                    <input class="form-check-input" type="radio" name="tipo" value="1" />
                    <label class="form-check-label" for="1">Windows</label>
                    </div>
                    <div class="col-2"> 
                    <input class="form-check-input" type="radio" name="tipo" value="2" />
                    <label class="form-check-label" for="2">Office</label>
                    </div>
                    <div class="col-2">
                    <input class="form-check-input" type="radio" name="tipo" value="3" />
                    <label class="form-check-label" for="3">Outros</label>
                    </div>
                    </div>
                </div>
                <form>
                <div class="form-group">    
                    <label for="exampleFormControlSelect1">Selecione modelo do Software</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <?php
                                while($row = mysqli_fetch_array($rs2)) {
                                    $tipo=$row['tipo'];
                                    $descricao = $row['descricao'];
                                    echo"<option value = '$tipo'>$descricao</option> ";
                                }
                            ?>

                        </select>
                    </label>    
                 </div>
            </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>