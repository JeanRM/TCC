<!DOCTYPE html>
<html  lang="pt-br">	

<?php
 	include_once("includes/menu.php");
 	include_once("dao/DaoEntrega.class.php");
 	$dao = new DaoEntrega();	
	include_once("model/Entrega.class.php");
	include_once("controller/EntregaController.class.php");	
	$controle = new entregaController();
	$id; 
	$entrega = new Entrega;

	if (isset($_POST["btn-cadastrar"])){		
		$resposta = $controle->cadastrarEntrega($_POST);

	} 

 	if (isset($_GET['id'])){
		$id=$_GET['id'];
		$controle ->excluir($id);
	} 
?>

<head>
	<link rel="stylesheet" href="css/entrega.css"/>
</head>

<body>
<button type="button" class="btn btn-success float-right btn-cadastro" data-toggle="modal" data-target=".cadastre">Cadastrar Entrega</button>




	<div id="centro">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Produto</th>
					<th>Data da Entrega</th>
					<th>Cliente</th>
					<th>Entregador</th>
					<th>Status</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$vetorDeEntregas = $dao->listarEntregas($_SESSION['codigo']);	
					foreach ($vetorDeEntregas as $entrega) {
				?>
				<tr>
					<td><?=$entrega->getProduto()?></td>
					<td><?=$entrega->getDataEntrega()?></td>
					<td><?=$entrega->getDestinatario()?></td>
					<td><?=$entrega->getIdFuncionario()?></td>
					<td><?=$entrega->getStatus()?></td>
					<td class="actions">
						<a class="btn btn-success btn-xs af" href="visualizaEntrega.php?id=<?=$entrega->getIdEntrega()?>">Mais Info</a>
						<a class="btn btn-warning btn-xs af" href="editaEntrega.php?id=<?=$entrega->getIdEntrega()?>">Editar</a>

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
					 	<div class="form-group">
						    <label for="produto">Produto</label>
						    <input name="produto" type="text"  class="form-control" id="produto" placeholder="" required>
						</div>

						<div class="form-group">
						    <label for="descricao">Descrição (opcional)</label>
						    <input name="descricao" type="text"  class="form-control" id="descricao" placeholder="">
						</div>

						<div class="form-group">
						    <label for="dinheiro">Preço</label>
						    <input name="preco" type="float" id="dinheiro"  class="dinheiro form-control"  placeholder="Ex: 9,99" required>
						</div>

						<div class="form-group">
						    <label for="data">Data Da Entrega</label>
						    <input name="data" type="date" id="data"  class="form-control" required>
						</div>

						<div class="form-group">
						  <label for="sel2">Cliente Para Entrega</label>
						  <select name="cliente" class="form-control" id="sel2">
						
						  </select>
						</div>

						<div class="form-group">
						  <label for="sel1">Funcionário Para Entrega</label>
						  <select name="funcionario" class="form-control" id="sel1">
						    <?php
								include_once("dao/DaoFuncionario.class.php");
							 	$daoFunc = new DaoFuncionario();

								$vetorDeFuncionarios = $daoFunc->listarFuncionarios($_SESSION['codigo']);	
								foreach ($vetorDeFuncionarios as $funcionario) {
							?>
							 
							    <option value="<?=$funcionario->getIdFuncionario()?>"><?=$funcionario->getNome()?></option>

							<?php 
								}
							?>
						  </select>
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
	


		<!-- Modal de exclusao-->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modalLabel">Atenção!</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir esta entrega do sistema?
      </div>
      <div class="modal-footer">
        <a type="button"  class="btn btn-primary a" href="entrega.php?id=<?=$entrega->getIdEntrega()?>">Sim</a>
 		<a type="button" class="btn btn-default a" data-dismiss="modal">N&atilde;o</a>
      </div>
    </div>
  </div>
</div> <!-- /.modal -->

		<script src="componentes/jquery/jquery-3.2.1.min.js"></script>
		<script src="componentes/bootstrap/js/bootstrap.min.js"></script>
		<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>           
		<script> 
			$('.dinheiro').mask('#.##0,00', {reverse: true});
		</script>
	</div>
</html>





