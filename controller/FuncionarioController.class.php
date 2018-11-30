 <?php
	include_once("dao/DaoFuncionario.class.php");

	class FuncionarioController{
		public function cadastrarFuncionario($dadosDoFormulario){
			$dao = new DaoFuncionario();
			$funcionario = $this->formularioDeCadastroParaFuncionario($dadosDoFormulario);
			$resposta= $dao->cadastrarFuncionarioNoBd($funcionario);
			
			if($resposta > 0){
					 ?>
					<script> alert("Cadastro Realizado com Sucesso!"); </script>

					
					<?php
			}else{
					?>
					<script> alert("Não foi Possível se Cadastrar. Tente Novamente!"); </script>
					<?php
			}
		}
			

		

		public function formularioDeCadastroParaFuncionario($dadosDoFormulario){
			$funcionario = new Funcionario();
			$funcionario->setNome($dadosDoFormulario['nome']);
			$funcionario->setLogin($dadosDoFormulario['login']);
			$funcionario->setSenha($dadosDoFormulario['senha']);
			$funcionario->setEmail($dadosDoFormulario['email']);
			return $funcionario;
		}

		public function buscarFuncionarioPorEmpresa($idEmpresa){
			$dao = new DaoFuncionario();
			$vetorDeProduto = $dao->listarFuncionarios($idEmpresa);
		}
 
		public function buscarFuncionarioPorId($id){
			$dao = new DaoFuncionario();
			return $dao->buscarPorId($id);
		}
		public function excluir($idfuncionario){
			$dao = new DaoFuncionario();
			$dao->excluir($idfuncionario);
		}

		public function atualizarFuncionario($post){
			$dao = new DaoFuncionario();
			$resposta = $dao->atualizar($post);
			if($resposta > 0){
			header('location:funcionario.php?$rps=s');
		
		}
		
	}
}

	
?>