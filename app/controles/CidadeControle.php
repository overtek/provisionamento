<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
/*
 * Sistema de Documentação do Provedor
 * Autor: Célio Martins
 * Versão: 1.1
 */


class CidadeControle extends Controle {
	
	
    /**
     * Método CadastroCidades()
     * Gera a página de cadastro de cidades
     */
    public function paginaCidades($pagina=1) {
		
		# Testa se foi passado a variável pag via get e redefine a $pagina
		if ( isset($_GET["pag"]) and (strlen($_GET["pag"] > 0)) ) {
			$pagina = $_GET["pag"];		
		}		
		
		# Carrega os cabeçalhos da página
		$this->visao->render('Pagina/head');
		$this->visao->render('Pagina/header');
		$this->visao->render('Pagina/footer');
		
		# carrega o modelo Cidade
		$this->modelo('Cidade');
		
		# Chama o método getTotalRegistros para trazer a quantidade total dos registros
		$registros = $this->Cidade->getTotalRegistros();
		
		# uso o método set para vincular a variável registros dentro da view
		$this->visao->set('registros', $registros);
		
		# uso o método set para vincular a variável registros dentro da view
		$this->visao->set('pag_request', $pagina);
		
		# Chama o método getLista para trazer os resultados para popular a tabela
		$lista = $this->Cidade->getLista($pagina);
		
		# uso o método set para vincular a variável lista dentro da view
		$this->visao->set('lista', $lista);
		
		# Chama o método getEstados para trazer os resultados e popular o select
		$lista_estados = $this->Cidade->getEstados();
		
		# uso o método set para vincular a variável lista dentro da view
		$this->visao->set('lista_estados', $lista_estados);
		
		# renderiza a view
		$this->visao->render('CidadeView');
    }
	

    /**
     * Método getCidade()
     * Retorna o cadastro da cidade no formato Json
     */	
	public function getCidade() {
		# recupera o parametro passado via url/get
		if (isset($_GET["id"])) $id = $_GET["id"];

		# carrega o modelo Cidade		
		$this->modelo('Cidade');

		#valida se foi passado id, caso contrário retorna null		
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
     * Método cadastraCidade()
     * Cadastra uma nova cidade
     */
    public function cadastraCidade() {
		# carrega o modelo Cidade
        $this->modelo('Cidade');
		
		# executa o método e retorna o resultado
        return $this->Cidade->salva($_POST);
    }
	
	
    /**
     * Método deletaCidade()
     * Excluir uma cidade
     */	
	public function deletaCidade(){
		# carrega o modelo Cidade
        $this->modelo('Cidade');
		
		# executa o método e retorna o resultado
        return $this->Cidade->deleta($_GET["id"]);
	}
}