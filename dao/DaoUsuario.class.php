 <!DOCTYPE html>
 <html>
 <head>
 	<title>Inicio</title>
 	<link rel="stylesheet" href="../CSS/estilo-entrou.css"
 </head>
 <body>
 	<?php 
	include_once ("model/Usuario.class.php");
	include_once("includes/Conexao.class.php");
	
	class DaoUsuario{
		public function buscarUsuarioPorLogin($login){
			$sql = "SELECT * FROM tb_cliente WHERE login_cliente=:login";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":login",$login);
			$resposta = $sqlPreparado->execute();
			$usuario = $this->transformaUsuarioDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
			return $usuario;
			
		}
		public function salvarUsuarioNoBanco($usuario){
			$sql = "INSERT INTO tb_cliente (id_cliente, nome_cliente, login_cliente, senha_cliente, cpf_cliente, telefone_cliente, email_cliente) VALUES ('', :nome, :login, :senha, :cpf, :telefone, :email)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$usuario->getNome());
			$sqlPreparado->bindValue(":login",$usuario->getLogin());
			$sqlPreparado->bindValue(":senha",$usuario->getSenha());
			$sqlPreparado->bindValue(":cpf",$usuario->getCpf());
			$sqlPreparado->bindValue(":telefone",$usuario->getTelefone());
			$sqlPreparado->bindValue(":email",$usuario->getEmail());
			$sqlPreparado->execute();
			
			return $sqlPreparado->rowCount();;
		}
		public function transformaUsuarioDoBancoEmObjeto($dadosDoBanco){
			$usuario = new Usuario();
			$usuario->setIdUsuario($dadosDoBanco['id_cliente']);
			$usuario->setNome($dadosDoBanco['nome_cliente']);
			$usuario->setLogin($dadosDoBanco['login_cliente']);
			$usuario->setSenha($dadosDoBanco['senha_cliente']);
			return $usuario;
		}

		public function puxaDado($idCliente){
			$sql = "SELECT * FROM tb_cliente WHERE id_cliente = :idcliente";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":idcliente",$idCliente);
			$sqlPreparado->execute();

			while($lista = $sqlPreparado->fetch(PDO::FETCH_ASSOC)){
				
				?>
				<div id="dados">
					
					<label for="nome">Nome</label>
					<input name="nome" class="form-control Meu-Input" type="text" value="<?php echo $lista['nome_cliente']; ?>" name="nome" disabled> 

					<label for="login">Login</label>
					<input  name="login" type="text" value="<?php echo $lista['login_cliente']; ?>" disabled class="form-control Meu-Input"> 

					<label for="senha">Senha</label>
					<input name="senha" class="form-control Meu-Input" type="text" value="<?php echo $lista['senha_cliente']; ?>" name="nome" disabled>
					<br>
				</div>
				<?php
				
			}
		}
		
	}
 ?>
 </body>
 </html>

 