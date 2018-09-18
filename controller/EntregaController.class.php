 <?php
	include_once("includes/Conexao.class.php");	
	include_once("dao/DaoProduto.class.php");
	include_once("model/Produto.class.php");

	class ControllerEntrega{
		public function buscarEntrega{
			$dao = new DaoEntrega();
			$vetorDeProdutos= $dao->listarEntrega(); 
			return $vetorDeProdutos; 
		}

		public function cadastrarEntrega{
			$dao = new DaoEntrega();
			$vetorDeProdutos= $dao->listarEntrega(); 
			return $vetorDeProdutos; 
		}
		
	}

?>
