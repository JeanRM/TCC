<?php
	class Usuario{
		private $idUsuario;
		private $nome;
		private $login;
		private $senha;
		private $cpf;

		public function getIdUsuario(){
			return $this->idUsuario;
		}
		public function setIdUsuario($idUsuario){
			$this->idUsuario = $idUsuario;
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



		public function getCpf(){
			return $this->cpf;
		}
		public function setCpf($cpf){
			$this->cpf = $cpf;
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