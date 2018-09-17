 <!DOCTYPE html>
<html  lang="pt-br">	

<?php
 	include_once("includes/menu.php");
 	include_once("dao/DaoFuncionario.class.php");
	include_once("model/Funcionario.class.php");
	include_once("controller/FuncionarioController.class.php");
	$dao = new DaoFuncionario();	
	$controle = new FuncionarioController();
	$id;


	if (isset($_POST["btn-cadastrar"])){		
		$controle -> cadastrarFuncionario($_POST);

	} 

 	if (isset($_GET['id'])){
		$id=$_GET['id'];
		$controle ->excluir($id);
	} 

?>

<head>

	<link rel="stylesheet" href="css/funcionario.css">
</head>

<body>

	<button type="button" class="btn btn-success float-right btn-cadastro" data-toggle="modal" data-target=".cadastre">Cadastrar Funcionários</button>

 	<?php
		$vetorDeProdutos = $dao->listarFuncionarios();	
		foreach ($vetorDeProdutos as $funcionario) {
	?>

	   	<div class="head-tb">
			<h2 class="teste"> Funcionário <?=$funcionario->getIdFuncionario()?> </h2>
			<div class="body-tb">
				<label class="label" for="nome"> Nome </label>
				<input class="input" name="nome" type="text" placeholder="<?=$funcionario->getNome()?>" disabled>



				<label class="label" for="nome"> Login </label>
				<input class="input" name="nome" type="text" placeholder="<?=$funcionario->getLogin()?>"  disabled>

				<label class="label" for="nome"> Senha </label>
				<input class="input" name="nome" type="text" placeholder="<?=$funcionario->getSenha()?>"  disabled>

				

			</div>
			<div class="bottom-tb">
				 <a type="button" class="btn btn-danger  botao-tabela" href="funcionario.php?id=<?=$funcionario-> getidFuncionario()?>">Excluir</a>
				 <button type="button" class="btn btn-success botao-tabela ">Atualizar Funcionario</button>
			
			</div>
		</div>
	<?php 
		
			}		
	?>


		<!-- MODAL DE CADASTRO -->
		<div class="modal fade cadastre" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		 	<div class="modal-dialog modal-lg">
		    	<div class="modal-content">
					<div class="modal-body">
						<form method="POST">
							<div id="cadastro-funcionario">
							 	<span class="input-group-addon" id="basic-addon1">Nome</span>
								<input type="text" class="form-control" placeholder="Nome Funcionario" aria-describedby="basic-addon1" name="nome" required>

								<span class="input-group-addon" id="basic-addon1">Login</span>
								<input type="text" class="form-control" placeholder="Login Funcionario" aria-describedby="basic-addon1" name="login" required>

								<span class="input-group-addon" id="basic-addon1">Senha</span>
								<input type="password" class="form-control" placeholder="Senha Funcionario" aria-describedby="basic-addon1" name="senha" required>

								
							</div>
						
					</div>						
					<div class="modal-footer">
						<button type="submit" name="btn-cadastrar" class="btn btn-primary">Cadastrar</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					</div>
					</form>
				</div>
		    </div>
		</div>

		<script src="componentes/jquery/jquery-3.2.1.min.js"></script>
		<script src="componentes/bootstrap/js/bootstrap.min.js"></script>
	</div>

</body>
</html>