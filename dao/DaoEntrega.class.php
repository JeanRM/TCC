<?php
	include_once("includes/Conexao.class.php");	

	class DaoEntrega{
		public function listarEntrega() {
			$sql = "SELECT * FROM tb_entrega";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$resposta = $sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			// var_dump($lista);

			$vetorDeObjetos = array();
			foreach ($lista as $linha) {
					$vetorDeObjetos [] = $this ->transformaDadosDoBancoEmObjeto ($linha);
			} 
			
			return $vetorDeObjetos; 
		}

		public function transformaDadosDoBancoEmObjeto($dadosDoBanco){
			$entrega = new Entrega();
			$entrega->setIdEntrega($dadosDoBanco['id_entrega']);
			$entrega->setProduto($dadosDoBanco['produto']);
			$entrega->setEntregador($dadosDoBanco['entregador']);
			$entrega->setDataEntrega($dadosDoBanco['data_entrega']);
			$entrega->setStatus($dadosDoBanco['status']);
			$entrega->setDescricao($dadosDoBanco['descricao']);
			$entrega->setDestinatario($dadosDoBanco['destinatario']);
			$entrega->setImagem($dadosDoBanco['imagem']);
			$entrega->setPreco($dadosDoBanco['preco']);
			$entrega->setInfoRemetente($dadosDoBanco['info_remetente']);		
			return $entrega;
		
		}

	}

?>