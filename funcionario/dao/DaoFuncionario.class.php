<?php
	include_once("includes/Conexao.class.php");
	include_once ("model/Funcionario.class.php");	

	class DaoFuncionario{
		public function listarEntregas($id){
			$sql = "SELECT id_entrega, en.id_empresa, en.id_funcionario, en.id_cliente,  produto, data_entrega, preco,     f.nome_funcionario AS entregador, cl.nome_cliente AS cliente, cl.Rua AS Rua, cl.Numero AS Numero, cl.Bairro AS Bairro FROM tb_entrega en 
			INNER JOIN tb_empresa em ON (en.id_empresa=em.id_empresa) 
			INNER JOIN tb_funcionario f ON (en.id_funcionario=f.id_funcionario) 
			INNER JOIN tb_cliente cl ON (en.id_cliente=cl.id_cliente) 
			

			WHERE f.id_funcionario = :idfuncionario";

		//	$sql = "SELECT id_entrega, en.id_empresa, en.id_funcionario, en.id_cliente,  produto, data_entrega, preco,     f.nome_funcionario AS entregador, cl.nome_cliente AS cliente  FROM tb_entrega en INNER JOIN tb_empresa em ON (en.id_empresa=em.id_empresa) 			INNER JOIN tb_funcionario f ON (en.id_funcionario=f.id_funcionario) 			INNER JOIN tb_cliente cl ON (en.id_cliente=cl.id_cliente) 			WHERE en.id_empresa = :idempresa";
			
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":idfuncionario",$id);
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
			$funcionario->setIdEmpresa($dadosDoBanco['id_empresa']);
			$funcionario->setIdFuncionario($dadosDoBanco['id_funcionario']);
			$funcionario->setProduto($dadosDoBanco['produto']);
			$funcionario->setEntregador($dadosDoBanco['entregador']);
			$funcionario->setCliente($dadosDoBanco['cliente']);
			$funcionario->setDataEntrega($dadosDoBanco['data_entrega']);
			$funcionario->setPreco($dadosDoBanco['preco']);
			$funcionario->setRua($dadosDoBanco['Rua']);
			$funcionario->setNumero($dadosDoBanco['Numero']);
			$funcionario->setBairro($dadosDoBanco['Bairro']);
			return $funcionario;
		}		
	}
?>