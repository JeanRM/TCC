 <?php
	class Funcionario{
		private $idEntrega;
		private $idFuncionario;
		private $produto;
		private $entregador;
		private $dataEntrega;
		private $status;
		private $destinatario;
		private $preco;
		

		public function getIdEntrega(){
			return $this->idEntrega;
		}
		public function setIdEntrega($idEntrega){
			$this->idEntrega = $idEntrega;
		}


		public function getIdFuncionario(){
			return $this->idFuncionario;
		}
		public function setIdFuncionario($idFuncionario){
			$this->idFuncionario = $idFuncionario;
		}

		public function getProduto(){
			return $this->produto;
		}
		public function setProduto($produto){
			$this->produto = $produto;
		}		

		public function getLogin(){
			return $this->login;
		}
		public function setLogin($login){
			$this->login = $login;
		}


		public function getSenha(){
			return $this->senha;
		}
		public function setSenha($senha){
			$this->senha = $senha;
		}

		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}


	}
?>