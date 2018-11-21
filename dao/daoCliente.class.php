<?php
	include_once("includes/Conexao.class.php");	
	include_once("model/Entrega.class.php");	
	class DaoCliente{
		public function cadastrarCliente($cliente){
			$id_empresa;
			$id_empresa = $_SESSION['codigo'];
			$sql = "INSERT INTO tb_cliente (id_cliente, id_empresa, nome_cliente, Rua, Numero, Bairro, cpf_cliente, telefone_cliente, email_cliente) VALUES ('', :id_empresa, :nome , :rua, :numero, :bairro, :cpf, :telefone,  :email)";
		
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id_empresa",$id_empresa);
			$sqlPreparado->bindValue(":nome",$cliente->getNome());		
			$sqlPreparado->bindValue(":rua",$cliente->getRua());	
			$sqlPreparado->bindValue(":numero",$cliente->getNumero());
			$sqlPreparado->bindValue(":bairro",$cliente->getBairro());
			$sqlPreparado->bindValue(":cpf",$cliente->getCpf());
			$sqlPreparado->bindValue(":telefone",$cliente->getTelefone());
			$sqlPreparado->bindValue(":email",$cliente->getEmail());				
			$sqlPreparado->execute();
			return $sqlPreparado->rowCount();
		}

		public function listarClientes($id){
			$sql = "SELECT * FROM tb_empresa e INNER JOIN tb_cliente f ON (e.id_empresa=f.id_empresa) where e.id_empresa = :idempresa";
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
			$cliente = new Cliente();
			$cliente->setIdCliente($dadosDoBanco['id_cliente']);
			$cliente->setIdEmpresa($dadosDoBanco['id_empresa']);
			$cliente->setNome($dadosDoBanco['nome_cliente']);
			$cliente->setRua($dadosDoBanco['Rua']);
			$cliente->setNumero($dadosDoBanco['Numero']);
			$cliente->setBairro($dadosDoBanco['Bairro']);
			$cliente->setCpf($dadosDoBanco['cpf_cliente']);
			$cliente->setTelefone($dadosDoBanco['telefone_cliente']);
			$cliente->setEmail($dadosDoBanco['email_cliente']);
			return $cliente;
		}



	}


?>