<!DOCTYPE html>
<html  lang="pt-br">	

<?php
 	include_once("includes/menu.php");
 	include_once("model/Entregas.class.php");
	include_once("controller/EntregaController.class.php");
	$controle = new ControllerEntrega();
	

 	if (isset($_POST["btn-cadastrar"])){		
		$controle -> cadastrarEntrega($_POST);
	} 
?>

<head>
	<link rel="stylesheet" href="css/entregas.css"/>
</head>

<body>

	<button type="button" class="btn btn-success float-right btn-cadastro" data-toggle="modal" data-target=".cadastre">Cadastrar Entregas</button>



	
</body>  
</html>





