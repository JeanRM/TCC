  <?php 
	include_once ("model/Usuario.class.php");
	include_once("includes/Conexao.class.php");
	
	class DaoUsuario{
		public function buscarEmpresaPorLogin($login){
			$sql = "SELECT * FROM tb_empresa WHERE login_empresa=:login";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":login",$login);
			$resposta = $sqlPreparado->execute();
			$usuario = $this->transformaEmpresaDoBancoEmObjeto($sqlPreparado->fetch(PDO::FETCH_ASSOC));
			return $usuario;
			
		}
		public function salvarEmpresaNoBanco($usuario){
			$sql = "INSERT INTO tb_empresa (id_empresa, nome_empresa, login_empresa, senha_empresa, cnpj_empresa, telefone_empresa, email_empresa) VALUES ('', :nome, :login, :senha, :cpf, :telefone, :email)";
			$sqlPreparado = Conexao::meDeAConexao()->prepare($sql);
			$sqlPreparado->bindValue(":nome",$usuario->getNome());
			$sqlPreparado->bindValue(":login",$usuario->getLogin());
			$sqlPreparado->bindValue(":senha",$usuario->getSenha());
			$sqlPreparado->bindValue(":cpf",$usuario->getCnpj());
			$sqlPreparado->bindValue(":telefone",$usuario->getTelefone());
			$sqlPreparado->bindValue(":email",$usuario->getEmail());
			$sqlPreparado->execute();
			
			return $sqlPreparado->rowCount();
		}

		public function transformaEmpresaDoBancoEmObjeto($dadosDoBanco){
			$usuario = new Usuario();
			$usuario->setIdEmpresa($dadosDoBanco['id_empresa']);
			$usuario->setNome($dadosDoBanco['nome_empresa']);
			$usuario->setLogin($dadosDoBanco['login_empresa']);
			$usuario->setSenha($dadosDoBanco['senha_empresa']);
			$usuario->setCnpj($dadosDoBanco['cnpj_empresa']);
			$usuario->setTelefone($dadosDoBanco['telefone_empresa']);
			$usuario->setEmail($dadosDoBanco['email_empresa']);
			return $usuario;
		}
		
	}
 ?>
