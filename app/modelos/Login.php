<?php

/*
 * Sistema de Documenta��o do Provedor
 * Autor: C�lio Martins
 * Vers�o: 1.1
 * 
 */


/**
 * Classe Login
 * @author C�lio Martins
 * Checa se o usuário tem permiss�o de acesso ao sistema
 */

class Login {
	
	private $login;
	private $senha;
	
	/**
 	* M�todo efetuarLogin()
 	* Checa se o usu�rio tem permissão de acesso ao sistema
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

            # criar conex�o com o banco de dados
            //$db = DB::criar('padrao');
            
            $db = new ConexaoDB();
            $db->conecta();
            
            $query = "SELECT * FROM tbtecnico WHERE emailTecnico = '".$this->login."' and senhaTecnico = '".$this->senha."' and statusTecnico = 1";
            
            # executa a query e guarda o resultado na variavel
            $count = $db->contarDB($query);
            
            $db->desconecta();
                        

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