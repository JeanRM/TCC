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
	//}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alterar Funcionário</title>;
	<?=include_once("includes/menu.php");?>
	<link href="css/alterar.css" rel="stylesheet" type="text/css">

</head>
<body>
	<form>
	   	<div class="head-tb">
			<h2 class="teste"> Funcionário <?=$funcionario->getNome()?> </h2>
			
			<div class="body-tb">
				<input type="hidden" name="codigo" value="<?=$funcionario->getIdFuncionario()?>">

				<div class="form-group row">
					<label for="nome" class="col-sm-2 col-form-label">Nome</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" name="nome" value="<?=$funcionario->getNome()?>">
				    	</div>

				    <label for="login" class="col-sm-2 col-form-label">Login</label>
				    	<div class="col-sm-10">
				    		<input type="text" class="form-control" name="login" value="<?=$funcionario->getLogin()?>">
				   		</div>

				   	<label for="senha" class="col-sm-2 col-form-label">Senha</label>
				    	<div class="col-sm-10">
				    		<input type="text" class="form-control" name="senha" value="<?=$funcionario->getSenha()?>">
				   		</div>
				 </div>
			</div>

			<div class="bottom-tb">
				<input class="btn btn-danger button" type="submit" value="Cancelar" name="cancelar">

				<input class="btn btn-success button" type="submit" value="Atualizar" name="salvar">	
			</div>
		</div>
</div>
</body>
</html>