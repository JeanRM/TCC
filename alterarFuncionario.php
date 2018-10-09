<?php
	include_once "controller/FuncionarioController.class.php";
	$controller = new FuncionarioController();

	if(isset($_POST["salvar"])) {
		 $controller -> atualizarFuncionario($_POST);
	}else{
		$id=$_GET["id"];
		$funcionario = $controller ->buscarFuncionarioPorId($id);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post">
		<input type="hidden" name="codigo" value="<?=$funcionario->getIdFuncionario()?>">
		<input type="text" name="nome" value="<?=$funcionario->getNome()?>">
		<input type="submit" name="salvar">

	</form>
</body>
</html>