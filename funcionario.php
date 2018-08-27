<!DOCTYPE html>
<html  lang="pt-br">	

<?php
 	include_once("includes/menu.php");
 	include_once("controller/FuncionarioController.class.php");
 	$controle = new FuncionarioController();
 	$mensagem = "";
 	if (isset($_POST["btn-cadastrar"])){
		$mensagem = $controle->cadastrarFuncionario($_POST);
	}

?>

<head>
	<link rel="stylesheet" href="css/estilo-tela-entrou.css"/>
	<link rel="stylesheet" href="css/funcionario.css"/>
</head>

<body>	
		<?php
		echo $mensagem;
	?>
	<form method="POST">
		<div id="cadastro-funcionario">
		 	<span class="input-group-addon" id="basic-addon1">Nome</span>
			<input type="text" class="form-control" placeholder="Nome Funcionario" aria-describedby="basic-addon1" name="nome" required>

			<span class="input-group-addon" id="basic-addon1">Login</span>
			<input type="text" class="form-control" placeholder="Login Funcionario" aria-describedby="basic-addon1" name="login" required>

			<span class="input-group-addon" id="basic-addon1">Senha</span>
			<input type="password" class="form-control" placeholder="Senha Funcionario" aria-describedby="basic-addon1" name="senha" required>


			<button type="submit" name="btn-cadastrar" class="btn btn-primary">Cadastrar</button>
		</div>
	</form>


</body>
</html>