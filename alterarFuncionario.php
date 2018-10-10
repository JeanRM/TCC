 <?php
	include_once "controller/FuncionarioController.class.php";
	$controller = new FuncionarioController();

	if(isset($_POST["salvar"])) {
		 $controller -> atualizarFuncionario($_POST);
	}else{
		$id=$_GET["id"];
		$funcionario = $controller ->buscarFuncionarioPorId($id);
	}

	//if(isset($_POST["cancelar"])) { 
		//(header("location: index.php");) {
		# code...
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alterar Funcionário</title>;
	<?=include_once "includes/head.php";?>
	<link href="css/alterar.css" rel="stylesheet" type="text/css">

</head>
<body>
	<div id="formulario">
		<form method="post">
			<input type="hidden" name="codigo" value="<?=$funcionario->getIdFuncionario()?>">
			<label for="nome">Nome</label>
			<input class="form-control" type="text" name="nome" value="<?=$funcionario->getNome()?>">

			<label for="login">Login</label>
			<input class="form-control" type="text" name="login" value="<?=$funcionario->getLogin()?>">
			
			<label for="senha">Senha</label>
			<input class="form-control" type="text" name="senha" value="<?=$funcionario->getSenha()?>">
			<input class="btn btn-danger button" type="submit" value="Cancelar" name="cancelar">

			<input class="btn btn-success button" type="link" value="Atualizar" name="salvar">

		</form>
	</div>
</body>
</html>