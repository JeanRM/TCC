<?php
	include_once ("dao/DaoUsuario.class.php");
	include_once ("model/Usuario.class.php");
	
	class LoginController{
		public function logar($post){
			$dao = new DaoUsuario();
			$usuario = $dao->buscarEmpresaPorLogin($post['login']);
			
			if(is_null($usuario->getIdEmpresa())){  
				header("location: index.php?erro=true&msg= Login não encontrado");
			}else{

				if($usuario->getSenha()==$post['senha']){
					session_start();

            		$_SESSION['nome'] 	= $usuario->getNome();
            		$_SESSION['codigo'] = $usuario->getIdEmpresa();
            		$_SESSION['logado'] = true;
            		

					header('location:entrou.php');
				}else{
					header("location: index.php?erro=true&msg= Senha Incorreta");
				}
			}	
		}

		public function cadastrarEmpresa($dadosDoFormulario){			
			$dao = new DaoUsuario();
			$usuario = $dao->buscarEmpresaPorLogin($dadosDoFormulario['clogin']);
			
			if(is_null($usuario->getIdEmpresa())){
				$usuario = $this->formularioDeCadastroParaUsuario($dadosDoFormulario);
				$resposta = $dao->salvarEmpresaNoBanco($usuario);
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
			$usuario->setCnpj($dadosDoFormulario['cCpf']);
			$usuario->setTelefone($dadosDoFormulario['ctelefone']);
			$usuario->setEmail($dadosDoFormulario['cemail']);
			return $usuario;
		}

		
	}


?>