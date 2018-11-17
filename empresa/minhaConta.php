<!DOCTYPE html>
<html  lang="pt-br">

<?php
 	include_once("includes/menu.php");
 	include_once ("controller/MinhaContaController.class.php");
 	include_once ("model/Usuario.class.php");
 	$dado = new MinhaContaController();
?>

<head>
	<link rel="stylesheet" href="css/minhaConta.css"/>
</head>

<body>


	<?php
		$usuario = $dado->buscaDados();
		foreach ($usuario as $dado) {
	?>

		<div class="head-tb">
				<h2 class="teste">	  <?=$dado->getNome();?></h2>
				<div class="body-tb">
					<label class="label" for="nome"> Empresa </label>
					<input class="input" name="nome" type="text" placeholder="<?=$dado->getNome()?>" disabled>



					<label class="label" for="login"> Login </label>
					<input class="input" name="login" type="text" placeholder="<?=$dado->getLogin()?>"  disabled>

					<label class="label" for="senha"> Senha </label>
					<input class="input" name="senha" type="text" placeholder="<?=$dado->getSenha()?>"  disabled>

					<label class="label" for="Telefone"> Telefone </label>
					<input class="input" name="Telefone" type="text" placeholder="<?=$dado->getTelefone()?>"  disabled>
			</div>
			<div class="bottom-tb">
			 <button type="button" class="btn btn-success botao-tabela ">Atualizar Dados</button>
		
			</div>
		</div>

		<?php			
			};
		?>
		
	

</body>

</html>