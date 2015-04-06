<?php
/*
 * Sistema de Documentação do Provedor
 * Autor: Steve Evangelista
 * Versão: 1.0
 * 
 * Upgrade: Versão 1.1
 * Célio Martins
 */

echo "<html>\n";
echo "<head>\n";
echo "  <link rel='stylesheet' type='text/css' href='css/login.css'>\n";
echo "  <title>Login - Sistema de Provisionamento</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "  <div id='login'>\n";
echo "      <h1>Sistema de Provisionamento</h1>\n";
echo "      <form method='post' action='?controle=Provisionamento&acao=efetuarLogin'>\n";
echo "          <input type='text' name='campo_login' placeholder='Login - email do t&eacute;cnico' required='required'/><br />\n";
echo "          <input type='password' name='campo_senha' placeholder='Senha' required='required'/><br />\n";
echo "          <input type='submit' value='Ok' class='botao'/>\n";
echo "      </form>\n";
echo "  </div>\n";
echo "</body>\n";
echo "</html>\n";