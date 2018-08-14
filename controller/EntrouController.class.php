<?php 
	include_once ("dao/DaoUsuario.class.php");
	
	class EntrouController{
		public function buscaDados(){
			session_start();
			$idCliente = $_SESSION['codigo'];
			$dao = new DaoUsuario();
			$dados = $dao->puxaDado($idCliente);

		}
	}		
 ?>