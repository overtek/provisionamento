<?php

/**
 * Classe Cidade
 * @author Steve Evangelista
 * Modelo da Cidade
 *
 * Upgrade: Versão 1.1
 * Célio Martins
 */


/**
 * Classe Técnico
 */

Class Tecnico {
    private $id;
    private $nome;
    private $senha;
    private $email;
    private $status;
    private $tecnicos;
    
	
    /**
     * Método getLista()
     * Carrega a listagem dos técnicos cadastrados.
     */    
    public function getLista($pagina, $status) {
		
        $inicio = (REG_PAGINA * $pagina) - REG_PAGINA;
		
        $query = "SELECT * FROM tbtecnico where statusTecnico = $status order by nomeTecnico LIMIT ".$inicio.", ".REG_PAGINA;
        
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $db->desconecta();
        
        return $resultado;
	}	
    
    
    /**
    * Método salva()
    * Salva os dados de um técnico no DB
    */
    public function salva($post) {
		
		# criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        if (isset($post['codTecnico']) and strlen($post['codTecnico']) > 0) 
        {
			# consulta o login do técnico para saber se foi alterado.
			$consulta = "SELECT senhaTecnico from tbtecnico where idTecnico = " . $post['codTecnico'];
			# executa a query e guarda o resultado na variavel
	        $resultado = $db->selectDB($consulta);
			# testo para ver se a senha foi alterada
			if ($resultado[0]->senhaTecnico == $post['senhaTecnico']) {
				$senhaTecnico = $post['senhaTecnico'];
			} else {
				$senhaTecnico = md5($post['senhaTecnico']);;
			}

            $query = "UPDATE tbtecnico SET "
                    . "nomeTecnico = '" . $post['nomeTecnico'] . "', "
                    . "emailTecnico = '" . $post['emailTecnico'] . "', " 
                    . "senhaTecnico = '" . $senhaTecnico . "', "
                    . "statusTecnico = '" . $post['statusTecnico'] . "' "
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
                            .md5($post['statusTecnico'])
                    .")";
        }		


        # executa a query e guarda o resultado na variavel
        $resultado = $db->updateDB($query);

        if($resultado){
            echo 'Técnico cadastrado com sucesso!';
        }
        else{
            echo 'Falha ao cadastrar o técnico! - erro: ' . $resultado;
        }
    }
    
    
    
    
    /**
     * Método lista()
     * Lista os técnicos cadastrados e ativos no DB
     */
    public function getListaTecnicos() {		
		
        $query = "SELECT * FROM tbtecnico WHERE statusTecnico = 1 ORDER BY nomeTecnico";
        
        # criar conexão com o banco de dados
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
     * Método lista()
     * Lista os técnicos cadastrados no DB
     */
    public function getListaTodosTecnicos() {		
		
        $query = "SELECT * FROM tbtecnico ORDER BY nomeTecnico";
        
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	
		
        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);
        
        $db->desconecta();

        $tec = '';
        
        foreach ($resultado as $tecnico) {
            if ($tecnico->statusTecnico == 1) {
                $tec .= "  <option value='".$tecnico->idTecnico."'>".$tecnico->nomeTecnico." - Ativo</option>\n";
            } else
                $tec .= "  <option value='".$tecnico->idTecnico."'>".$tecnico->nomeTecnico." - Inativo</option>\n";
        }
        return $tec;
    }    
	
	
    /**
     * Método getTotalRegistros()
     * Retorna o total de registros cadastrados no banco de dados
     */	
    public function getTotalRegistros($status){
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	

        # pegar a quantidade total dos registros para o paginamento
        $query = "SELECT * from tbtecnico WHERE statusTecnico = $status";		
        $resultado = $db->contarDB($query);
        
        $db->desconecta();

        return $resultado;
    }	
	
	
    /**
     * Método carrega()
     * Lista os técnicos cadastrados no DB
     */
    public function carrega($id) {
		
        $query = "SELECT * FROM tbtecnico WHERE idTecnico = $id";
        
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $db->desconecta();
        
        echo json_encode($resultado);
    }
    
	
    /**
    * Método deleta()
    * Excluir um técnico cadastrado.
    * @param: int $id código do técnico
    */  
    public function deleta($id) {
        
        $msg = array();
        
        #validar ID e executar o método, caso contrário retorna erro
        if (isset($id) and (strlen($id) > 0)) {
            
            # criar conexão com o banco de dados
            $db = new ConexaoDB();
            $db->conecta();            
            
            # Checar se o Técnico está associado a algum cliente            
            $query = "select * from tbonu where idtecnico = $id";
            $registro = $db->contarDB($query);
            
            if ($registro > 0) {
                $status = 0;
            } else {
                
                $query = "DELETE from tbtecnico where idtecnico = $id";

                # executa a query e guarda o resultado na variavel
                $resultado = $db->deleteDB($query);

                if($resultado){
                    $status = 1;
                }
                else
                {
                    $status = 2;
                }
            }
        } else
        {
            $status = 3;
        }
        return $status;
    }
    
    
    /**
     * Método contaClientes()
     * Conta os clientes associados à determinado técnico
     */
    public function inativarTecnico($id) {
		
        $query = "UPDATE tbtecnico set statusTecnico = 0 WHERE idTecnico = $id";
        
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->updateDB($query);

        $db->desconecta();
        
        if (!$resultado) {
            $msg = "Tecnico inativado com sucesso.";
        } else {
            $msg = "Falha ao inativar este técnico." . $resultado;
        }
        
        echo $resultado;
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