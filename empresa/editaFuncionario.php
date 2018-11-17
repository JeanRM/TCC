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
     <h3 class="page-header">Editar Funcionário</h3>
    <form method="POST">	
      <div class="row">
        <div class="form-group col-md-6 vai-pro-fundo">
          <input type="hidden" name="codigo" value="<?=$funcionario->getIdFuncionario()?>">
          <label for="exampleInputEmail1">Nome</label>
          <input type="text" class="form-control" name="nome" id="exampleInputEmail1" placeholder="Digite novo nome" required>
        </div>
  	    
        <div class="form-group col-md-6 vai-pro-fundo">
          <label for="exampleInputEmail1">Login</label>
          <input type="text" class="form-control" name="login" id="exampleInputEmail1" placeholder="Digite novo Login" required>
    	  </div>
      </div>

      <div class="row">
        <div class="form-group col-md-6 vai-pro-fundo">
          <label for="exampleInputEmail1">Senha</label>
          <input type="text" class="form-control" name="senha" id="exampleInputEmail1" placeholder="Digite novo nome" required>
        </div>
        
        <div class="form-group col-md-6 vai-pro-fundo">
          <label for="exampleInputEmail1">Email</label>
          <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Digite novo Login" required>
        </div>
      </div>
	
      <div class="form-group vai-pro-fundo">
        <div class="col-md-12">
          <a href="#" class="btn btn-primary float-right " name="salvar">Atualizar</a>
          <a href="funcionario.php" class="btn btn-danger float-right">Cancelar</a>
        </div>
      </div>
    </form>
  </div>
 <script src="componentes/jquery/jquery.min.js"></script>
 <script src="componentes/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>