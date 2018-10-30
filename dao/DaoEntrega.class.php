  <?php
	include_once("includes/Conexao.class.php");	
	include_once("model/Entrega.class.php");	
	class DaoEntrega{
		public function cadastrarEntrega($post){
			$id_empresa = $_SESSION['codigo'];
			$sql = "INSERT INTO tb_entrega (id_entrega, id_empresa, produto, data_entrega, descricao, destinatario, preco) VALUES ('', :id_empresa, :produto, :, :dataEntrega, :descricao, '', :destinatario, :preco)";
			


			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id_empresa",$id_empresa);
			$sqlPreparado->bindValue(":produto",$post['produto']);
			$sqlPreparado->bindValue(":data_entrega",$post['data']);
			$sqlPreparado->bindValue(":descricao",$post['descricao']);
			$sqlPreparado->bindValue(":destinatario",$post['destinatario']);
			$sqlPreparado->bindValue(":preco",$post['preco']);		
			$sqlPreparado->bindValue(":entregador",$post['preco']);				
			$sqlPreparado->execute();
		}

		public function listarEntregas() {
			$sql = "SELECT * FROM tb_entrega";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$resposta = $sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			// var_dump($lista);

			$vetorDeObjetos = array();
			foreach ($lista as $linha) {
					$vetorDeObjetos [] = $this ->transformaDadosDoBancoEmObjeto ($linha);
			} 
			
			return $vetorDeObjetos; 
		}

		public function excluir($id){
			$sql = "DELETE  FROM tb_entrega WHERE id_entrega=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
		}

		public function atualizar($post){
			$sql = "UPDATE tb_entrega SET id_entrega=:id, produto=:produto, entregador=:entregador, data_entrega=:data, status=:status WHERE id_funcionario=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$post['codigo']);
			$sqlPreparado->bindValue(":produto",$post['nome']);
			$sqlPreparado->bindValue(":entregador",$post['entregador']);
			$sqlPreparado->bindValue(":data",$post['data_entrega']);
			$sqlPreparado->bindValue(":status",$post['status']);
			$resposta = $sqlPreparado->execute();
			if($resposta > 0){
				header('location:entrega.php');		
			}
			return $resposta;
		}		 



		public function buscarPorId($id){
			$sql = "select * from tb_entrega where id_entrega = :id";
			
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
			$entrega = $this->transformaDadosDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
			return $entrega;
		}

		public function transformaDadosDoBancoEmObjeto($dadosDoBanco){
			$entrega = new Entrega();
			$entrega->setIdEntrega($dadosDoBanco['id_entrega']);
			$entrega->setProduto($dadosDoBanco['produto']);
			$entrega->setEntregador($dadosDoBanco['entregador']);
			$entrega->setDataEntrega($dadosDoBanco['data_entrega']);
			$entrega->setStatus($dadosDoBanco['status']);
			$entrega->setDescricao($dadosDoBanco['descricao']);
			$entrega->setDestinatario($dadosDoBanco['destinatario']);
			$entrega->setImagem($dadosDoBanco['imagem']);
			$entrega->setPreco($dadosDoBanco['preco']);	
			return $entrega;
		}



	}

?>