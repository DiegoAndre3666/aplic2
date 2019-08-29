
<style>
.nav-wrapper {background-color: #00838f}
</style>

<!-- MENUS DROPDOWNS -->

<ul id="itens_menu_cadastro" class="dropdown-content">
  <li><a href="cadastroequipamentos.php">Cadastro de Equipamentos</a></li>
  <li><a href="cadastrosoftware.php">Cadastro de Software</a></li>
  <li class="divider"></li>
  <li><a href="menu.php">Cadastro de Usuários</a></li>
</ul>


<ul id="itens_menu_relatorios" class="dropdown-content">
  <li><a href="listaequipamento.php">Relatório de Equipamentos</a></li>
  <li><a href="listasoftware.php">Relatório de Software</a></li>
  <li><a href="menu.php">Relatório de Usuários</a></li>
</ul>


<nav  class="blue-text text-darken-2">
    <div class="nav-wrapper">

     <ul id="nav-mobile" class="right hide-on-med-and-down">

         <!-- popup cadastros -->
         <li><a href="menu.php" class="dropdown-button" data-target="itens_menu_cadastro">Cadastros<i class="material-icons right">arrow_drop_down</i></a></li>
         <li><a href="menu.php" class="dropdown-button" data-target="itens_menu_relatorios">Relatórios<i class="material-icons right">arrow_drop_down</i></a></li>

         <!-- na barra usuario -->
         <li><a><?=$_SESSION['nome'];?><i class="material-icons right">person</i></a></li>

         <!-- na barra usuario -->
         <li class="active"><a href="logout.php">Sair com segurança<i class="material-icons right">exit_to_app</i></a></li>
     </ul>

    </div>
</nav>





