<?php
session_start();

include 'cabecalho.php';
include 'menubar.php';

?>

<br>

<div class="container">


     <div class="row">
	 <h3 class="header center teal-text text-lighten-2">Bem Vindo!</h3>
	    <div class="col s12 l6 m6">
	    	<div class="card blue-grey darken-1">
				<div class="card-content white-text">
                    <span class="card-title">Cadastros</span>
		     			<a href="formequip.php" class="waves-effect waves-light btn-large"><i class="material-icons left">devices_other</i>Equipamentos</a><br><br>
                    	<a  href="formsoftware.php" class="waves-effect waves-light btn-large"><i class="material-icons left">event_note</i>Software</a><br><br>
						<a  href="formdpto.php" class="waves-effect waves-light btn-large"><i class="material-icons left">location_city</i>Departamento</a><br><br>
						<a  href="formuser.php" class="waves-effect waves-light btn-large"><i class="material-icons left">person</i>Usuários</a><br><br>

				</div>
	      	</div>
	    </div>
		<div class="col s12 l6 m6">
	    	<div class="card blue-grey darken-1">
				<div class="card-content white-text">
                    <span class="card-title">Consultas e Relatórios</span>
		     			<a href="listaequip.php" class="waves-effect waves-light btn-large"><i class="material-icons left">assignment_ind</i>Relatório geral de Equipamentos</a><br><br>
                    	<a  href="listasoft.php" class="waves-effect waves-light btn-large"><i class="material-icons left">event_note</i>Listagem de Sofware</a><br><br>
						<a  href="listadpto.php" class="waves-effect waves-light btn-large"><i class="material-icons left">assignment</i>Listagem de Departamentos</a><br><br>
						<a  href="listauser.php" class="waves-effect waves-light btn-large"><i class="material-icons left">assignment_ind</i>Listagem de Usuários</a><br><br>

				</div>
	      	</div>
	    </div>
	    
    </div>


</div> <!-- fim container -->

</body>
</html>


