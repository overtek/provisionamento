<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
/*
 * Sistema de Documenta��o do Provedor
 * Autor: C�lio Martins
 * Vers�o: 1.1
 */


class CidadeControle extends Controle {
	
	
    /**
     * M�todo CadastroCidades()
     * Gera a p�gina de cadastro de cidades
     */
    public function paginaCidades($pagina=1) {
		
		# Testa se foi passado a vari�vel pag via get e redefine a $pagina
		if ( isset($_GET["pag"]) and (strlen($_GET["pag"] > 0)) ) {
			$pagina = $_GET["pag"];		
		}		
		
		# Carrega os cabe�alhos da p�gina
		$this->visao->render('Pagina/head');
		$this->visao->render('Pagina/header');
		$this->visao->render('Pagina/footer');
		
		# carrega o modelo Cidade
		$this->modelo('Cidade');
		
		# Chama o m�todo getTotalRegistros para trazer a quantidade total dos registros
		$registros = $this->Cidade->getTotalRegistros();
		
		# uso o m�todo set para vincular a vari�vel registros dentro da view
		$this->visao->set('registros', $registros);
		
		# uso o m�todo set para vincular a vari�vel registros dentro da view
		$this->visao->set('pag_request', $pagina);
		
		# Chama o m�todo getLista para trazer os resultados para popular a tabela
		$lista = $this->Cidade->getLista($pagina);
		
		# uso o m�todo set para vincular a vari�vel lista dentro da view
		$this->visao->set('lista', $lista);
		
		# Chama o m�todo getEstados para trazer os resultados e popular o select
		$lista_estados = $this->Cidade->getEstados();
		
		# uso o m�todo set para vincular a vari�vel lista dentro da view
		$this->visao->set('lista_estados', $lista_estados);
		
		# renderiza a view
		$this->visao->render('CidadeView');
    }
	

    /**
     * M�todo getCidade()
     * Retorna o cadastro da cidade no formato Json
     */	
	public function getCidade() {
		# recupera o parametro passado via url/get
		if (isset($_GET["id"])) $id = $_GET["id"];

		# carrega o modelo Cidade		
		$this->modelo('Cidade');

		#valida se foi passado id, caso contr�rio retorna null		
		if (strlen($id) < 1) 
		{
			return null;
		} 
		else
		{
			echo $this->Cidade->carrega($id);	
		}		
	}
	
	
    /**
     * M�todo cadastraCidade()
     * Cadastra uma nova cidade
     */
    public function cadastraCidade() {
		# carrega o modelo Cidade
        $this->modelo('Cidade');
		
		# executa o m�todo e retorna o resultado
        return $this->Cidade->salva($_POST);
    }
	
	
    /**
     * M�todo deletaCidade()
     * Excluir uma cidade
     */	
	public function deletaCidade(){
		# carrega o modelo Cidade
        $this->modelo('Cidade');
		
		# executa o m�todo e retorna o resultado
        return $this->Cidade->deleta($_GET["id"]);
	}
}