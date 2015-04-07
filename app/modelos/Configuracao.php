<?php

/*
 * Sistema de Documenta��o do Provedor
 * Autor: C�lio Martins
 * Vers�o: 1.1
 * 
 */


/**
 * Classe Configuracoes
 * @author C�lio Martins
 * Modelo do Provisionamento/Configura��o
 */

class Configuracao {
	
    /**
     * M�todo getConfig()
     * Retorna as configura��es cadastrados no banco de dados
     */	
	 
    function getConfig() {
		 
        $query = "SELECT * FROM tbconfig limit 1";

        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	

        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $db->desconecta();

        return $resultado;
    }
	 
	 
    /**
     * M�todo salva()
     * Grava as configura��es do sistema
     */		 
    function salva($post) {
		 
        # testa se foi passado o ID do registro, se foi passado faz o update
        # caso contr�rio faz o insert 
        if ( isset($post['idConfig']) and strlen($post['idConfig']) > 0 )
        {
            $query = "UPDATE tbconfig set "
                    . "SSID = '" . $post['SSID'] . "', "
                    . "ProxyServer = '" . $post['ProxyServer'] . "', "
                    . "RegistrarServer = '" . $post['RegistrarServer'] . "', "
                    . "UserAgentPort = '" . $post['UserAgentPort'] . "', "
                    . "TelnetPassword = '" . $post['TelnetPassword'] . "'"
                    . " where idConfig = " . $post['idConfig'];
        }
        else
        {
            $query = "INSERT INTO tbconfig (SSID, ProxyServer, RegistrarServer, UserAgentPort, TelnetPassword) VALUES ('"
                    . $post['SSID']. "', '"
                    . $post['ProxyServer']. "', '"
                    . $post['RegistrarServer']. "', '"
                    . $post['UserAgentPort']. "', '"
                    . $post['TelnetPassword']
                    . "')";
        }

        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->updateDB($query);		

        if (!$resultado ) {
                echo "Falha ao salvar as Configura��es " .$resultado;
        } else {
                echo "Configura��es salvas com Sucesso";
        }
     }		 
}
