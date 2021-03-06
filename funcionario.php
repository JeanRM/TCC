<!DOCTYPE html>
<html  lang="pt-br">	

<?php
 	include_once("includes/menu.php");
	include_once("model/Funcionario.class.php");
	include_once("controller/FuncionarioController.class.php");
	$controle = new FuncionarioController();
	include_once("dao/DaoFuncionario.class.php");
	$dao = new DaoFuncionario();	
	
	$id; 
	$funcionario = new Funcionario;

	if (isset($_POST["btn-cadastrar"])){		
		$resposta = $controle -> cadastrarFuncionario($_POST);
	} 

 	if (isset($_GET['id'])){
		$id=$_GET['id'];
		$controle ->excluir($id);
	} 

?>

<head>
	<link rel="stylesheet" href="componentes/datatables/datatables.min.css" />
	<link rel="stylesheet" href="css/funcionario.css">
</head>

<body>
	<button type="button" class="btn btn-success float-right btn-cadastro" data-toggle="modal" data-target=".cadastre">Cadastrar Funcionários</button>



	<div id="container">
		<div id="centro">
			<div class="card-body">
				<table class="table table-striped" id="tabela" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Login</th>
							<th>Senha</th>
							<th>Email</th>
							<th class="actions">Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$vetorDeFuncionarios = $dao->listarFuncionarios($_SESSION['codigo']);	
							foreach ($vetorDeFuncionarios as $funcionario) {
						?>
						<tr>
							<td><?=$funcionario->getNome()?></td>
							<td><?=$funcionario->getLogin()?></td>
							<td><?=$funcionario->getSenha()?></td>
							<td><?=$funcionario->getEmail()?></td>
							<td class="actions">
								<a class="btn btn-success btn-xs af" onclick="emConstrucao()" href="#">Mais Info</a>
								<a class="btn btn-warning btn-xs af"  onclick="emConstrucao()" href="#">Editar</a>

								<a href="funcionario.php?id=<?=$funcionario-> getIdFuncionario()?>"" class="btn btn-danger btn-xs">Excluir</a>
							</td>
						</tr>

						<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>




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

							<span class="input-group-addon" id="basic-addon1">Email</span>
							<input type="email" class="form-control" placeholder="Email Funcionario" aria-describedby="basic-addon1" name="email" required>

							
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


	<!-- Modal de exclusao-->
	<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
	    		<div class="modal-header">
	        		<h4 class="modal-title" id="modalLabel">Atenção!</h4>
	    		</div>
	    		<div class="modal-body">
	        		Deseja realmente excluir este funcionário?
	      		</div>
	      		<div class="modal-footer">
	        	<!-- <a type="button"  class="btn btn-primary a" href="funcionario.php?id=<?=$funcionario-> getIdFuncionario()?>">Sim</a> !-->

	 				<a type="button" class="btn btn-default a" data-dismiss="modal">N&atilde;o</a>
	      		</div>
	    	</div>
	  	</div>
	</div>

	<script type="text/javascript">
		function emConstrucao(){
        	alert("Pagina ainda em Desenvolvimento!");
      	}
	</script>
	
	<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script> 
	<script src="componentes/jquery/jquery.js"></script>
    <script src="componentes/Bootstrap/js/bootstrap.min.js" ></script>
    <script src="componentes/datatables/datatables.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>