 <?php
	include_once("includes/Conexao.class.php");
	include_once ("model/Funcionario.class.php");	

	class DaoFuncionario{
		public function listarEntregas($id){
			$sql = "select * from tb_entrega e INNER JOIN tb_funcionario f ON (e.id_funcionario=f.id_funcionario) where e.id_empresa = :idempresa";
			
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":idempresa",$id);
			$resposta = $sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);

			$vetorDeObjetos = array();
			foreach ($lista as $linha) {
					$vetorDeObjetos [] = $this ->transformaEntregaDoBancoEmObjeto($linha);
			} 
			
			return $vetorDeObjetos;
		}
		

		public function transformaEntregaDoBancoEmObjeto($dadosDoBanco){
			$funcionario = new Funcionario();
			$funcionario->setIdEntrega($dadosDoBanco['id_entrega']);
			$funcionario->setIdEntrega($dadosDoBanco['id_funcionario']);
			$funcionario->setProduto($dadosDoBanco['produto']);
			$funcionario->setNome($dadosDoBanco['entregador']);
			$funcionario->setLogin($dadosDoBanco['data_entrega']);
			$funcionario->setSenha($dadosDoBanco['status']);
			$funcionario->setEmail($dadosDoBanco['destinatario']);
			$funcionario->setEmail($dadosDoBanco['preco']);
			return $funcionario;

		}		
	}
?>