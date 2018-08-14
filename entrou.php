<!DOCTYPE html>
<html  lang="pt-br">
	
<?php
 	include_once("includes/menu.php");
	include_once("controller/LoginController.class.php");
	include_once("controller/EntrouController.class.php");
	$controleEntrou  = new EntrouController();
	$controle  = new LoginController();
	$controle->verificaLogado();

	if (isset($_POST["verificar"])){
		$dados = $controleEntrou->buscaDados($_POST);
		
	}
?>
	
<head>
	<link rel="stylesheet" href="css/estilo-tela-entrou.css"/>
</head>
   
<body>
    	
</body>  


</html>