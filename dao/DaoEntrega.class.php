<?php
	include_once("includes/Conexao.class.php");	

	class DaoProduto {
		public function listarProdutos () {
			$sql = "SELECT * FROM tb_entrega";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$resposta = $sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			var_dump($lista);

			//conectar com o banco 
			// escrever sql
			//executar sql
			//transformar banco em php

		}

	}

?>