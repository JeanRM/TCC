<!DOCTYPE html>
<html  lang="pt-br">
	
<?php
 	include_once("includes/menu.php");
	include_once("controller/LoginController.class.php");
	include_once("controller/EntrouController.class.php");
	$controleEntrou  = new EntrouController();
	$controle  = new LoginController();
	$controle->verificaLogado();

	if (isset($_POST["verificar"])){
		$dados = $controleEntrou->buscaDados($_POST);
		
	}
?>

<head>
	<link rel="stylesheet" href="css/estilo-tela-entrou.css"/>
</head>

<body>
	<?php
		include_once("dao/DaoEntrega.class.php");
		$dao = new DaoProduto();
		$dao->listarProdutos();
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
				</tr>
			</thead>
			  		
			<tbody>
				<?php	
					for ($i=0; $i<10; $i++) { 
				?>
		    
		    	<tr>
			      	<th scope="row"><?=$i?></th>
			      	<td>Chocolate</td>
					<td>Igor</td>
					<td>06/08/2018</td>
					<td>Em Andamento</td>
				</tr>		    		
			    
			    <?php } 

					
				?>
			</tbody>
		</table>         
   	</div>
</body>  
</html>





