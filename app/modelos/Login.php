<?php

/*
 * Sistema de Documentação do Provedor
 * Autor: Célio Martins
 * Versão: 1.1
 * 
 */


/**
 * Classe Login
 * @author Célio Martins
 * Checa se o usuário tem permissão de acesso ao sistema
 */

class Login {
	
	private $login;
	private $senha;
	
	/**
 	* Método efetuarLogin()
 	* Checa se o usuário tem permissão de acesso ao sistema
	* @param $post - login e senha passados via post do formulário de login
 	*/	
	
	public function efetuarLogin($post) {
		
		if (!isset($post) or (!isset($post['campo_login'])) or (!isset($post['campo_senha'])) ){
			return 'False';
			exit();
		}
		
		# seta o login e senha		
		$this->login = $post['campo_login'];
		$this->senha = $post['campo_senha'];        
		
		# criar conexão com o banco de dados
		$db = DB::criar('padrao');
		
		$query = "SELECT * FROM tbTecnico WHERE emailTecnico = '".$this->login."' and senhaTecnico = '".$this->senha."' and statusTecnico = 1";
		
		# executa a query e guarda o resultado na variavel
        $result = $db->query($query);
		
		# efetua a contagem do resultado
		$count = mysqli_num_rows($result);
	
		# se obteve resultado cria a sessão, caso contrário a destrói.
		if ($count > 0) {
			$_SESSION["usuario"] = $this->login;
			return 'True';
		} else {			
			unset($_SESSION["usuario"]);			
			return 'False';
		}		
	}
	
}