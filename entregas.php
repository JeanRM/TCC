<!DOCTYPE html>
<html  lang="pt-br">	

<?php
 	include_once("includes/menu.php");
?>

<head>
	<link rel="stylesheet" href="css/estilo-tela-entrou.css"/>
	<link rel="stylesheet" href="css/entregas.css"/>
</head>

<body>
	<?php
		include_once("dao/DaoEntrega.class.php");
		include_once("model/Entregas.class.php");
		$dao = new DaoEntrega();
		
	?>	
	<div id="entregas">	
		<table class="table">
			<thead class="thead-dark">
		   		<tr>
		   			<th>#</th>
		   			<th>Produto</th>
				    <th>Entregador</th>
				    <th>Data de Emissão</th>
				    <th>Status</th>
				    <th>Descrição</th>
				    <th>Preço</th>
				</tr>
			</thead>
			  		
			<tbody>
				<?php
					$vetorDeProdutos= $dao->listarEntrega();	
					foreach ($vetorDeProdutos as $entrega) {
				?>
		    
		    	<tr>
			      	<th scope="row">1</th>
			      	<td><?=$entrega->getProduto()?></td>
					<td><?=$entrega->getEntregador()?></td>
					<td><?=$entrega->getDataEntrega()?></td>
					<td><?=$entrega->getStatus()?></td>
					<td><?=$entrega->getDescricao()?></td>
					<td><?=$entrega->getPreco()."R$"?></td>				    		
			    
			    <?php 
					} 
					
				?>
			</tbody>
		</table>         
   	</div>
</body>  
</html>





