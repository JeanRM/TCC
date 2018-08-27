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
	}
?>