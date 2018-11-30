<!DOCTYPE html>
<html  lang="pt-br">  

<?php
  include_once("includes/menu.php");
  include_once ("dao/daoRelatorio.class.php");
  $dao = new DaoRelatorio;
?>

<head>
  <link rel="stylesheet" href="componentes/datatables/datatables.min.css" />
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
                <table class="table table-bordered" id="tabela" width="100%" cellspacing="0">
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
                    <?php
                      $vetorDeRelatorios = $dao->listarRelatorios($_SESSION['codigo']); 
                      foreach ($vetorDeRelatorios as $relatorio) {
                    ?>

                    <tr>
                      <td><?=$relatorio->getProduto()?></td>
                      <td><?=$relatorio->getIdFuncionario()?></td>
                      <td><?=$relatorio->getIdCliente()?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
         </div>

        </div>
    </div>
</body>
    <script src="componentes/jquery/jquery.js"></script>
    <script src="componentes/Bootstrap/js/bootstrap.min.js" ></script>
    <script src="componentes/datatables/datatables.min.js"></script>
    <script src="js/main.js"></script>
</html>