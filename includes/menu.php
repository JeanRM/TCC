<?php
	include_once("controller/EntrouController.class.php");
	include_once("controller/MinhaContaController.class.php");
	$controleEntrou  = new EntrouController();
	$controleEntrou->verificaLogado();	

	if (isset($_POST["MinhaConta"])){
		$controle = new MinhaContaController();
		$controle->buscaDados($_POST);		
	}

	if (isset($_POST["MinhaConta"])){
		$controle = new MinhaContaController();
		$controle->buscaDados($_POST);		
	}	
?>

<head>	    
	<meta charset="utf-8">
	<title>VelozMente</title>
    <link rel="stylesheet" href="componentes/Bootstrap/css/bootstrap.min.css"/>
    <link href="componentes/fontawesome-5.0.13/css/fontawesome-all.min.css" rel="stylesheet" type="text/css">
    <link href="componentes/jquery/jquery-3.2.1.min.js" rel="stylesheet" type="text/css">
    	<link rel="stylesheet" href="css/estilo-tela-entrou.css">
    <link rel="shortcut icon" type="image/png" href="imagens/logo.jpg"/>
</head>

<body>      
	
    <header>
    	<div id="icone-usuario">   			
	</header>			  

			  

	<input type="checkbox" id="chk">
	<label for="chk" class="menu-icon">&#9776;</label>
		  
	<div id="bg"></div>
		<nav class="menu" id="principal">
		    <ul>
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
			        <a class="nav-link" href="entrou.php">
			            <i class="fas fa-home"></i>
			            <span class="nav-link-text">Início</span>
			        </a>
			    </li>
				
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
			        <a class="nav-link" href="funcionario.php">
			        	<i class="fas fa-address-card"></i>
			        	<span class="nav-link-text">Funcionário</span>
			        </a>
			    </li>

			    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
			        <a class="nav-link" href="cliente.php">
			        	<i class="fas fa-address-card"></i>
			        	<span class="nav-link-text">Cliente</span>
			        </a>
			    </li>

			    
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
			        <a class="nav-link" href="entrega.php">
			            <i class="fas fa-truck"></i>
			            <span class="nav-link-text">Entregas</span>
			        </a>
			    </li>

			    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
			        <a class="nav-link" onclick="emConstrucao()" href="#">
			            <i class="fas fa-chart-bar"></i>
			            <span class="nav-link-text">Relatórios</span>
			        </a>
			    </li>

			    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
			        <a class="nav-link" onclick="emConstrucao()" href="#">
			            <i class="far fa-user-circle"></i>
			            <span class="nav-link-text">Minha Conta</span>
			        </a>
			    </li>

			    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
			        <a class="nav-link" href="sair.php">
			            <i class="fas fa-sign-out-alt"></i>
			            <span class="nav-link-text">Sair</span>
			        </a>
			    </li>
			</ul>
			   
		</nav>
	</div>

	
</body>
<script type="text/javascript">
	function emConstrucao()
		{
		    alert("Pagina ainda em Desenvolvimento!");
		}
</script>