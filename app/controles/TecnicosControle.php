<?php

/*
 * Sistema de Documenta��o do Provedor
 * Autor: C�lio Martins
 * Vers�o: 1.1
 */


class TecnicosControle extends Controle {
	
	
    /**
     * M�todo paginaTecnicos()
     * Gera a p�gina de cadastro de T�cnicos
     */
    public function paginaTecnicos($pagina=1) {

		# Verifica se foi passado a p�gina por parametro e redefine a vari�vel p�gina.
		if ( isset($_GET["pag"]) and (strlen($_GET["pag"] > 0)) ) {
			$pagina = $_GET["pag"];
		}
		
		# Carrega os cabe�alhos da p�gina
		$this->visao->render('Pagina/head');
		$this->visao->render('Pagina/header');
		$this->visao->render('Pagina/footer');
		
		# carrega o modelo Tecnico
		$this->modelo('Tecnico');
		
		# Chama o m�todo getLista para trazer os resultados para popular a tabela
		$lista = $this->Tecnico->getLista($pagina);
		
		# Chama o m�todo getTotalRegistros para trazer a quantidade total dos registros
		$registros = $this->Tecnico->getTotalRegistros();
		
		# uso o m�todo set para vincular a vari�vel registros dentro da view
		$this->visao->set('registros', $registros);
		
		# uso o m�todo set para vincular a vari�vel pag_request dentro da view
		$this->visao->set('pag_request', $pagina);			
		
		# uso o m�todo set para vincular a vari�vel lista dentro da view
		$this->visao->set('lista', $lista);
		
		# renderiza a view
		$this->visao->render('TecnicoView');
    }
	
	
	
    /**
     * M�todo getTecnico()
     * Retorna o cadastro da t�cnico no formato Json
     */	
	public function getTecnico() {
		# recupera o parametro passado via url/get
		if (isset($_GET["id"])) $id = $_GET["id"];

		# carrega o modelo Tecnico		
		$this->modelo('Tecnico');

		#valida se foi passado id, caso contr�rio retorna null		
		if (strlen($id) < 1) 
		{
			return null;
		} 
		else
		{
			echo $this->Tecnico->carrega($id);	
		}		
	}
	
	
    /**
     * M�todo cadastraTecnico()
     * Cadastra um novo T�cnico
     */
    public function cadastraTecnico() {
		# carrega o modelo Tecnico
        $this->modelo('Tecnico');
		
		# executa o m�todo e retorna o resultado
        return $this->Tecnico->salva($_POST);
    }
	
	
	
    /**
     * M�todo deletaTecnico()
     * Excluir um Tecnico
     */	
	public function deletaTecnico(){
		# carrega o modelo Tecnico
        $this->modelo('Tecnico');
		
		# executa o m�todo e retorna o resultado
        return $this->Tecnico->deleta($_GET["id"]);
	}
}
