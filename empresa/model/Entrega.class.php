 <?php
	class Entrega{
		private $idEntrega;
		private $produto;
		private $entregador;
		private $dataEntrega;
		private $status;
		private $descricao;
		private $destinatario;
		private $imagem;
		private $infoRemetente;
		private $preco;

		public function getIdEntrega(){
			return $this->idEntrega;
		}
		public function setIdEntrega($idEntrega){
			$this->idEntrega = $idEntrega;
		}		

		public function getProduto(){
			return $this->produto;
		}
		public function setProduto($produto){
			$this->produto = $produto;
		}


		public function getEntregador(){
			return $this->entregador;
		}
		public function setEntregador($entregador){
			$this->entregador = $entregador;
		}


		public function getDataEntrega(){
			return $this->dataEntrega;
		}
		public function setDataEntrega($dataEntrega){
			$this->dataEntrega = $dataEntrega;
		}


		public function getStatus(){
			return $this->status;
		}
		public function setStatus($status){
			$this->status = $status;
		}

		public function getDescricao(){
			return $this->descricao;
		}
		public function setDescricao($descricao){
			$this->descricao = $descricao;
		}


		public function getDestinatario(){
			return $this->destinatario;
		}
		public function setDestinatario($destinatario){
			$this->destinatario = $destinatario;
		}

		public function getImagem(){
			return $this->imagem;
		}
		public function setImagem($imagem){
			$this->imagem = $imagem;
		}

		public function getInfoRemetente(){
			return $this->infoRemetente;
		}
		public function setInfoRemetente($infoRemetente){
			$this->infoRemetente = $infoRemetente;
		}

		public function getPreco(){
			return $this->preco;
		}
		public function setPreco($preco){
			$this->preco = $preco;
		}
	}
?>