<!DOCTYPE html>
<html  lang="pt-br">

<?php
 	include_once("includes/menu.php");
 	include_once ("controller/MinhaContaController.class.php");
 	include_once ("model/Usuario.class.php");
 	$controller = new MinhaContaController();
?>

<head>
	<link rel="stylesheet" href="css/estilo-tela-entrou.css"/>
	<link rel="stylesheet" href="css/minhaConta.css"/>
</head>

<body>
	<div id="minhaConta">
		<table class="table">
			<thead class="thead-dark">
		   		<tr>
		   			<th>#</th>
		   			<th>Nome</th>
				    <th>Usuario</th>
				    <th>Senha</th>
				    <th>Telefone</th>
				    <th>Sexo</th>
				    <th>Email</th>
				</tr>

				
			</thead>
			  		
			<tbody>
			<?php
				$usuario = $controller->buscaDados();
				foreach ($usuario as $dado) {
			?>
			<tr>
		      	<th scope="row">1</th>
		      	<td><?=$dado->getNome();?></td>
		      	<td><?=$dado->getIdUsuario();?></td>
		      	<td><?=$dado->getSenha();?></td>
		      	<td><?=$dado->getTelefone();?></td>
		      	<td><?=$dado->getSexo();?></td>
		      	<td><?=$dado->getEmail();?></td>
		    </tr>
		    </tbody>
		     <?php			
				};
			?>
		</table>
	</div>

</body>

</html>