<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
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
		 
        $query = "SELECT * FROM tbConfig limit 1";

		# criar conex�o com o banco de dados
		$db = DB::criar('padrao');

		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query);

    	$result = $resultado->fetch_all(MYSQLI_ASSOC);
		
    	$resultado->free();

    	return $result;
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
			$query = "UPDATE tbConfig set "
				. "SSID = '" . $post['SSID'] . "', "
				. "ProxyServer = '" . $post['ProxyServer'] . "', "
				. "RegistrarServer = '" . $post['RegistrarServer'] . "', "
				. "UserAgentPort = '" . $post['UserAgentPort'] . "', "
				. "TelnetPassword = '" . $post['TelnetPassword'] . "'"
				. " where idConfig = " . $post['idConfig'];
		}
		else
		{
			$query = "INSERT INTO tbConfig (SSID, ProxyServer, RegistrarServer, UserAgentPort, TelnetPassword) VALUES ('"
				. $post['SSID']. "', '"
				. $post['ProxyServer']. "', '"
				. $post['RegistrarServer']. "', '"
				. $post['UserAgentPort']. "', '"
				. $post['TelnetPassword']
				. "')";
		}
						
		# criar conex�o com o banco de dados
		$db = DB::criar('padrao');

		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query);		

    	if (!$resultado ) {
			echo "Falha ao salvar as Configura��es " .$resultado;
		} else {
			echo "Configura��es salvas com Sucesso";
		}
	 }		 
}