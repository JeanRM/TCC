<?php
  include_once "controller/FuncionarioController.class.php";
  $controller = new FuncionarioController();

  if(isset($_POST["salvar"])) {
     $controller -> atualizarFuncionario($_POST);
  }else{
    $id=$_GET["id"];
    $funcionario = $controller ->buscarFuncionarioPorId($id);
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
      <h3 class="page-header">Editar Funcionário</h3>
    
      <form method="POST">	
        <div class="row">
          <div class="form-group col-md-6">
            <input type="hidden" name="codigo" value="<?=$funcionario->getIdFuncionario()?>">
            <label for="exampleInputEmail1">Nome</label>
            <input type="text" class="form-control" name="nome" id="exampleInputEmail1" placeholder="Digite novo nome" required>
          </div>
    	    
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Login</label>
            <input type="text" class="form-control" name="login" id="exampleInputEmail1" placeholder="Digite novo Login" required>
      	  </div>
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Senha</label>
            <input type="text" class="form-control" name="senha" id="exampleInputEmail1" placeholder="Digite novo nome" required>
          </div>
          
          <div class="form-group col-md-6">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Digite novo Login" required>
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