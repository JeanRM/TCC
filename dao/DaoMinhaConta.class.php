<?php
	include_once("includes/Conexao.class.php");	

	class DaoMinhaConta{
		public function listarDados ($idEmpresa){ 
			$sql = "SELECT * FROM tb_empresa WHERE id_empresa = :idempresa";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":idempresa",$idEmpresa);
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
			$usuario->setNome($dadosDoBanco['nome_empresa']);
			$usuario->setLogin($dadosDoBanco['login_empresa']);
			$usuario->setSenha($dadosDoBanco['senha_empresa']);
			$usuario->setCnpj($dadosDoBanco['cnpj_empresa']);
			$usuario->setTelefone($dadosDoBanco['telefone_empresa']);
			$usuario->setEmail($dadosDoBanco['email_empresa']);
			return $usuario;
		
		}
	}

?>