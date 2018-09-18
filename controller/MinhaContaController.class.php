 <?php 
	include_once ("dao/DaoUsuario.class.php");
	include_once ("dao/DaoMinhaConta.class.php");
	
	class MinhaContaController{
		public function buscaDados(){
			$idEmpresa = $_SESSION['codigo'];
			$dao = new DaoMinhaConta();
			$dados = $dao->listarDados($idEmpresa);
			return $dados;

		}
	}
?>