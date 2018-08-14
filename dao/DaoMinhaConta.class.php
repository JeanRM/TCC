<?php
	include_once("includes/Conexao.class.php");	

	class DaoMinhaConta{
		public function listarDados ($idCliente){
			$sql = "SELECT * FROM tb_cliente WHERE id_cliente = :idcliente";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":idcliente",$idCliente);
			$sqlPreparado->execute();
			$lista = $sqlPreparado->fetchAll(PDO::FETCH_ASSOC);
			var_dump($lista);
		}
	}

?>