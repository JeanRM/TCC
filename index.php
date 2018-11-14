<!DOCTYPE html>
<html lang="pt-br">

 <?php
 	include_once("includes/head.php");
	include_once ("controller/LoginController.class.php");
	$controle = new LoginController();

	if (isset($_POST["btn-cadastrar"])){
		$mensagem = $controle->cadastrarEmpresa($_POST);
	}
	if (isset($_POST["btn-logar"])){
		$mensagem = $controle->logar($_POST);
	}

	if ($_GET){
		$mensagem=$_GET["msg"];
	}
	


?>
	
<head>
	<link rel="stylesheet" href="css/estilo-tela-login.css"/>

	<script type="text/javascript">		
		function emConstrucao(){
			alert("Desculpe, área em desenvolvimento! ");
		}
	</script>
</head> 

<body>
	<div class="container">
   		
   		<div class="col-sm-12">
			<!-- BOTÃO CADASTRE-SE -->
			<button type="button" class="btn btn-info float-right btn-cadastro cadastre-se" data-toggle="modal" data-target=".cadastre">Cadastre-se</button>

			<button type="button" class="btn btn-success float-right btn-cadastro cadastre-se" onclick="emConstrucao()">Rastrear Produto</button>
  		</div>
   		
		<div class="form-centralizado">
			<form method="POST">
				<div id="block">
					<div class="form-group">
						<label class="Meu-Label" for="Login"> Login </label>
						<input type="text" name="login" id="login" placeholder="Digite o Seu Login" class="form-control Meu-Input" required>
					</div >

					
					<div class="form-group">
						<label class="Meu-Label" for="Senha"> Senha </label>
						<input type="password" name="senha" id="Senha" placeholder="Digite a sua Senha" class="form-control Meu-Input" required/>
					</div >

					<p>
	
					</p>

					<input class="btn btn-info float-left" type="submit" name="btn-logar" id="btn-logar" value="Área Empresarial" >
					<input class="btn btn-success float-right" type="submit" name="btn-logar" id="btn-logar" value="Funcionario" >

				</div>
			</form>
		</div>			
		
	</div>
	<div id="bottom">
			<p>
				© 2018 Copyright - todos os direitos reservados
			</p>
		</div>

	<!-- MODAL DE CADASTRO -->
	<div class="modal fade cadastre" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">

			<div class="modal-body">

		      	<form method="POST">
					<div class="corpo-modal">						
						<div id="cadastro-funcionario">
						 	<span class="input-group-addon" id="basic-addon1">Nome</span>
							<input type="text" class="form-control" placeholder="Nome Empresa" aria-describedby="basic-addon1" name="cnome" required>

							<span class="input-group-addon" id="basic-addon1">Login</span>
							<input type="text" class="form-control" placeholder="Ex: Velozmente01" aria-describedby="basic-addon1" name="clogin" required>

							<span class="input-group-addon" id="basic-addon1">Senha</span>
							<input type="password" class="form-control" placeholder="Ex: velozmente001" aria-describedby="basic-addon1" name="csenha" required>

							<span class="input-group-addon" id="basic-addon1">Email</span>
							<input type="email" class="form-control" placeholder="Ex: velozmente0000@gmail.com" aria-describedby="basic-addon1" name="cemail" required>

							<span class="input-group-addon" id="basic-addon1">Cnpj</span>
							<input type="number" class="form-control" placeholder="" aria-describedby="basic-addon1" name="cCpf" required>

							<span class="input-group-addon" id="basic-addon1">Endereco</span>
							<input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" name="cEndereco" required>

							<span class="input-group-addon" id="basic-addon1">Telefone</span>
							<input type="number" class="form-control" placeholder="" aria-describedby="basic-addon1" name="cTelefone" required>

						</div>

							
					<div class="modal-footer">
						<button type="submit" class="btn btn-success" name="btn-cadastrar">Cadastrar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>

				</form>
			</div>
	    </div>
	  </div>
	</div>
	<div class="modal" tabindex="-1" role="dialog" id="modal-acesso-nao-autorizado">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Atenção!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <?php 
	        	echo $mensagem; 
	        ?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
	      </div>
	    </div>
	  </div>
	</div>
	<script src="componentes/jquery/jquery-3.2.1.min.js"></script>
	<script src="componentes/bootstrap/js/bootstrap.min.js"></script>
	<?php 
		if (isset($_GET["erro"])){
			
	?>
			<script type="text/javascript">
	    		$('#modal-acesso-nao-autorizado').modal('show');
	    	</script>
	<?php
		}
	?>
	
</body>
</html>