<?php

	echo "  <div class='header'>\n";
	echo "		<a href='http://www.overtek.com.br' target='_blank'>\n";
	echo "      	<img src='img/logotipo.png' alt='' title='Menu' id='logotipo'/>\n";
	echo "		</a>\n";
	echo "      <div id='separadorHeader'></div>\n";
	echo "      <h1>Sistema de Provisionamento</h1>\n";
	echo "		<div class='btn-group float-dir responsive'>\n";
	echo "			<a class='btn btn-default' data-toggle='dropdown' href='#'><span class='caret'></span> Menu</a>\n";
	echo "			<ul class='dropdown-menu dropdown-menu-right'>\n";
	echo "				<li><a href='index.php'><span class='glyphicon glyphicon-user btn-primary'></span> Home</a></li>\n";	
	echo "				<li><a href='?controle=Provisionamento&acao=Configuracao'><span class='glyphicon glyphicon-cog btn-primary'></span> Configurações</a></li>\n";
	echo "				<li><a href='?controle=Cidade&acao=paginaCidades'><span class='glyphicon glyphicon-home btn-primary'></span> Cadastro de Cidades</a></li>\n";
	echo "				<li><a href='?controle=Tecnicos&acao=paginaTecnicos'><span class='glyphicon glyphicon-wrench btn-primary'></span> Cadastro de Técnicos</a></li>\n";
	echo "				<li><a href='?controle=Provisionamento&acao=Logout'><span class='glyphicon glyphicon-off btn-primary'></span> Logout</a></li>\n";
	echo "			</ul>\n";
	echo "		</div>\n";
	echo "  </div>\n";