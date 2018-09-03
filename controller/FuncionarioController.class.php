<?php
	include_once("dao/DaoFuncionario.class.php");

	class FuncionarioController{
		public function cadastrarFuncionario($dadosDoFormulario){
			$dao = new DaoFuncionario();
			$funcionario = $this->formularioDeCadastroParaFuncionario($dadosDoFormulario);
			$resposta= $dao->cadastrarFuncionarioNoBd($funcionario);

			if($resposta > 0){
				 return "Salvou";
			}else{
				 return "Não Salvou";
			}

		}

		public function formularioDeCadastroParaFuncionario($dadosDoFormulario){
			$funcionario = new Funcionario();
			$funcionario->setNome($dadosDoFormulario['nome']);
			$funcionario->setLogin($dadosDoFormulario['login']);
			$funcionario->setSenha($dadosDoFormulario['senha']);
			return $funcionario;
		}

		public function buscarFuncionarioPorEmpresa($idEmpresa){
			$dao = new DaoFuncionario();
			$vetorDeProduto = $dao->listarFuncionariosPorEmpresa($idEmpresa);
			return $vetorDeProduto;
		}
		
	}

	
?>