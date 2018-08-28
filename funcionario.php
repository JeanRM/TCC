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
	<button type="button" class="btn btn-success float-right btn-cadastro" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar Funcionário</button>

	<div id="corpo">
		<table class="table tabela">
			<thead >
		   		<tr>
		   			<th>#</th>
		   			<th>Produto</th>
				    <th>Entregador</th>
				    <th>Data de Emissão</th>
				    <th>Status</th>
				    <th>Descrição</th>
				    <th>Preço</th>
				    <th></th>

				</tr>
			</thead>
			  		
			<tbody class="corpo-tabela">
			
		   			<th scope="row">1</th>
		   			<td>chocolate</td>
				    <td>igor</td>
				    <td>27/08/2018</td>
				    <td>Em andamento</td>
				    <td>asadasd</td>
				    <td>20,00R$</td>
					<td>
						<a href="#"> <i class="fas fa-edit"></i> </a>
						<a href="#"><i class="fas fa-trash-alt"></i></a>
					
					</td>
						
	
			</tbody>
		</table>         

		<?php
			echo $mensagem;
		?>
		

		

		<!-- MODAL DE CADASTRO -->
		<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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