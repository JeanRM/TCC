 <!DOCTYPE html>
<html  lang="pt-br">	

<?php
 	include_once("includes/menu.php");
 

?>

<head>

	<link rel="stylesheet" href="css/funcionario.css">
</head>

<body>
	<button type="button" class="btn btn-success float-right btn-cadastro" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar Funcionário</button>

	<div class="head-tb">
		<h2 class="teste"> Funcionário - </h2>
		<div class="body-tb">
			<label class="Meu-Label" for="Login"> Nome </label>
			<input type="text" class="form-control Meu-Input">
		</div>

	</div>


	
<!-- 
	<div id="corpo">
		<table class="table tabela">
			<thead >
		   		<tr>
		   			
		   			<th>Id Funcionario</th>
				    <th>Nome</th>
				    <th>Login</th>
				    <th>Senha</th>
				  

				</tr>
			</thead>
			  		
			<tbody class="corpo-tabela">
					<?php

						$vetorDeFuncionario = $controle->buscarFuncionarioPorEmpresa($idEmpresa);
						foreach ($vetorDeFuncionario as $funcionario){
						
					?>
		   			
		   			<td><?=$funcionario->getIdFuncionario()?></td>
				    <td><?=$funcionario->getNome()?></td>
				    <td><?=$funcionario->getLogin()?></td>
				    <td><?=$funcionario->getSenha()?></td>
					<td>
						<a href="#"> <i class="fas fa-edit"></i> </a>
						<a href="funcionario.php"><i class="fas fa-trash-alt"></i></a>
					
					</td>
					<?php 
						} 
						
					?>
						
	
			</tbody>
		</table>         

		<?php
			echo $mensagem;
		?>
		
-->

		

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