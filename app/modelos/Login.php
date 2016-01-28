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
 * Checa se o usu�rio tem permiss�o de acesso ao sistema
 */

class Login {
	
	private $login;
	private $senha;
	
	/**
 	* M�todo efetuarLogin()
 	* Checa se o usu�rio tem permiss�o de acesso ao sistema
	* @param $post - login e senha passados via post do formu�rio de login
 	*/	
	
	public function efetuarLogin($post) {
		
            if (!isset($post) or (!isset($post['campo_login'])) or (!isset($post['campo_senha'])) ){
                    return 'False';
                    exit();
            }

            # seta o login e senha		
            $this->login = $post['campo_login'];
            $this->senha = md5($post['campo_senha']);

            # criar conex�o com o banco de dados
            
            $db = new ConexaoDB();
            $db->conecta();
            
            $query = "SELECT * FROM tbtecnico WHERE emailTecnico = '".$this->login."' and senhaTecnico = '".$this->senha."' and statusTecnico = 1";
            
            # executa a query e guarda o resultado na variavel
            $count = $db->contarDB($query);
            
            $db->desconecta();
                        

            # se obteve resultado cria a sess�o, caso contr�rio a destr�i.
            if ($count > 0) {
                    $_SESSION["usuario"] = $this->login;
                    return 'True';
            } else {			
                    unset($_SESSION["usuario"]);			
                    return 'False';
            }		
	}
	
}