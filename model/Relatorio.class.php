 <?php
	class Relatorio{
		private $idRelatorio;
		private $idEmpresa;
		private $idFuncionario;
		private $idCliente;
		private $produto;
		private $dataEntrega;

		public function getIdRelatorio(){
			return $this->idRelatorio;
		}
		public function setIdRelatorio($idRelatorio){
			$this->idRelatorio = $idRelatorio;
		}

		public function getIdEmpresa(){
			return $this->idEmpresa;
		}
		public function setIdEmpresa($idEmpresa){
			$this->idEmpresa = $idEmpresa;
		}

		public function getIdFuncionario(){
			return $this->idFuncionario;
		}
		public function setIdFuncionario($idFuncionario){
			$this->idFuncionario = $idFuncionario;
		}


		public function getIdCliente(){
			return $this->idCliente;
		}
		public function setIdCliente($idCliente){
			$this->idCliente = $idCliente;
		}


		public function getProduto(){
			return $this->produto;
		}
		public function setProduto($produto){
			$this->produto = $produto;
		}

		
		public function getDataEntrega(){
			return $this->dataEntrega;
		}
		public function setDataEntrega($dataEntrega){
			$this->dataEntrega = $dataEntrega;
		}
	}
?>