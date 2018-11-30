<?php
	include_once("includes/Conexao.class.php");	
	include_once("model/Relatorio.class.php");	
	class DaoRelatorio{
		public function GerarRelatorio($relatorio){
			$id_empresa;
			$id_empresa = $_SESSION['codigo'];
			$sql = "INSERT INTO tb_cliente (id_cliente, id_empresa, nome_cliente, Rua, Numero, Bairro, cpf_cliente, telefone_cliente, email_cliente) VALUES ('', :id_empresa, :nome , :rua, :numero, :bairro, :cpf, :telefone,  :email)";
		
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id_empresa",$id_empresa);
			$sqlPreparado->bindValue(":nome",$relatorio->getNome());		
			$sqlPreparado->bindValue(":rua",$relatorio->getRua());	
			$sqlPreparado->bindValue(":numero",$relatorio->getNumero());
			$sqlPreparado->bindValue(":bairro",$relatorio->getBairro());
			$sqlPreparado->bindValue(":cpf",$relatorio->getCpf());
			$sqlPreparado->bindValue(":telefone",$relatorio->getTelefone());
			$sqlPreparado->bindValue(":email",$relatorio->getEmail());				
			$sqlPreparado->execute();
			return $sqlPreparado->rowCount();
		}

		public function listarRelatorios($id){
			$sql = "

			SELECT id_relatorio, rela.id_empresa, rela.id_funcionario, rela.id_cliente, produto, data_entrega, f.nome_funcionario AS entregador, cl.nome_cliente AS nome_cliente 

			FROM tb_relatorio rela 

			INNER JOIN tb_empresa em ON (en.id_empresa=em.id_empresa) 
			INNER JOIN tb_cliente cl ON (en.id_cliente=cl.id_cliente) 
			INNER JOIN tb_funcionario f ON (en.id_funcionario=f.id_funcionario) WHERE en.id_empresa = :idempresa

			




			SELECT id_entrega, en.id_empresa, en.id_funcionario, en.id_cliente, produto, data_entrega, destinatario, status, preco, f.nome_funcionario AS entregador, cl.nome_cliente AS nome_cliente 

			FROM tb_entrega en 

			INNER JOIN tb_empresa em ON (en.id_empresa=em.id_empresa) 
			INNER JOIN tb_cliente cl ON (en.id_cliente=cl.id_cliente) 
			INNER JOIN tb_funcionario f ON (en.id_funcionario=f.id_funcionario) WHERE en.id_empresa = :idempresa
			
			";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":idempresa",$id);
			$resposta = $sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			// var_dump($lista);

			$vetorDeObjetos = array();
			foreach ($lista as $linha) {
					$vetorDeObjetos [] = $this ->transformaDadosDoBancoEmObjeto ($linha);
			} 
			
			return $vetorDeObjetos; 
		}
	
		public function excluirCliente($id){
			$sql = "DELETE FROM tb_cliente WHERE id_cliente=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
		}



		public function transformaDadosDoBancoEmObjeto($dadosDoBanco){
			$relatorio = new Relatorio();
			$relatorio->setIdRelatorio($dadosDoBanco['id_relatorio']);
			$relatorio->setIdEmpresa($dadosDoBanco['id_empresa']);
			$relatorio->setIdFuncionario($dadosDoBanco['id_funcionario']);
			$relatorio->setIdCliente($dadosDoBanco['id_cliente']);
			$relatorio->setProduto($dadosDoBanco['produto']);
			$relatorio->setDataEntrega($dadosDoBanco['data_entrega']);
			return $relatorio;
		}



	}


?>