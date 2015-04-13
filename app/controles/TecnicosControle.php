<?php

/*
 * Sistema de Documentação do Provedor
 * Autor: Célio Martins
 * Versão: 1.1
 */


class TecnicosControle extends Controle {
	
	
    /**
     * Método paginaTecnicos()
     * Gera a página de cadastro de Técnicos
     */
    public function paginaTecnicos($pagina=1,$status=1) {

		# Verifica se foi passado a página por parametro e redefine a variável $pagina.
		if ( isset($_GET["pag"]) and (strlen($_GET["pag"] > 0)) ) {
			$pagina = $_GET["pag"];
		}
                
		# Verifica se foi passado o status por parametro e redefine a variável $status.
		if ( isset($_GET["status"]) ) {
			$status = $_GET["status"];
		}
		# Carrega os cabeçalhos da página
		$this->visao->render('Pagina/head');
		$this->visao->render('Pagina/header');
		$this->visao->render('Pagina/footer');
		
		# carrega o modelo Tecnico
		$this->modelo('Tecnico');
		
		# Chama o método getLista para trazer os resultados para popular a tabela
		$lista = $this->Tecnico->getLista($pagina,$status);
		
		# Chama o método getTotalRegistros para trazer a quantidade total dos registros
		$registros = $this->Tecnico->getTotalRegistros($status);
		
		# uso o método set para vincular a variável registros dentro da view
		$this->visao->set('registros', $registros);
		
		# uso o método set para vincular a variável pag_request dentro da view
		$this->visao->set('pag_request', $pagina);
                
		# uso o método set para vincular a variável status dentro da view
		$this->visao->set('status', $status);
		
		# uso o método set para vincular a variável lista dentro da view
		$this->visao->set('lista', $lista);
                
                # uso o método set para vincular a variável acao dentro da view
                $this->visao->set('acao', pagina); 
		
		# renderiza a view
		$this->visao->render('TecnicoView');
    }
	
	
	
    /**
     * Método getTecnico()
     * Retorna o cadastro da técnico no formato Json
     */	
	public function getTecnico() {
		# recupera o parametro passado via url/get
		if (isset($_GET["id"])) $id = $_GET["id"];

		# carrega o modelo Tecnico		
		$this->modelo('Tecnico');

		#valida se foi passado id, caso contrário retorna null		
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
     * Método cadastraTecnico()
     * Cadastra um novo Técnico
     */
    public function cadastraTecnico() {
        # carrega o modelo Tecnico
        $this->modelo('Tecnico');
		
        # executa o método e retorna o resultado
        return $this->Tecnico->salva($_POST);
    }
    
    
    /**
     * Método inativarTecnico()
     * Inativar técnicos associados a clientes que não podem ser excluidos
     * @param url/get id do técnico
     */    
    public function inativarTecnico(){
        # recupera o parametro passado via url/get
        if (isset($_GET["id"])) $id = $_GET["id"];
        
        # carrega o modelo Tecnico
        $this->modelo('Tecnico');
        
        # executa o método para checar quantos clientes estão associados ao técnico.
        $resultado = $this->Tecnico->inativarTecnico($id);
        
        return $resultado;
    }
	
	
	
    /**
     * Método deletaTecnico()
     * Excluir um Tecnico
     */	
    public function deletaTecnico(){
        # carrega o modelo Tecnico
        $this->modelo('Tecnico');

        # executa o método e retorna o resultado
        $msg =$this->Tecnico->deleta($_GET["id"]);
        echo $msg;
    }
}
