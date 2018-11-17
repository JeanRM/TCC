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
      <button type="button" class="btn btn-info float-right btn-cadastro cadastre-se" data-toggle="modal" data-target=".cadastre">Cadastre-se</button>
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
	
					</p>

					<input class="btn btn-info float-left" type="submit" name="btn-logar-empresa" id="btn-logar" value="Área Empresarial" >
					<input class="btn btn-success float-right" type="submit" name="btn-logar-funcionario" id="btn-logar" value="Funcionario" >

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
            <p class="text-muted">Nosso sistema foi desenvolvido sem fins lucrativos com o intuito de concluirmos nosso Trabalho de Conclusão de Curso do Curso Técnico em Informática da escola Waldemir Barros da Silva em Campo Grande (MS) e beneficiar empreendedores que atuam na área de entrega e transporte e seus clientes.</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Facil</h4>
            <p class="text-muted">Nosso sistema foi desenvolvido para que qualquer usuário possa usufruir 100% dessa ferramenta, para isso, usamos designs intuitivos e dinâmicos em todo nosso site</p>
          </div>
          <div class="col-md-4">
            <span class="fa-stack fa-4x">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-truck-moving fa-stack-1x fa-inverse"></i>
            </span>
            <h4 class="service-heading">Veloz</h4>
            <p class="text-muted">Nosso sistema é...</p>
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
                  <a href="https://www.facebook.com/igor.pleutin">
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
                  <a href="https://www.facebook.com/jean.martins.180">
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
                  <a href="https://www.facebook.com/samuelbeniteszs">
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
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Digite Seu Nome" required="required" data-validation-required-message="Digite Seu Nome">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Digite Seu Email" required="required" data-validation-required-message="Digite um Email">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Digite Seu Telefone (opcional)">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Digite Sua Mensagem" required="required" data-validation-required-message="Digite uma mensagem"></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
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
      <div class="modal-content">

      <div class="modal-body">

            <form method="POST">
          <div class="corpo-modal">           
            <div id="cadastro-funcionario">
              <span class="input-group-addon" id="basic-addon1">Nome</span>
              <input type="text" class="form-control" placeholder="Nome Empresa" aria-describedby="basic-addon1" name="cnome" required>

              <span class="input-group-addon" id="basic-addon1">Login</span>
              <input type="text" class="form-control" placeholder="Ex: Velozmente01" aria-describedby="basic-addon1" name="clogin" required>

              <span class="input-group-addon" id="basic-addon1">Senha</span>
              <input type="password" class="form-control" placeholder="Ex: velozmente001" aria-describedby="basic-addon1" name="csenha" required>

              <span class="input-group-addon" id="basic-addon1">Email</span>
              <input type="email" class="form-control" placeholder="Ex: velozmente0000@gmail.com" aria-describedby="basic-addon1" name="cemail" required>

              <span class="input-group-addon" id="basic-addon1">Cnpj</span>
              <input type="number" class="form-control" placeholder="" aria-describedby="basic-addon1" name="cCpf" required>

              <span class="input-group-addon" id="basic-addon1">Endereco</span>
              <input type="text" class="form-control" placeholder="" aria-describedby="basic-addon1" name="cEndereco" required>

              <span class="input-group-addon" id="basic-addon1">Telefone</span>
              <input type="number" class="form-control" placeholder="" aria-describedby="basic-addon1" name="cTelefone" required>

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
