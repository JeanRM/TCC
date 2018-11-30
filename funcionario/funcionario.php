<!DOCTYPE html>
<html lang="pt">
  <?php
    include_once("dao/DaoFuncionario.class.php");
    $dao = new DaoFuncionario;


    include_once("controller/FuncionarioController.class.php");
    $controller = new FuncionarioController;

    session_start();
    $teste = $_SESSION['codigo'];
  ?>
  <head>
    <meta charset="utf-8">
    <title>Velozmente</title>
    <link href="../componentes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../componentes/fontawesome-5.0.13/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href="css/index.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="funcionario.php">Velozmente</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#entrega">Entregas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#relatorio">Relatórios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../index.php">Sair</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in black">Bem Vindo </div>
          <div class="intro-heading text-uppercase black">Onde vamos acelerar hoje?</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#entrega">Começar!</a>
        </div>
      </div>
    </header>


    <!-- Entrega -->
    <section id="entrega">
    	<div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Entregas a serem realizadas</h2>
        <div id="centro">
		<table class="table table-striped" cellspacing="0" cellpadding="0">
      <thead>
        <tr>
          <th>Produto</th>
          <th>Cliente</th>
          <th>Endereco</th>
          <th>Data da Entrega</th>
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
          <td><?=$entrega->getCliente()?></td>
          <td><?=$entrega->getRua()?>, <?=$entrega->getNumero()?> - <?=$entrega->getBairro()?></td>
          <td><?=$entrega->getDataEntrega()?></td>
          <td class="actions">
            <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#confirmar-modal">Iniciar Entrega</a>
          </td>
        </tr>

        <?php
          }
        ?>
      </tbody>
    </table>
	</div>
      </div>
    </section>



  <section id="relatorio">
    <div class="container">
      <div class="text-center">
        <h2 class="section-heading text-uppercase">Entregas já feitas</h2>
        <div id="tabela-centro">
          <div class="card mb-3 teste2">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Relatório de Entregas</div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Produto</th>
                      <th>Funcionário</th>
                      <th>Cliente</th>
                      <th>Endereço</th>
                      <th>Data da Entrega</th>
                      <th>Preço</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Produto</th>
                      <th>Funcionário</th>
                      <th>Cliente</th>
                      <th>Endereço</th>
                      <th>Data da Entrega</th>
                      <th>Preço</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>Pizza Calabresa</td>
                      <td>João</td>
                      <td>Thiago</td>
                      <td></td>
                      <td>2018/11/28</td>
                      <td>$25,00</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
         </div>

        </div>
    </div>
  </section>



  <!-- Modal de Confirmação-->
  <div class="modal fade" id="confirmar-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modalLabel">Atenção!</h4>
        </div>
        <div class="modal-body">
          Deseja Iniciar Esta Entrega?
        </div>
        <div class="modal-footer">
          <a type="button"  class="btn btn-primary a" href="entrega.php?<?=$entrega->getIdEntrega()?>">Sim</a>
      <a type="button" class="btn btn-default a" data-dismiss="modal">N&atilde;o</a>
        </div>
      </div>
    </div>
  </div> 
    <!-- Bootstrap core JavaScript -->
    <script src="../componentes/jquery/jquery.min.js"></script>
    <script src="../componentes/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../componentes/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="../componentes/js/jqBootstrapValidation.js"></script>
    <script src="../componentes/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../componentes/js/agency.min.js"></script>
    <script type="text/javascript">
      function emConstrucao(){
        alert("Pagina ainda em Desenvolvimento!");
      }

    </script>

  </body>

</html>
