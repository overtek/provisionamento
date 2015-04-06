<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
/*
 * Sistema de Documentação do Provedor
 * Autor: Célio Martins
 * Versão: 1.1
 * 
 */


/**
 * Classe Configuracoes
 * @author Célio Martins
 * Modelo do Provisionamento/Configuração
 */

class Configuracao {
	
    /**
     * Método getConfig()
     * Retorna as configurações cadastrados no banco de dados
     */	
	 
	 function getConfig() {
		 
        $query = "SELECT * FROM tbConfig limit 1";

		# criar conexão com o banco de dados
		$db = DB::criar('padrao');

		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query);

    	$result = $resultado->fetch_all(MYSQLI_ASSOC);
		
    	$resultado->free();

    	return $result;
	 }
	 
	 
    /**
     * Método salva()
     * Grava as configurações do sistema
     */		 
	 function salva($post) {
		 
		# testa se foi passado o ID do registro, se foi passado faz o update
		# caso contrário faz o insert 
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
						
		# criar conexão com o banco de dados
		$db = DB::criar('padrao');

		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query);		

    	if (!$resultado ) {
			echo "Falha ao salvar as Configurações " .$resultado;
		} else {
			echo "Configurações salvas com Sucesso";
		}
	 }		 
}