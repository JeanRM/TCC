 <?php
	include_once("dao/DaoCliente.class.php");	
	

	class ClienteController{
		public function cadastrarCliente($dadosDoFormulario){
			$dao = new DaoCliente();
			$cliente = $this->formularioDeCadastroParaObjeto($dadosDoFormulario);
			$resposta = $dao->cadastrarCliente($cliente);
			return $resposta;
		}

		public function excluir($idcliente){
			$dao = new DaoCliente();
			$cliente = $dao->excluirCliente($idcliente);
			return $cliente;
		}

















		public function formularioDeCadastroParaObjeto($dadosDoFormulario){
			$cliente = new Cliente();
			$cliente->setNome($dadosDoFormulario['nome']);
			$cliente->setRua($dadosDoFormulario['rua']);
			$cliente->setNumero($dadosDoFormulario['numero']);
			$cliente->setBairro($dadosDoFormulario['bairro']);
			$cliente->setCpf($dadosDoFormulario['cpf']);
			$cliente->setTelefone($dadosDoFormulario['telefone']);
			$cliente->setEmail($dadosDoFormulario['email']);
			return $cliente;
		}
		
	}

?>
