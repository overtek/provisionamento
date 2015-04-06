<?php

/**
 * A classe visão é responsável por armazenar dados
 * para apresentação num determinado arquivo de
 * visão PHP.
 */
class Visao {

	/**
	 *  Lista de dados para serem recuperados
	 *  e impressos dentro de uma view.
	 */
	public $dados = array();
    
    /**
     * Adiciona o valor de uma variável com um nome
     * dentro da lista de dados.
     * 
     * @param string $nome
     * @param mixed $valor
     * @return void
     */
    public function set($nome, $valor) {
        $this->dados[$nome] = $valor;
    }
    
    /**
     * Faz a mesma coisa que o método set, mas
     * usando referências, permitindo que as
     * alterações na variável fora da classe
     * sejam realizadas também no valor
     * armazenado na lista de dados.
     *
     * @param string $nome
     * @param mixed $valor
     * @return void
     */
    public function bind($nome, &$valor) {

    	# Armazena o valor da variável como
    	# referência.
        $this->dados[$nome] = &$valor;
        
    }
    
    /**
     * Recupera um valor armazenado na lista
     * de dados através de seu nome.
     *
     * @param string $nome
     * @return mixed
     */
    public function get($nome='') {

    	# Se não existir nenhuma variável com
    	# o nome indicado como parâmetro,
    	# o método retorna uma string vazia.
        if ($nome == '') {
            return $this->dados;
        }
        else {
            if (isset($this->dados[$nome]) && ($this->dados[$nome] != '')) {
                return $this->dados[$nome];
            }
            else {
                return '';
            }
        }
    }
    
    /**
     * Renderiza um arquivo de visão específico com
     * as variáveis armazenadas internamente. Como 
     * resultado, envia conteúdo HTML para o navegador
     * do usuário.
     *
     * @param string $arquivo
     * @return void
     */
    public function render($arquivo) {
        
        # Transforma cada item armazenado
        # na lista de dados em variáveis locais
        foreach($this->get() as $chave => $item) {
            $$chave = $item;
        }
        
        # Procura o arquivo php dentro da pasta
        # visoes. Se o arquivo existir, inclui o mesmo
        # dentro da função, executando e rederizando
        # o conteúdo dele.
        if (file_exists(APP."visoes/{$arquivo}.php")) {
            include APP."visoes/{$arquivo}.php";
        }
        
    }
}