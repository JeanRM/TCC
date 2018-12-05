<!DOCTYPE html>
<?php
  
  include_once("includes/head.php");
  include_once ("controller/LoginController.class.php");
  $controle = new LoginController();

  if (isset($_POST["btn-cadastrar"])){
    $mensagem = $controle->cadastrarEmpresa($_POST);
  }

  if (isset($_POST["btn-logar-empresa"])){
    $mensagem = $controle->logarEmpresa($_POST);
  }

  if (isset($_POST["btn-logar-funcionario"])){
    $mensagem = $controle->logarFuncionario($_POST);
    
  }

  if ($_GET){
    $mensagem=$_GET["msg"];
  }else{
    $mensagem="";

  }

?>
<html lang="pt">

  <head>
    <meta charset="utf-8">
    <title>Velozmente</title>
    <link href="componentes/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="componentes/fontawesome-5.0.13/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href="css/index.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <div class="col-sm-12">
      <!-- BOTÃO CADASTRE-SE -->
      <button type="button" class="btn btn-info float-right btn-cadastro cadastre-se" data-toggle="modal" data-target=".cadastre">Cadastrar Empresa</button>
      </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.php">Velozmente</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Sobre nós</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#tutorial">Como Funciona</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Equipe</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contato</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" onclick="emConstrucao()" href="#">Rastrear Produto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="form-centralizado">
			<form method="POST">
				<div id="block">
					<div class="form-group">
						<label class="Meu-Label" for="Login"> Login </label>
						<input type="text" name="login" id="login" placeholder="Digite o Seu Login" class="form-control Meu-Input" required>
					</div >

					
					<div class="form-group">
						<label class="Meu-Label" for="Senha"> Senha </label>
						<input type="password" name="senha" id="Senha" placeholder="Digite a sua Senha" class="form-control Meu-Input" required/>
					</div >
            <p>
            
              <?php
                if(is_null($mensagem)){

                }else{
                  echo $mensagem;
                }
              ?>
            </p>

          <input class="btn btn-info" type="submit" name="btn-logar-empresa" id="btn-logar" value="Área Empresarial" >
          <input class="btn btn-success old" type="submit" name="btn-logar-funcionario" id="btn-logar" value="Funcionario" >
				
				

				</div>
			</form>
		</div>			
        </div>
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Sobre Nós</h2>
            <h3 class="section-subheading text-muted">Nosso sistema auxilia empresas para que tenham uma melhor performance em seu quesito de entregas, buscando melhores rotas com o menor tempo possível com apenas alguns comandos, beneficiando a empresa e seus clientes.
 </h3>
            <h3 class="section-subheading text-muted">Por que usar o velozmente?</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Econômico</h4>
            <p class="text-muted">Nosso sistema foi desenvolvido sem fins lucrativos para beneficiar empreendedores que atuam na área de entrega e transporte e seus clientes.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Facil</h4>
            <p class="text-muted">Com designs intuitivos e dinâmicos em todo nosso site, temos como principio fazer com que qualquer usuário possa usufruir 100% de nossa plataforma</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-truck-moving fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Veloz</h4>
            <p class="text-muted">Buscamos as melhores rotas para as entregas evitando transtornos para a empresa e cliente. </p>
          </div>
        </div>
      </div>
    </section>

  <section id="tutorial">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Como funciona nossa plataforma</h2>
            <h3 class="section-subheading text-muted">Ela é dividida em três áreas, sendo elas: empresa, funcionário e cliente.    A empresa, é responsável por se cadastrar no sistema assim como deve cadastrar seus funcionários e clientes. O funcionário é responsável por realizar as entregas e o cliente pode rastrear seu produto com o código recebido via sms. </h3>

          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                   <h4>1</h4>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>1° Passo </h4>
                    <h4 class="subheading">Cadastrar Empresa</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">A empresa se cadastra com seus dados e acessa a plataforma.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>2° Passo</h4>
                    <h4 class="subheading">Cadastrar Funcionario</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">No menu funcionário, a empresa cadastra os funcionários responsáveis por realizar as entregas. (uma mensagem via sms irá ser enviada para ele, informando seu login e senha para acessar à plataforma). </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>3° Passo</h4>
                    <h4 class="subheading">Cadastrar Cliente</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">No menu cliente, a empresa cadastra seus clientes no qual irá ser entregue o produto.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>4° Passo</h4>
                    <h4 class="subheading">Cadastrar Entrega</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">No menu Entrega, a empresa cadastra suas entregas informando o funcionário que vai entregar e o cliente que vai receber. (é nesse momento que um código aleatório via sms irá ser enviado para o cliente rastrear seu produto em tempo real).</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>5° Passo</h4>
                    <h4 class="subheading">Finalizando Entrega</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Após entregar o produto, o funcionário deve finalizar a entrega na plataforma. (um relatório será realizado informando o tempo gasto, distância, combustível etc, podendo ser visualizado pela empresa a qualquer momento). </p>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Desenvolvedores</h2>
            <h3 class="section-subheading text-muted">Nossa Equipe surgiu por meio do Curso Técnico em Informática da Escola Waldemir Barros da Silva em Campo Grande (MS), para o Trabalho de Conclusão de Curso. Apartir disso trabalhos em equipe para entregarmos um sistema de ótima qualidade. </h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="imagem/equipe/1.jpg" alt="">
              <h4>Igor Pleutin</h4>
              <p class="text-muted"></p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  
                </li>
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.facebook.com/igor.pleutin">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="imagem/equipe/2.jpg" alt="">
              <h4>Jean Martins</h4>
              <p class="text-muted"></p>
              <ul class="list-inline social-buttons">
               
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.facebook.com/jean.martins.180">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="imagem/equipe/3.jpg" alt="">
              <h4>Samuel Benites</h4>
              <p class="text-muted"></p>
              <ul class="list-inline social-buttons">
                
                <li class="list-inline-item">
                  <a target="_blank" href="https://www.facebook.com/samuelbeniteszs">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
        
    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contato</h2>
            <h3 class="section-subheading text-muted">Quer nos conhecer melhor? Tem alguma sugestão? Nos envie uma mensagem!</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Digite Seu Nome" >
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Digite Seu Email">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Digite Seu Telefone (opcional)">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Digite Sua Mensagem"></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="#" class="btn btn-primary btn-xl text-uppercase" onclick="emConstrucao()" type="#">Enviar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Velozmente 2018</span>
          </div>
          
          
        </div>
      </div>
    </footer>

 <!-- MODAL DE CADASTRO -->
  <div class="modal fade cadastre" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">

      <div class="modal-body">

            <form method="POST">
          <div class="corpo-modal cadastre ">           
              <span class="input-group-addon" id="basic-addon1">Nome Da Empresa</span>
              <input type="text" class="form-control" placeholder="Nome" aria-describedby="basic-addon1" name="cnome" required>

              <span class="input-group-addon" id="basic-addon1">Login</span>
              <input type="text" class="form-control" placeholder="Ex: Velozmente01" aria-describedby="basic-addon1" name="clogin" required>

              <span class="input-group-addon" id="basic-addon1">Senha</span>
              <input type="password" class="form-control" placeholder="Ex: velozmente001" aria-describedby="basic-addon1" name="csenha" required>

              <span class="input-group-addon" id="basic-addon1">Email</span>
              <input type="email" class="form-control" placeholder="Ex: velozmente0000@gmail.com" aria-describedby="basic-addon1" name="cemail" required>

              <span class="input-group-addon" id="basic-addon1">Cnpj</span>
              <input type="number" class="form-control" placeholder="" aria-describedby="basic-addon1" name="cCpf" required>

              <div class="row">
                    <div class="col">
                      <span class="input-group-addon" id="basic-addon1">Rua</span>
                      <input type="text" name="rua" class="form-control" placeholder="Ex: Rua Palmacia ">
                    </div>

                    <div class="col col-md-2">
                      <span class="input-group-addon" id="basic-addon1">N°</span>
                      <input type="number" name="numero" class="form-control" placeholder="Ex: 300">
                    </div>

                    <div class="col-md-4">
                      <span class="input-group-addon" id="basic-addon1">Bairro</span>
                      <input type="text" name="bairro" class="form-control" placeholder="Ex: Moreninha 2">
                    </div>
                  </div>

              <span class="input-group-addon" id="basic-addon1">Telefone</span>
              <input type="number" class="form-control" placeholder="" aria-describedby="basic-addon1" name="telefone" required>
            </div>

              
          <div class="modal-footer">
            <button type="submit" class="btn btn-success" name="btn-cadastrar">Cadastrar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>

        </form>
      </div>
      </div>
    </div>
  </div>





    <!-- Bootstrap core JavaScript -->
    <script src="componentes/jquery/jquery.min.js"></script>
    <script src="componentes/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="componentes/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="componentes/js/jqBootstrapValidation.js"></script>
    <script src="componentes/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="componentes/js/agency.min.js"></script>
    <script type="text/javascript">
      function emConstrucao(){
        alert("Pagina ainda em Desenvolvimento!");
      }

    </script>

  </body>

</html>
