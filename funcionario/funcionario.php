<!DOCTYPE html>
<html lang="pt">
  <?php
    include_once("controller/FuncionarioController.class.php");
    $dao = new DaoFuncionario;

    include_once("dao/DaoFuncionario.class.php");
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
		<table class="table table-striped teste" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Produto</th>
					<th>Data da Entrega</th>
					<th>Cliente</th>
					<th>Endereço</th>
					<th>Status</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
		    <?php
          $vetorDeEntregas = $dao->listarEntregas($teste); 
          foreach ($vetorDeEntregas as $entrega) {
          $a = $entrega->getProduto();
        ?>
  				<tr>
  					<td class="black"><?=$entrega->getProduto()?></td>
  					<td class="black"><?=$entrega->getIdEntrega()?></td>
  					<td class="black">Igorzeti</td>
  					<td class="black">sadasdaskdaslkdmaskdm</td>
  					<td></td>
  					<td class="actions">
  						<a class="btn btn-success btn-xs af" href="visualizaEntrega.php">Iniciar Entrega</a>
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
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
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
