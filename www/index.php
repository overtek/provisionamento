<?php

/*
 * Sistema de Documentação do Provedor
 * Autor: Célio Martins
 * Versão: 1.1
 * Contato: ti2@ispshop.com.br
 */
 
 
session_start();

header("Content-Type: text/html; charset=ISO-8859-1",true);

# definir o diretório dos arquivos do sistema
define("APP", dirname($_SERVER['DOCUMENT_ROOT']) . "/app/");
# definir o diretório ROOT
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
	# definir um controle padrão quando nenhum controle for informado
	$controle = "Provisionamento";
}

# verifica se o arquivo de controle existe na pasta controle
if (file_exists(APP."controles/{$controle}Controle.php")) {
	# inclui o controle na página
    require_once APP."controles/{$controle}Controle.php";
}
else {
	 die("O controle <strong>{$controle}</strong> 
		não existe na pasta controle do MVC");
}

# adiciona a terminação Controle ao nome do controle
$controle .= 'Controle';

# instancia o controle
$controle = new $controle();


# agora,verificamos se a ação foi informada
if ($acao == "") {
	# se não informamos a ação usamos o método padrão
	$acao = 'pagina';
}

# se o controle requisitado for o Arquivo executará a ação
# sem exigir o login de usuário
if (Request::get('controle') == "Arquivo") {
	$controle->$acao();
	exit();
}

# checa se existe sessão de usuário logado
# caso contrário chama tela de login.
if ((!isset($_SESSION["usuario"])) and ($acao !="efetuarLogin") ) {
	include "login.php";
	exit();
}

# verifica se o método existe no objeto controle
if (method_exists($controle, $acao)) {
	# se existir, executa o método
    $controle->$acao();
}
else {
	# se não existir, emite uma mensagem de erro
    include APP."visoes/Pagina/error.php";
}