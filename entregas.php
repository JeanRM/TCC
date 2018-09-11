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
	<link rel="stylesheet" href="css/estilo-tela-entrou.css"/>
	<link rel="stylesheet" href="css/entregas.css"/>
</head>

<body>

	<button type="button" class="btn btn-success float-right btn-cadastro" data-toggle="modal" data-target=".cadastre">Cadastrar Entregas</button>

 	<?php
 		include_once("dao/DaoEntrega.class.php");
 		$dao = new DaoEntrega();
		$vetorDeProdutos= $dao->listarEntrega();	
		foreach ($vetorDeProdutos as $entrega) {
	?>
	   	<div class="head-tb">
			<h2 class="teste"> Entrega  <?=$entrega->getIdEntrega()?> </h2>
			<div class="body-tb">
				<label class="label" for="nome"> Nome </label>
				<input class="input" name="nome" type="text" placeholder="<?=$entrega->getProduto()?>" disabled>



				<label class="label" for="nome"> Entregador </label>
				<input class="input" name="nome" type="text" placeholder="<?=$entrega->getEntregador()?>"  disabled>

				<label class="label" for="nome"> Data Da Entrega </label>
				<input class="input" name="nome" type="text" placeholder="<?=$entrega->getDataEntrega()?>"  disabled>

				<label class="label" for="nome"> Status </label>
				<input class="input" name="nome" type="text" placeholder="<?=$entrega->getStatus()?>"  disabled>

				<label class="label" for="nome"> Descrição </label>
				<input class="input" name="nome" type="text" placeholder="<?=$entrega->getDescricao()?>"  disabled>

				<label class="label" for="nome"> Preço </label>
				<input class="input" name="nome" type="text" placeholder="<?=$entrega->getPreco()?>"  disabled>

			</div>
			<div class="bottom-tb">
				 <button type="button" class="btn btn-danger  botao-tabela">Excluir</button>
				 <button type="button" class="btn btn-success botao-tabela ">Atualizar Entrega</button>
			
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

	
</body>  
</html>





