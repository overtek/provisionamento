# Sistema de Provisionamento


Sistema de Documenta��o de provedor.

Este sistema ser� o respons�vel pelo gerenciamento de atualiza��es e configura��es das ONUs compat�veis com auto-provisionamento.



Instala��o:

1� O conte�do da pasta WWW dever� ser extraida para a pasta "public_html" do seu servidor de hospedagem;

2� A pasta "app" e todo seu conte�do dever� ficar um n�vel acima da pasta "public_html".

3� Editar o arquivo "Config.php" na pasta "app/biblioteca" e inserir as informa��es para conex�o com o banco de dados Mysql.

4� Criar o banco de dados, na pasta "app/scripts do banco" possui o script para cria��o do banco de dados e suas tabelas.



Acesso ao sistema:

Login inicial: admin@admin

Senha Inicial: 2015overtek

Obs: este usu�rio poder� ser editado ou excluido ap�s cadastrar novos t�cnicos.



Passos ap�s o acesso:

1� Atrav�s do Menu/Configura��es dever� ser cadastradas as informa��es de configura��o do provedor para serem gravadas nos arquivos de provisionamento das ONUs.

2� Ap�s estes passos o sistema estar� apto para receber os cadastros dos clientes e gerar os arquivos de provisionamento.
