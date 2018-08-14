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
		}
		
	}
 ?>
