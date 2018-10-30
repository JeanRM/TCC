<?php
  include_once "controller/EntregaController.class.php";
  $controller = new entregaController();

  if(isset($_POST["salvar"])) {
     $controller->atualizarEntrega($_POST);
  }else{
    $id=$_GET["id"];
    $entrega = $controller->buscarEntregaPorId($id);
  }

?>
<!DOCTYPE html>
<html>
<head>
  <title>Alterar Funcionário</title>;
  <?php include_once("includes/menu.php");?>
  <link href="css/funcionario.css" rel="stylesheet" type="text/css">

</head>
<body>
  <div id="centro">
    <div id="main" class="container-fluid">
      <h3 class="page-header">Editar Entrega</h3>
    
      <form method="POST">	
        <div class="row">
          <div class="form-group col-md-6">
            <input type="hidden" name="codigo" value="<?=$entrega->getIdEntrega()?>">
            <label for="exampleInputEmail1">Produto</label>
            <input type="text" class="form-control" name="produto" placeholder="Digite novo nome" required>
          </div>
    	    
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Entregador</label>
            <input type="text" class="form-control" name="entregador" required>
      	  </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Data De Entrega</label>
            <input type="date" class="form-control" name="data_entrega" required>
          </div>
          
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Status</label>
            <input type="text" value="teste" class="form-control" name="status">
          </div>
        </div>

  	
        <div class="form-group pull-right position-relative">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary" name="salvar">Atualizar</button>
            <a href="funcionario.php" class="btn btn-danger">Cancelar</a>
          </div>
        </div>
      </form>
    </div>
  </div>  
 <script src="componentes/jquery/jquery.min.js"></script>
 <script src="componentes/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>