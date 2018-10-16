 <?php
	include_once("includes/Conexao.class.php");	

	class entregaController{
		public function cadastrarEntrega($post){
			$dao = new DaoEntrega();
			$vetorDeProdutos= $dao->cadastrarEntrega($post); 
			return $vetorDeProdutos; 
		}
		public function buscarEntrega(){
			$dao = new DaoEntrega();
			$vetorDeProdutos= $dao->listarEntrega(); 
			return $vetorDeProdutos; 
		}

		public function buscarEntregaPorId($id){
			$dao = new DaoEntrega();
			return $dao->buscarPorId($id);
		}
 
		public function excluir($identrega){
			$dao = new DaoEntrega();
			$entrega = $dao->excluir($identrega);
			return $entrega;
		}
		
	}

?>
