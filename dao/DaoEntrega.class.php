<?php
	include_once("includes/Conexao.class.php");	
	include_once("model/Entrega.class.php");	
	class DaoEntrega{
		public function cadastrarEntrega($entrega){
			$id_empresa;
			$id_empresa = $_SESSION['codigo'];
			$sql = "INSERT INTO tb_entrega (id_entrega, id_empresa, id_funcionario, id_cliente, produto, data_entrega, descricao, preco) VALUES ('', :id_empresa, :id_funcionario, :id_cliente, :produto, :dataEntrega, :descricao, :preco)";
		 
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id_empresa",$id_empresa);
			$sqlPreparado->bindValue(":id_funcionario",$entrega->getIdFuncionario());
			$sqlPreparado->bindValue(":id_cliente",$entrega->getIdCliente());
			$sqlPreparado->bindValue(":produto",$entrega->getProduto());
			$sqlPreparado->bindValue(":dataEntrega",$entrega->getDataEntrega());
			$sqlPreparado->bindValue(":descricao",$entrega->getDescricao());
			$sqlPreparado->bindValue(":preco",$entrega->getPreco());				
			$sqlPreparado->execute();
			
			return $sqlPreparado->rowCount();
		}

		public function listarEntregas($id) {
			$sql = "SELECT id_entrega, en.id_empresa, en.id_funcionario, en.id_cliente,  produto, data_entrega, preco, cl.nome_cliente AS cliente, f.nome_funcionario AS entregador  FROM tb_entrega en 
			INNER JOIN tb_empresa em ON (en.id_empresa=em.id_empresa) 
			INNER JOIN tb_funcionario f ON (en.id_funcionario=f.id_funcionario) 
			INNER JOIN tb_cliente cl ON (en.id_cliente=cl.id_cliente) 

			WHERE en.id_empresa = :idempresa";

			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":idempresa",$id);
			$resposta = $sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			$vetorDeObjetos = array();
			foreach ($lista as $linha) {
					$vetorDeObjetos [] = $this ->transformaDadosDoBancoEmObjeto($linha);
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
			$entrega->setIdEmpresa($dadosDoBanco['id_empresa']);
			$entrega->setIdFuncionario($dadosDoBanco['id_funcionario']);
			$entrega->setProduto($dadosDoBanco['produto']);
			$entrega->setEntregador($dadosDoBanco['entregador']);
			$entrega->setCliente($dadosDoBanco['cliente']);
			$entrega->setDataEntrega($dadosDoBanco['data_entrega']);
			$entrega->setPreco($dadosDoBanco['preco']);	
			return $entrega;
		}



	}

?>