<?php
	class Funcionario{
		private $idFuncionario;
		private $nome;
		private $login;
		private $senha;
		private $email;
		


		public function getIdFuncionario(){
			return $this->idFuncionario;
		}
		public function setIdFuncionario($idFuncionario){
			$this->idFuncionario = $idFuncionario;
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

		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}


	}
?>