<!DOCTYPE html>
<html lang="pt-br">

 <?php
 	include_once("includes/head.php");
	include_once ("controller/LoginController.class.php");
	$controle = new LoginController();

	if (isset($_POST["btn-logar"])){
		$mensagem = $controle->logar($_POST);
	}
	else{
		$mensagem ['msg']="";
	}
?>
<head>
	<link rel="stylesheet" href="css/estilo-tela-login.css"/>
</head> 

<body>
	<div class="container">
   		
   		<div class="col-sm-12">
			<!-- BOTÃO CADASTRE-SE -->
			<button type="button" class="btn btn-info float-right btn-cadastro cadastre-se" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastre-se</button>
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
						<?=$mensagem['msg']?>
					</p>

					<input class="btn btn-block btn-info enviar" type="submit" name="btn-logar" id="btn-logar" value="Logar" >

				</div>
			</form>
		</div>			
	
	</div>

	<!-- MODAL DE CADASTRO -->
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">

	    	<div class="modal-header">
					<h5 class="modal-title">Cadastro</h5>
			</div>

			<div class="modal-body">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Cliente</a></li>
				</ul>

		      	<form method="POST">
					<div class="dados-pessoais">
						<img src="imagens/icone-indefinido.jpg" class="tamanho-imagem"/>
						<div class="informacoes-dados">
							<div class="input-group dados">
								<span class="input-group-addon" id="basic-addon1">Nome</span>
		  						<input type="text" class="form-control" placeholder="Digite Seu Nome" aria-describedby="basic-addon1" name="cnome" required>
							</div>
		
							<br>
							<div class="input-group dados">
			  					<span class="input-group-addon" id="basic-addon1">Login</span>
			 	 				<input type="text" class="form-control" placeholder="Digite Seu login" aria-describedby="basic-addon1" name="clogin" required>
							</div>
							<br>
							<div class="input-group dados">
			  					<span class="input-group-addon" id="basic-addon1">Senha</span>
			  					<input type="password" class="form-control" placeholder="Digite Sua senha" aria-describedby="basic-addon1" name="csenha" required>
							</div>
							<br>
							<div class="input-group dados">
				  				<span class="input-group-addon" id="basic-addon1">CPF</span>
				  				<input type="text" class="form-control" placeholder="Ex: 000.000.000-00" aria-describedby="basic-addon1" name="cCpf" required>
							</div>

							<br>
							<div class="input-group dados">
				  				<span class="input-group-addon" id="basic-addon1"> Telefone de Contato</span>
				  				<input type="number" class="form-control" placeholder="Digite o Telefone" aria-describedby="basic-addon1" name="ctelefone" required>
							</div>

							<br>
							<div class="input-group dados">
							  	<span class="input-group-addon" id="basic-addon1"> Email</span>
							  	<input type="text" class="form-control" placeholder="Ex:Velozmente@gmail.com" aria-describedby="basic-addon1" name="cemail" required>
							</div>


							<div class="input-group dados">
								<label> Sexo:</label>
								<label class="checkbox-inline esex"><input type="radio" name="optradio" value="1"> Masculino</label>

								<label class="checkbox-inline esex"><input type="radio" name="optradio" value="1">Feminino</label>
							</div>
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
	</div>
	<div class="modal" tabindex="-1" role="dialog" id="modal-acesso-nao-autorizado">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title">Ops!</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <?=$mensagem?>
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