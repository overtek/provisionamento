<?php

/*
 * Sistema de Documenta��o do Provedor
 * Autor: C�lio Martins
 * Vers�o: 1.1
 * Contato: ti2@ispshop.com.br
 */
 
 
session_start();

header("Content-Type: text/html; charset=ISO-8859-1",true);

# definir o diret�rio dos arquivos do sistema
define("APP", dirname($_SERVER['DOCUMENT_ROOT']) . "/app/");
# definir o diret�rio ROOT
define("ROOT", $_SERVER['DOCUMENT_ROOT']);


/**
* Inclui as bibliotecas do sistema
*/
require_once APP.'biblioteca/request.php';
require_once APP.'biblioteca/visao.php';
require_once APP.'biblioteca/controle.php';
require_once APP.'biblioteca/config.php';
require_once APP.'biblioteca/ConexaoDB.php';


$controle	= Request::get('controle');
$acao		= Request::get('acao');

if ($controle == '') {
	# definir um controle padr�o quando nenhum controle for informado
	$controle = "Provisionamento";
}

# verifica se o arquivo de controle existe na pasta controle
if (file_exists(APP."controles/{$controle}Controle.php")) {
	# inclui o controle na p�gina
    require_once APP."controles/{$controle}Controle.php";
}
else {
	 die("O controle <strong>{$controle}</strong> 
		n�o existe na pasta controle do MVC");
}

# adiciona a termina��o Controle ao nome do controle
$controle .= 'Controle';

# instancia o controle
$controle = new $controle();


# agora,verificamos se a a��o foi informada
if ($acao == "") {
	# se n�o informamos a a��o usamos o m�todo padr�o
	$acao = 'pagina';
}

# se o controle requisitado for o Arquivo executar� a a��o
# sem exigir o login de usu�rio
if (Request::get('controle') == "Arquivo") {
	$controle->$acao();
	exit();
}

# checa se existe sess�o de usu�rio logado
# caso contr�rio chama tela de login.
if ((!isset($_SESSION["usuario"])) and ($acao !="efetuarLogin") ) {
	include "login.php";
	exit();
}

# verifica se o m�todo existe no objeto controle
if (method_exists($controle, $acao)) {
	# se existir, executa o m�todo
    $controle->$acao();
}
else {
	# se n�o existir, emite uma mensagem de erro
    include APP."visoes/Pagina/error.php";
}