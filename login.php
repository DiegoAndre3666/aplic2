<?php
session_start();

include 'cabecalho.php'

?>
     
<div class="container">

     <h5>Login</h5>

     <form name="form1" id="form1" action="validaruser.php" method="post" >

          <div class="input-field">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" size="50" maxlength="50" required="required" />
          </div>

          <div class="input-field">
                 <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" size="10" maxlength="10" required="required" />
          </div>

          <div class="input-field">
                <input class="btn" name="bt" type="submit" value="Entrar"/> 
          </div>

     </form>

</div>

</body>
</html>





