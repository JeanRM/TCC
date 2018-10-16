<?php
 	include_once("includes/menu.php");
	include_once("model/Entrega.class.php");
	include_once("controller/EntregaController.class.php");
	$controle = new entregaController();
	include_once("dao/DaoEntrega.class.php");
	$dao = new DaoEntrega();	
	
	$id; 

	if(isset($_POST["salvar"])) {
		 $controle -> atualizarEntrega($_POST);
	}else{
		$id=$_GET["id"];
		$entrega = $controle ->buscarEntregaPorId($id);
	}
?>

<!DOCTYPE html>
<html  lang="pt-br">	

<head>
	<link rel="stylesheet" href="css/entrega.css">
</head>

<body>
	<div id="centro">
		<div id="main" class="container-fluid position-relative">
			<h3 class="page-header">Entrega <?=$entrega->getProduto()?></h3>
		  	
		  	<div class="row">
	        	<div class="form-group col-md-6">
	            	<input type="hidden" name="codigo" value="<?=$entrega->getIdFuncionario()?>">
	        	  	
	        	  	<label for="exampleInputEmail1">Produto</label>	        	  	
	        	  	<input type="text" class="form-control" name="nome"  placeholder="<?=$entrega->getProduto()?>" disabled>
	        	</div>
	      	    
	      	    <div class="form-group col-md-6">
	        		<label for="exampleInputEmail1">Login</label>
	        		<input type="text" class="form-control" name="login"  placeholder="<?=$entrega->getLogin()?>" disabled>
	        	</div>
	      	</div>


	      	<div class="row">
	        	<div class="form-group col-md-6">
	        		<label for="exampleInputEmail1">Senha</label>	        		
	        		<input type="text" class="form-control" name="nome" value="<?=$entrega->getSenha()?>" disabled>
	        	</div>

	      	    <div class="form-group col-md-6">
	        		<label for="exampleInputEmail1">Email</label>
	        		<input type="text" class="form-control" name="login" placeholder="<?=$entrega->getEmail()?>" disabled>
	        	</div>
	      	</div>

	      	<div class="form-group position-relative">
				<td class="actions">
					<a class="btn btn-primary btn-xs" href="funcionario.php">Voltar</a>
					<a class="btn btn-success btn-xs" href="editaFuncionario.php">Editar</a>

					<a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-modal">Excluir</a>
				</td>			
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
	        <a type="button"  class="btn btn-primary a" href="funcionario2.php?id=<?=$entrega-> getIdFuncionario()?>">Sim</a>
	 		<a type="button" class="btn btn-default a" data-dismiss="modal">N&atilde;o</a>
	      </div>
	    </div>
	  </div>
	</div>
		<script src="componentes/jquery/jquery-3.2.1.min.js"></script>
		<script src="componentes/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>