<?php 
	include_once ("dao/DaoUsuario.class.php");
	
	class EntrouController{
		public function verificaLogado(){
			session_start();

			if($_SESSION['logado'] != true){
				unset($_SESSION);
				header("location: index.php?erro=true&msg= Realize seu login para acesar o site");
			}
		}

		public function sair(){
			session_start();
			unset($_SESSION);
			session_destroy();
			header("location: index.php");
		}
	}		
 ?>