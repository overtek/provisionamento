<?php

   #pegar os dados cadastrados passados, validar e enviar para o formulário.
   
   if (isset($dados[0]['SSID'])) $ssid = $dados[0]['SSID']; else $ssid = '';
   if (isset($dados[0]['ProxyServer'])) $ProxyServer = $dados[0]['ProxyServer']; else $ProxyServer = '';
   if (isset($dados[0]['RegistrarServer'])) $RegistrarServer = $dados[0]['RegistrarServer']; else $RegistrarServer = '';
   if (isset($dados[0]['UserAgentPort'])) $UserAgentPort = $dados[0]['UserAgentPort']; else $UserAgentPort = '';
   if (isset($dados[0]['TelnetPassword'])) $TelnetPassword = $dados[0]['TelnetPassword']; else $TelnetPassword = '';
   if (isset($dados[0]['idConfig'])) $idConfig = $dados[0]['idConfig']; else $idConfig = '';


   echo "<script type='text/javascript' src='visoes/js/sistema.js'></script>\n";
   echo " <div id='conteudo'>\n";
   echo " 	<div class='meioTabela'>\n";
   echo "      <h1>\n";
   echo "          Configurações do Sistema\n";
   echo "      </h1>\n";
   echo " 	</div>\n";
   echo " <form name='form-config' id='form-config' onSubmit='return false' >\n";
   echo " 	<div class='campo margemTop10 formularioGeral'>\n";
   echo "   	<label>SSID da ONU</label><br />\n";
   echo "       <input type='text' name='SSID' value='".$ssid."' style='width: 170px' required='required'><br />\n";
   echo "   </div>\n";
   echo " 	<div class='campo margemTop10 formularioGeral'>\n";
   echo "   	<label>Primary SIP Proxy</label><br />\n";
   echo "       <input type='text' name='ProxyServer' value='".$ProxyServer."' style='width: 300px' required='required'><br />\n";
   echo "   </div>\n";
   echo " 	<div class='campo margemTop10 formularioGeral'>\n";
   echo "   	<label>Primary SIP Registration</label><br />\n";
   echo "       <input type='text' name='RegistrarServer' value='".$RegistrarServer."' style='width: 300px' required='required'><br />\n";
   echo "   </div>\n";
   echo " 	<div class='campo margemTop10 formularioGeral'>\n";
   echo "   	<label>User AgentPort</label><br />\n";
   echo "       <input type='text' name='UserAgentPort' value='".$UserAgentPort."' style='width: 120px' required='required'><br />\n";
   echo "   </div>\n";
   echo " 	<div class='campo margemTop10 formularioGeral'>\n";
   echo "   	<label>Telnet Password</label><br />\n";
   echo "       <input type='text' name='TelnetPassword' value='".$TelnetPassword."' style='width: 120px' required='required'><br />\n";
   echo "   </div>\n";
   echo "   <br>\n";
   echo "	<input type='hidden' name='idConfig' value='".$idConfig."'>\n";
   echo "   <input type='submit' value='Salvar' id='salvaTecnico' onClick='garvar_Config()' class='btGravar'/>";
   echo " </form>\n";
   echo "	<br><br>\n";
   echo "  <br><p>Atenção. Após carregar as configurações a senha de acesso da ONU será composta pelas iniciais <b>\"Pw@\"</b> mais o <b>MAC</b> da ONU.</p><br>\n";
   echo " </div>\n";