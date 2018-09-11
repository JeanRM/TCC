<?php
	include_once("includes/Conexao.class.php");
	include_once ("model/Funcionario.class.php");	

	class DaoFuncionario{
		public function cadastrarFuncionarioNoBd($funcionario){
			$sql = "INSERT INTO tb_funcionario (id_funcionario, nome_funcionario, login_funcionario, senha_funcionario) VALUES ('', :nome, :login, :senha)";
			


			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$funcionario->getNome());
			$sqlPreparado->bindValue(":login",$funcionario->getLogin());
			$sqlPreparado->bindValue(":senha",$funcionario->getSenha());
			$sqlPreparado->execute();
			return $sqlPreparado->rowCount();
		}

		public function listarFuncionarios($idEmpresa){
			$sql = "SELECT * FROM tb_funcionario";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":empresa",$idEmpresa);
			$resposta = $sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			// var_dump($lista);

			$vetorDeObjetos = array();
			foreach ($lista as $linha) {
					$vetorDeObjetos [] = $this ->transformaFuncionarioDoBancoEmObjeto ($linha);
			} 
			
			return $vetorDeObjetos;
		}
		public function transformaFuncionarioDoBancoEmObjeto($dadosDoBanco){
			$funcionario = new Funcionario();
			$funcionario->setIdFuncionario($dadosDoBanco['id_funcionario']);
			$funcionario->setNome($dadosDoBanco['nome_funcionario']);
			$funcionario->setLogin($dadosDoBanco['login_funcionario']);
			$funcionario->setSenha($dadosDoBanco['senha_funcionario']);
			return $funcionario;

		}


		public function excluir($id){
			$sql = "DELETE  FROM tb_funcionario WHERE id_funcionario=:id";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":id",$id);
			$resposta = $sqlPreparado->execute();
		}	
	}
?>