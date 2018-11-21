<!DOCTYPE html>
<html  lang="pt-br">	

<?php
 	include_once("includes/menu.php");
?>

<head>
	 <link href="datatables/dataTables.bootstrap4.css" rel="stylesheet">
	<link rel="stylesheet" href="css/relatorio.css">
</head>

<body>
	<div id="container ">
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
        <!-- /.container-fluid -->
	<script src="componentes/jquery/jquery-3.2.1.min.js"></script>
	<script src="componentes/bootstrap/js/bootstrap.min.js"></script>
	 <!-- Page level plugin JavaScript-->
    <script src="datatables/jquery.dataTables.js"></script>
    <script src="datatables/dataTables.bootstrap4.js"></script>
    <script src="datatables/datatables-demo.js"></script>
</body>
</html>