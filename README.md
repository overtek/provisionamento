# Sistema de Provisionamento


Sistema de Documentação de provedor.

Este sistema será o responsável pelo gerenciamento de atualizações e configurações das ONUs compatíveis com auto-provisionamento.



Instalação:

1° O conteúdo da pasta WWW deverá ser extraida para a pasta "public_html" do seu servidor de hospedagem;

2° A pasta "app" e todo seu conteúdo deverá ficar um nível acima da pasta "public_html".

3° Editar o arquivo "Config.php" na pasta "app/biblioteca" e inserir as informações para conexão com o banco de dados Mysql.

4° Criar o banco de dados, na pasta "app/scripts do banco" possui o script para criação do banco de dados e suas tabelas.



Acesso ao sistema:

Login inicial: admin@admin

Senha Inicial: 2015overtek

Obs: este usuário poderá ser editado ou excluido após cadastrar novos técnicos.



Passos após o acesso:

1° Através do Menu/Configurações deverá ser cadastradas as informações de configuração do provedor para serem gravadas nos arquivos de provisionamento das ONUs.

2° Após estes passos o sistema estará apto para receber os cadastros dos clientes e gerar os arquivos de provisionamento.
