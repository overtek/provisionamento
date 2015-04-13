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
    public function paginaTecnicos($pagina=1,$status=1) {

		# Verifica se foi passado a p�gina por parametro e redefine a vari�vel $pagina.
		if ( isset($_GET["pag"]) and (strlen($_GET["pag"] > 0)) ) {
			$pagina = $_GET["pag"];
		}
                
		# Verifica se foi passado o status por parametro e redefine a vari�vel $status.
		if ( isset($_GET["status"]) ) {
			$status = $_GET["status"];
		}
		# Carrega os cabe�alhos da p�gina
		$this->visao->render('Pagina/head');
		$this->visao->render('Pagina/header');
		$this->visao->render('Pagina/footer');
		
		# carrega o modelo Tecnico
		$this->modelo('Tecnico');
		
		# Chama o m�todo getLista para trazer os resultados para popular a tabela
		$lista = $this->Tecnico->getLista($pagina,$status);
		
		# Chama o m�todo getTotalRegistros para trazer a quantidade total dos registros
		$registros = $this->Tecnico->getTotalRegistros($status);
		
		# uso o m�todo set para vincular a vari�vel registros dentro da view
		$this->visao->set('registros', $registros);
		
		# uso o m�todo set para vincular a vari�vel pag_request dentro da view
		$this->visao->set('pag_request', $pagina);
                
		# uso o m�todo set para vincular a vari�vel status dentro da view
		$this->visao->set('status', $status);
		
		# uso o m�todo set para vincular a vari�vel lista dentro da view
		$this->visao->set('lista', $lista);
                
                # uso o m�todo set para vincular a vari�vel acao dentro da view
                $this->visao->set('acao', pagina); 
		
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
     * M�todo inativarTecnico()
     * Inativar t�cnicos associados a clientes que n�o podem ser excluidos
     * @param url/get id do t�cnico
     */    
    public function inativarTecnico(){
        # recupera o parametro passado via url/get
        if (isset($_GET["id"])) $id = $_GET["id"];
        
        # carrega o modelo Tecnico
        $this->modelo('Tecnico');
        
        # executa o m�todo para checar quantos clientes est�o associados ao t�cnico.
        $resultado = $this->Tecnico->inativarTecnico($id);
        
        return $resultado;
    }
	
	
	
    /**
     * M�todo deletaTecnico()
     * Excluir um Tecnico
     */	
    public function deletaTecnico(){
        # carrega o modelo Tecnico
        $this->modelo('Tecnico');

        # executa o m�todo e retorna o resultado
        $msg =$this->Tecnico->deleta($_GET["id"]);
        echo $msg;
    }
}
