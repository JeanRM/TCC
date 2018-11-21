<!DOCTYPE html>
<html  lang="pt-br">	

<?php
 	include_once("includes/menu.php");
	include_once("model/Cliente.class.php");
	include_once("controller/ClienteController.class.php");
	$controle = new ClienteController();
	include_once("dao/DaoCliente.class.php");
	$dao = new DaoCliente();	
	
	$id; 


	if (isset($_POST["btn-cadastrar"])){		
		$resposta = $controle -> cadastrarCliente($_POST);
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
	<button type="button" class="btn btn-success float-right btn-cadastro" data-toggle="modal" data-target=".cadastre">Cadastrar Cliente</button>



	<div id="centro">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Endereco</th>
					<th>Telefone</th>
					<th>Email</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$vetorDeClientes = $dao->listarClientes($_SESSION['codigo']);	
					foreach ($vetorDeClientes as $cliente) {
				?>
				<tr>
					<td><?=$cliente->getNome()?></td>
					<td><?=$cliente->getRua()?>, <?=$cliente->getNumero()?> - Bairro <?=$cliente->getBairro()?></td>
					<td><?=$cliente->getTelefone()?></td>
					<td><?=$cliente->getEmail()?></td>
					<td class="actions">
						<a class="btn btn-success btn-xs af" href="visualizaCliente.php?id=<?=$cliente->getIdCliente()?>">Mais Info</a>
						<a class="btn btn-warning btn-xs af" href="editaCliente.php?id=<?=$cliente->getIdCliente()?>">Editar</a>

						<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal">Excluir</a>
					</td>
				</tr>

				<?php
					}
				?>
			</tbody>
		</table>
	</div>




		<!-- MODAL DE CADASTRO -->
		<div class="modal fade cadastre" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		 	<div class="modal-dialog modal-lg">
		    	<div class="modal-content">
					<div class="modal-body">
						<form method="POST">
							<div id="cadastro-funcionario">
							 	<span class="input-group-addon" id="basic-addon1">Nome</span>
								<input type="text" class="form-control" placeholder="Nome Cliente" aria-describedby="basic-addon1" name="nome" required>

								  <div class="row">
								    <div class="col">
								      <span class="input-group-addon" id="basic-addon1">Rua</span>
								      <input type="text" name="rua" class="form-control" placeholder="Ex: Rua Palmacia ">
								    </div>

								    <div class="col col-md-2">
								    	<span class="input-group-addon" id="basic-addon1">N°</span>
								      <input type="number" name="numero" class="form-control" placeholder="Ex: 300">
								    </div>

								    <div class="col-md-4">
								    	<span class="input-group-addon" id="basic-addon1">Bairro</span>
								      <input type="text" name="bairro" class="form-control" placeholder="Ex: Moreninha 2">
								    </div>
								  </div>

								<span class="input-group-addon" id="basic-addon1">CPF</span>
								<input type="text" class="form-control" maxlength="14" placeholder="Cpf Cliente" aria-describedby="basic-addon1" name="cpf" required>

								<span class="input-group-addon" id="basic-addon1">Telefone</span>
								<input type="number" class="form-control" maxlength="12" placeholder="Telefone Cliente" aria-describedby="basic-addon1" name="telefone" required>


								<span class="input-group-addon" id="basic-addon1">Email</span>
								<input type="email" class="form-control" placeholder="Email Cliente" aria-describedby="basic-addon1" name="email" required>	
								
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
	        		Deseja realmente excluir este Cliente?
	      		</div>
	      		<div class="modal-footer">
	        		<a type="button"  class="btn btn-primary a" href="cliente.php?id=<?=$cliente->getIdCliente()?>">Sim</a>
	 				<a type="button" class="btn btn-default a" data-dismiss="modal">N&atilde;o</a>
	      		</div>
	    	</div>
	  	</div>
	</div>

	<script src="componentes/jquery/jquery-3.2.1.min.js"></script>
	<script src="componentes/bootstrap/js/bootstrap.min.js"></script>

	<script>
		function formatar(mascara, documento){
		  var i = documento.value.length;
		  var saida = mascara.substring(0,1);
		  var texto = mascara.substring(i)
		  
		  if (texto.substring(0,1) != saida){
		            documento.value += texto.substring(0,1);
		  }
		  
		}
</script>

</body>
</html>