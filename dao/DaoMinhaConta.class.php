<?php
	include_once("includes/Conexao.class.php");	

	class DaoMinhaConta{
		public function listarDados ($idCliente){ 
			$sql = "SELECT * FROM tb_cliente WHERE id_cliente = :idcliente";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":idcliente",$idCliente);
			$sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);

			$vetorDeObjetos = array();
			foreach ($lista as $linha) {
					$vetorDeObjetos [] = $this ->transformaDadosDoBancoEmObjeto ($linha);
			} 
			
			return $vetorDeObjetos;
		}

		public function transformaDadosDoBancoEmObjeto($dadosDoBanco){
			$usuario = new Usuario();
			$usuario->setNome($dadosDoBanco['nome_cliente']);
			$usuario->setSenha($dadosDoBanco['senha_cliente']);
			$usuario->setCpf($dadosDoBanco['cpf_cliente']);
			$usuario->setTelefone($dadosDoBanco['telefone_cliente']);
			$usuario->setEmail($dadosDoBanco['email_cliente']);
			$usuario->setSexo($dadosDoBanco['sexo_cliente']);
			return $usuario;
		
		}
	}

?>