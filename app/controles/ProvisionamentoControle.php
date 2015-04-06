<?php
/*
 * Sistema de Documentação do Provedor
 * Autor: Steve Evangelista
 * Versão: 1.0
 * 
 * Upgrade: Versão 1.1
 * Célio Martins
 */


class ProvisionamentoControle extends Controle {
       
    /**
     * Método Pagina()
     * Gera a Pagina Inicial
     */
    public function pagina() {
		
		# Carrega os cabeçalhos da página
		$this->visao->render('Pagina/head');
		$this->visao->render('Pagina/header');
		$this->visao->render('Pagina/body');
		$this->visao->render('Pagina/footer');
		$this->carregaTabela();
    }
	
	
	public function checa_sistema() {
		# carrega o modelo Provisionamento
		$this->modelo('Provisionamento');
		
		#executa o método de conferência do BD
		$this->Provisionamento->getStatus();
	}
	
    
    /**
     * Método carregaTabela()
     * Carrega a listagem de Clientes cadastrados no provisionamento
	 * @parametro $pagina = página a ser exibida / paginação da tabela com mais de 20 registros
	 * @parametro $cliente = Cliente a ser retornado na busca
     */	
    public function carregaTabela($pagina=1,$cliente=null) {				
		
		# Verifica se foi passado a página por parametro e redefine a variável $página.
		if ( (isset($_GET["pag"])) and (strlen($_GET["pag"]) > 0) ) {
			$pagina = $_GET["pag"];
			$this->visao->render('Pagina/head');
			$this->visao->render('Pagina/header');
			$this->visao->render('Pagina/footer');				
		}

		# Verifica se foi passado a busca por cliente por parametro e redefine a variável $cliente.
		if ( (isset($_GET["cliente"])) and (strlen($_GET["cliente"]) > 2) ) {
			$cliente = $_GET["cliente"];
			$this->visao->render('Pagina/head');
			$this->visao->render('Pagina/header');
			$this->visao->render('Pagina/footer');
		}		

		# carrega o modelo Provisionamento
		$this->modelo('Provisionamento');		

		# Chama o método getLista para trazer os resultados
		$lista = $this->Provisionamento->getLista($pagina, $cliente);
		
		# Chama o método getTotalRegistros para trazer a quantidade total dos registros
		$registros = $this->Provisionamento->getTotalRegistros($cliente);
		
		# uso o método set para vincular a variável registros dentro da view
		$this->visao->set('registros', $registros);
		
		# uso o método set para vincular a variável pag_request dentro da view
		$this->visao->set('pag_request', $pagina);
		
		# uso o método set para vincular a variável pag_request dentro da view
		$this->visao->set('cliente', $cliente);

		# uso o método set para vincular a variável lista dentro da view
		$this->visao->set('lista', $lista);			

		# uso o método set para vincular a variável acao dentro da view
		$this->visao->set('acao', 'getTabela');
		
		# carrega o modelo Cidade
		$this->modelo('Cidade');
		
		# Chama o método getCidades para trazer a lista de cidades cadastradas
		$lista_cidades = $this->Cidade->getCidades();
		
		# uso o método set para vincular a variável lista_cidades dentro da view
		$this->visao->set('lista_cidades', $lista_cidades);
		
		# Chama o método getEstados para trazer a lista de estados cadastradas
		$lista_estados = $this->Cidade->getEstados();
		
		# uso o método set para vincular a variável lista_estados dentro da view
		$this->visao->set('lista_estados', $lista_estados);
		
		# carrega o modelo Tecnico
		$this->modelo('Tecnico');
		
		# Chama o método getListaTecnicos para trazer a lista de técnicos cadastrados
		$lista_tecnicos = $this->Tecnico->getListaTecnicos();
		
		# uso o método set para vincular a variável lista_tecnicos dentro da view
		$this->visao->set('lista_tecnicos', $lista_tecnicos);		
		
		# renderiza a view
		$this->visao->render('provisionamentoview');		
	}
    
    
    /**
     * Método cadastra()
     * Cadastra um novo cliente no provisionamento
     */
    public function cadastra() {
        # carrega o modelo Provisionamento
		$this->modelo('Provisionamento');
		
		# checa se foi preenchido o campo ID do formulário para 
		# direcionar ao cadastro ou ao update do cadastro
		if ( (isset($_POST["id"]) ) and (strlen($_POST["id"]) >0 ) ) {
			echo $this->Provisionamento->setUpdate($_POST);
		} 
		else {
        	echo $this->Provisionamento->setCadastro($_POST);
		}
    }
	
	
    /**
     * Método getTecnicos()
     * Gera a listagem dos técnicos cadastrados para serem iclusos nos cadastros
     */	
	public function getTecnicos() {		
		# carrega o modelo Tecnico
		$this->modelo('Tecnico');		
		echo $this->Tecnico->getListaTecnicos();		
	}
	
	
    /**
     * Método deletaCliente()
     * Excluir um cliente de provisionamento
	 * @param int id passado via get
     */	
	public function deletaCliente() {		
		# carrega o modelo Tecnico
		$this->modelo('Provisionamento');
		
		# executa o método e retorna o resultado		
		echo $this->Provisionamento->deleta($_GET["id"]);		
	}	
	
	
    /**
     * Método getCidades()
     * Gera a listagem das cidades cadastrados para serem iclusos nos cadastros
     */		
	public function getCidades() {		
		# carrega o modelo Tecnico
		$this->modelo('Cidade');		
		echo $this->Cidade->getCidades();		
	}	
    
    
    
    /**
     * Método getCadastro()
     * Carrega os dados cadastrados do provisionamento de uma ONU
     * 
     * @param int $id Identificador da ONU
     */
    public function getCadastro($id=null){
		# recupera o parametro passado via url/get
		if (isset($_GET["id"])) $id = $_GET["id"];

		# carrega o modelo Provisionamento		
		$this->modelo('Provisionamento');

		#valida se for passado id, caso contrário retorna null		
		if (strlen($id) < 1) 
		{
			return null;
		} 
		else
		{
			echo $this->Provisionamento->getCadastro($id);	
		}
    } 
   
	
    /**
     * Método Configuracao()
     * Carrega os dados de configuração do sistema
     * e exibe o formulário de cadastro
     */	
	function Configuracao(){
		# Carrega os cabeçalhos da página
		$this->visao->render('Pagina/head');
		$this->visao->render('Pagina/header');
		$this->visao->render('Pagina/footer');
		
		# carrega o modelo Provisionamento		
		$this->modelo('Configuracao');
		
		# busca os dados gravados no BD para apresentar no formulário
		$dados = $this->Configuracao->getConfig();
		
		# seta os dados da variável $data para a View
		$this->visao->set('dados', $dados);
		
		# renderiza a página de configuração
		$this->visao->render('Configuracoes');		
	}
	
	
    /**
     * Método salvaConfiguracao()
     * Salva as configurações do sistema
     */		
	function salvaConfiguracao(){
		# carrega o modelo Configuração
        $this->modelo('Configuracao');
		
		# recebe e envia o retorno do processo.
        return $this->Configuracao->salva($_POST);	
	}
	
	
    /**
     * Método efetuarLogin()
     * Efetuar e checar Login
     */		
	function efetuarLogin(){
		# carrega o modelo Configuração
        $this->modelo('Login');

		# recebe e envia o retorno do processo.
        $resultado = $this->Login->efetuarLogin($_POST);

		IF ($resultado == 'True') {
			echo "<script>window.location='index.php'</script>";
		} 
		ELSEIF ($resultado == 'False') {			
			echo "<script>alert('Login invalido!');window.location='index.php'</script>";
		}
		ELSE {
			echo "<script>Alert('Falha ao logar no sistema');window.location='index.php'</script>";
		}		
	}
	
	
    /**
     * Método Logout()
     * Finaliza a sessão do sistema
     */		
	function Logout(){
		unset($_SESSION["usuario"]);
		echo "<script>alert('Sessão encerrada com Sucesso');location.reload()</script>";
	}	
	
		
}