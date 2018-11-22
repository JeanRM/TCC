<?php
	include_once("dao/DaoFuncionario.class.php");

	class FuncionarioController{
		public function listarEntregas($id){
			$dao = new DaoFuncionario();
			$vetorDeProdutos = $dao->listarEntregas($id); 
			return $vetorDeProdutos; 
		}


		public function formularioDeCadastroParaFuncionario($dadosDoFormulario){
			$funcionario = new Funcionario();
			$funcionario->setNome($dadosDoFormulario['nome']);
			$funcionario->setLogin($dadosDoFormulario['login']);
			$funcionario->setSenha($dadosDoFormulario['senha']);
			$funcionario->setEmail($dadosDoFormulario['email']);
			return $funcionario;
		}
		
	}
	
?>