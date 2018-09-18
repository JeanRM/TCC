<?php
	class Usuario{
		private $idEmpresa;
		private $nome;
 		private $login;
		private $senha;
		private $cnpj; 
		private $email; 
		private $telefone;  

		public function getIdEmpresa(){
			return $this->idEmpresa;
		}
		public function setIdEmpresa($idEmpresa){
			$this->idEmpresa = $idEmpresa;
		}

		

		public function getNome(){
			return $this->nome;
		}
		public function setNome($nome){
			$this->nome = $nome;
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



		public function getCnpj(){
			return $this->cpf;
		}
		public function setCnpj($cnpj){
			$this->cpf = $cnpj;
		}


		public function getTelefone(){
			return $this->telefone;
		}
		public function setTelefone($telefone){
			$this->telefone = $telefone;
		}


		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}

	}
?>