 <?php
	include_once("includes/Conexao.class.php");	
	include_once("dao/DaoEntrega.class.php");	
	

	class entregaController{
		public function cadastrarEntrega($post){
			$dao = new DaoEntrega();
			$vetorDeProdutos= $dao->cadastrarEntrega($post); 
			return $vetorDeProdutos; 
		}
		public function listarEntrega(){
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

		public function atualizarEntrega($post){
			$dao = new DaoEntrega();
			$resposta = $dao->atualizar($post);

			if($resposta > 0){
				header('location:entrega.php');
			}
		}
		
	}

?>
