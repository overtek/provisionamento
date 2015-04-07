<?php

/**
 * Classe Cidade
 * @author Steve Evangelista
 * Modelo da Cidade
 *
 * Upgrade: Vers�o 1.1
 * C�lio Martins
 */


/**
 * Classe T�cnico
 */

Class Tecnico {
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $status;
    private $tecnicos;
    
	
    /**
     * M�todo getLista()
     * Carrega a listagem dos t�cnicos cadastrados.
     */    
    public function getLista($pagina) {
		
        $inicio = (REG_PAGINA * $pagina) - REG_PAGINA;
		
        $query = "SELECT * FROM tbtecnico order by nomeTecnico LIMIT ".$inicio.", ".REG_PAGINA;
        
        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $db->desconecta();
        
        return $resultado;
	}	
    
    
    /**
    * M�todo salva()
    * Salva os dados de um t�cnico no DB
    */
    public function salva($post) {

        if (isset($post['codTecnico']) and strlen($post['codTecnico']) > 0) 
        {
            $query = "UPDATE tbtecnico SET "
                    . "nomeTecnico = '" . $post['nomeTecnico'] . "', "
                    . "emailTecnico = '" . $post['emailTecnico'] . "', " 
                    . "senhaTecnico = '" . $post['senhaTecnico'] . "' " 
                    . "where idTecnico = ". $post['codTecnico'];
        }
        else
        {
            $query = "INSERT INTO tbtecnico (
                    nomeTecnico,
                    emailTecnico,
                    senhaTecnico,
                    statusTecnico) VALUES ('"
                            .$post['nomeTecnico']. "', '"
                            .$post['emailTecnico'] . "', '"
                            .$post['senhaTecnico'] . "', "
                            ." 1
                    )";
        }		

        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->updateDB($query);

        if($resultado){
            echo 'T�cnico cadastrado com sucesso!';
        }
        else{
            echo 'Falha ao cadastrar o t�cnico! - erro: ' . $resultado;
        }
    }
    
    
    
    
    /**
     * M�todo lista()
     * Lista os t�cnicos cadastrados no DB
     */
    public function getListaTecnicos() {		
		
        $query = "SELECT * FROM tbtecnico WHERE statusTecnico = 1 ORDER BY nomeTecnico";
        
        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	
		
        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);
        
        $db->desconecta();

        $tec = '';
        
        foreach ($resultado as $tecnico) {
            $tec .= "  <option value='".$tecnico->idTecnico."'>".$tecnico->nomeTecnico."</option>\n";
        }
        return $tec;
    }
	
	
    /**
     * M�todo getTotalRegistros()
     * Retorna o total de registros cadastrados no banco de dados
     */	
    public function getTotalRegistros(){
        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	

        # pegar a quantidade total dos registros para o paginamento
        $query = "SELECT * from tbtecnico WHERE statusTecnico = 1";		
        $resultado = $db->contarDB($query);
        
        $db->desconecta();

        return $resultado;
    }	
	
	
    /**
     * M�todo carrega()
     * Lista os t�cnicos cadastrados no DB
     */
    public function carrega($id) {
		
        $query = "SELECT * FROM tbtecnico WHERE idTecnico = $id";
        
        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $db->desconecta();
        
        echo json_encode($resultado);
    }
    
	
	 /**
     * M�todo deleta()
     * Excluir um t�cnico cadastrado.
	 * @param: int $id c�digo do t�cnico
     */  
    public function deleta($id) {
		
        #validar ID e executar o m�todo, caso contr�rio retorna erro
        if (isset($id) and (strlen($id) > 0)) {

        $query = "DELETE from tbtecnico where idTecnico = $id";

        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->deleteDB($query);

        if($resultado){
            echo 'T�cnico Exclu�do com sucesso!';
        }
        else{
            echo 'Falha ao excluir o T�cnico! erro='. $resultado;
        }			
        } else
        {
            echo "ID n�o Informado na a��o";
        }
    }	
    
    
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSenha() {
        return $this->senha;
    }

    function getEmail() {
        return $this->email;
    }

    function getStatus() {
        return $this->status;
    }

    function getTecnicos() {
        return $this->tecnicos;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setTecnicos($tecnicos) {
        $this->tecnicos = $tecnicos;
    }


}
