<?php
/*
 * Sistema de Documenta��o do Provedor
 * Autor: Steve Evangelista
 * Vers�o: 1.0
 * 
 * Upgrade: Vers�o 1.1
 * C�lio Martins
 */


class ProvisionamentoControle extends Controle {
       
    /**
     * M�todo Pagina()
     * Gera a Pagina Inicial
     */
    public function pagina() {
		
		# Carrega os cabe�alhos da p�gina
		$this->visao->render('Pagina/head');
		$this->visao->render('Pagina/header');
		$this->visao->render('Pagina/body');
		$this->visao->render('Pagina/footer');
		$this->carregaTabela();
    }
	
	
	public function checa_sistema() {
		# carrega o modelo Provisionamento
		$this->modelo('Provisionamento');
		
		#executa o m�todo de confer�ncia do BD
		$this->Provisionamento->getStatus();
	}
	
    
    /**
     * M�todo carregaTabela()
     * Carrega a listagem de Clientes cadastrados no provisionamento
	 * @parametro $pagina = p�gina a ser exibida / pagina��o da tabela com mais de 20 registros
	 * @parametro $cliente = Cliente a ser retornado na busca
     */	
    public function carregaTabela($pagina=1,$cliente=null) {				
		
		# Verifica se foi passado a p�gina por parametro e redefine a vari�vel $p�gina.
		if ( (isset($_GET["pag"])) and (strlen($_GET["pag"]) > 0) ) {
			$pagina = $_GET["pag"];
			$this->visao->render('Pagina/head');
			$this->visao->render('Pagina/header');
			$this->visao->render('Pagina/footer');				
		}

		# Verifica se foi passado a busca por cliente por parametro e redefine a vari�vel $cliente.
		if ( (isset($_GET["cliente"])) and (strlen($_GET["cliente"]) > 2) ) {
			$cliente = $_GET["cliente"];
			$this->visao->render('Pagina/head');
			$this->visao->render('Pagina/header');
			$this->visao->render('Pagina/footer');
		}		

		# carrega o modelo Provisionamento
		$this->modelo('Provisionamento');		

		# Chama o m�todo getLista para trazer os resultados
		$lista = $this->Provisionamento->getLista($pagina, $cliente);
		
		# Chama o m�todo getTotalRegistros para trazer a quantidade total dos registros
		$registros = $this->Provisionamento->getTotalRegistros($cliente);
		
		# uso o m�todo set para vincular a vari�vel registros dentro da view
		$this->visao->set('registros', $registros);
		
		# uso o m�todo set para vincular a vari�vel pag_request dentro da view
		$this->visao->set('pag_request', $pagina);
		
		# uso o m�todo set para vincular a vari�vel pag_request dentro da view
		$this->visao->set('cliente', $cliente);

		# uso o m�todo set para vincular a vari�vel lista dentro da view
		$this->visao->set('lista', $lista);			

		# uso o m�todo set para vincular a vari�vel acao dentro da view
		$this->visao->set('acao', 'getTabela');
		
		# carrega o modelo Cidade
		$this->modelo('Cidade');
		
		# Chama o m�todo getCidades para trazer a lista de cidades cadastradas
		$lista_cidades = $this->Cidade->getCidades();
		
		# uso o m�todo set para vincular a vari�vel lista_cidades dentro da view
		$this->visao->set('lista_cidades', $lista_cidades);
		
		# Chama o m�todo getEstados para trazer a lista de estados cadastradas
		$lista_estados = $this->Cidade->getEstados();
		
		# uso o m�todo set para vincular a vari�vel lista_estados dentro da view
		$this->visao->set('lista_estados', $lista_estados);
		
		# carrega o modelo Tecnico
		$this->modelo('Tecnico');
		
		# Chama o m�todo getListaTecnicos para trazer a lista de t�cnicos cadastrados
		$lista_tecnicos = $this->Tecnico->getListaTecnicos();
		
		# uso o m�todo set para vincular a vari�vel lista_tecnicos dentro da view
		$this->visao->set('lista_tecnicos', $lista_tecnicos);		
		
		# renderiza a view
		$this->visao->render('provisionamentoview');		
	}
    
    
    /**
     * M�todo cadastra()
     * Cadastra um novo cliente no provisionamento
     */
    public function cadastra() {
        # carrega o modelo Provisionamento
		$this->modelo('Provisionamento');
		
		# checa se foi preenchido o campo ID do formul�rio para 
		# direcionar ao cadastro ou ao update do cadastro
		if ( (isset($_POST["id"]) ) and (strlen($_POST["id"]) >0 ) ) {
			echo $this->Provisionamento->setUpdate($_POST);
		} 
		else {
        	echo $this->Provisionamento->setCadastro($_POST);
		}
    }
	
	
    /**
     * M�todo getTecnicos()
     * Gera a listagem dos t�cnicos cadastrados para serem iclusos nos cadastros
     */	
	public function getTecnicos() {		
		# carrega o modelo Tecnico
		$this->modelo('Tecnico');		
		echo $this->Tecnico->getListaTecnicos();		
	}
	
	
    /**
     * M�todo deletaCliente()
     * Excluir um cliente de provisionamento
	 * @param int id passado via get
     */	
	public function deletaCliente() {		
		# carrega o modelo Tecnico
		$this->modelo('Provisionamento');
		
		# executa o m�todo e retorna o resultado		
		echo $this->Provisionamento->deleta($_GET["id"]);		
	}	
	
	
    /**
     * M�todo getCidades()
     * Gera a listagem das cidades cadastrados para serem iclusos nos cadastros
     */		
	public function getCidades() {		
		# carrega o modelo Tecnico
		$this->modelo('Cidade');		
		echo $this->Cidade->getCidades();		
	}	
    
    
    
    /**
     * M�todo getCadastro()
     * Carrega os dados cadastrados do provisionamento de uma ONU
     * 
     * @param int $id Identificador da ONU
     */
    public function getCadastro($id=null){
		# recupera o parametro passado via url/get
		if (isset($_GET["id"])) $id = $_GET["id"];

		# carrega o modelo Provisionamento		
		$this->modelo('Provisionamento');

		#valida se for passado id, caso contr�rio retorna null		
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
     * M�todo Configuracao()
     * Carrega os dados de configura��o do sistema
     * e exibe o formul�rio de cadastro
     */	
	function Configuracao(){
		# Carrega os cabe�alhos da p�gina
		$this->visao->render('Pagina/head');
		$this->visao->render('Pagina/header');
		$this->visao->render('Pagina/footer');
		
		# carrega o modelo Provisionamento		
		$this->modelo('Configuracao');
		
		# busca os dados gravados no BD para apresentar no formul�rio
		$dados = $this->Configuracao->getConfig();
		
		# seta os dados da vari�vel $data para a View
		$this->visao->set('dados', $dados);
		
		# renderiza a p�gina de configura��o
		$this->visao->render('Configuracoes');		
	}
	
	
    /**
     * M�todo salvaConfiguracao()
     * Salva as configura��es do sistema
     */		
	function salvaConfiguracao(){
		# carrega o modelo Configura��o
        $this->modelo('Configuracao');
		
		# recebe e envia o retorno do processo.
        return $this->Configuracao->salva($_POST);	
	}
	
	
    /**
     * M�todo efetuarLogin()
     * Efetuar e checar Login
     */		
	function efetuarLogin(){
		# carrega o modelo Configura��o
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
     * M�todo Logout()
     * Finaliza a sess�o do sistema
     */		
	function Logout(){
		unset($_SESSION["usuario"]);
		echo "<script>alert('Sess�o encerrada com Sucesso');location.reload()</script>";
	}	
	
		
}