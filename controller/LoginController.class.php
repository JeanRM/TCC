<?php
	include_once ("dao/DaoUsuario.class.php");
	
	class LoginController{
		public function logar($post){
			$dao = new DaoUsuario();
			$usuario = $dao->buscarUsuarioPorLogin($post['login']);
			
			if(is_null($usuario->getIdUsuario())){
				return array("erro"=>true, "msg"=>"Login não encontrado!");   
			}else{

				if($usuario->getSenha()==$post['senha']){
					session_start();

            		$_SESSION['nome'] 	= $usuario->getNome();
            		$_SESSION['codigo'] = $usuario->getIdUsuario();
            		$_SESSION['logado'] = true;
            		$_SESSION['empresa'] = 1;

					header('location:entrou.php');
				}else{
					return array("erro"=>true, "msg"=>"Senha Incorreta!");	
				}
			}	
		}

		public function cadastrarUsuario($dadosDoFormulario){			
			$dao = new DaoUsuario();
			$usuario = $dao->buscarUsuarioPorLogin($post['login']);
			
			if(is_null($usuario->getIdUsuario())){
				$usuario = $this->formularioDeCadastroParaUsuario($dadosDoFormulario);
				$resposta = $dao->salvarUsuarioNoBanco($usuario);
				if($resposta > 0){
					 echo "Salvou";
				}else{
					 echo "Não Salvou";
				}
			
			}else{
				echo "Usuario Já existente";
			}
			
		}

		public function formularioDeCadastroParaUsuario($dadosDoFormulario){
			$usuario = new Usuario();
			$usuario->setNome($dadosDoFormulario['cnome']);
			$usuario->setLogin($dadosDoFormulario['clogin']);
			$usuario->setSenha($dadosDoFormulario['csenha']);
			$usuario->setCpf($dadosDoFormulario['cCpf']);
			$usuario->setTelefone($dadosDoFormulario['ctelefone']);
			$usuario->setEmail($dadosDoFormulario['cemail']);
			return $usuario;
		}

		
	}


?>