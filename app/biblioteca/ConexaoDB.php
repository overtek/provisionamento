<?php

/*
 * Sistema de Documenta��o do Provedor
 * Autor: Steve Evangelista
 * Vers�o: 1.0
 * 
 * Upgrade: Vers�o 1.1
 * C�lio Martins
 */

class ConexaoDB {
    
    /**
     * Tipo do banco de dados     
     * @var string
     */   
    private $dbtype   = DBTYPE;  
    
    
    /**
     * Configuga��o de acesso ao banco de dados do sistema de provisionamento    
     * @var string
     */   
    private $host     = HOST;
    private $port     = PORTA;
    private $user     = USERDB;
    private $password = SENHA;
    private $db       = BANCO;
    
    
    
    /**
     * Conex�o do banco de dados     
     * @var Conexao
     */   
    private $conexao;

        
    /**
     * M�todo construtor do banco de dados     
     */ 
    public function __construct(){
       
    }


    
    /**
     * M�todo que evita que a classe seja clonada     
     */ 
    public function __clone(){

    }


    
    /**
     * Conecta ao banco de dados e seta em UTF-8 o charset    
     */ 
    public function conecta(){
        //Tenta a conex�o com o banco de dados
        try{
            //Abre uma conex�o com o banco de dados
            $this->conexao = new PDO($this->getDBType().":host=".$this->getHost().";port=".$this->getPort().";dbname=".$this->getDB(), $this->getUser(), $this->getPassword());
            
            //Seta o charset como UTF8
            $this->conexao->exec("set names utf8");
        }
        //Se houver erro executa Exception
        catch (PDOException $i){
            //Mostra o Erro
            die("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }


    
    /**
     * Desconecta do banco de dados e zera as vari�veis    
     */
    public function desconecta(){
        //Fecha a conex�o com o banco de dados
        $this->conexao = null;
        
        //Enquanto houver valor nas vari�veis
        foreach ($this as $key => $value) {
            //Zera a vari�vel
            unset($this->$key);
        }
    }

    

    /**
     * Executa um comando select no banco de dados
     * 
     * @param string $sql Query para o prepare    
     * @param array $params Dados para a query
     * @return objetos Retorna os objetos da consulta SQL
     */
    public function selectDB($sql,$params=null){
        //Prepara a execu��o da query
        $query=$this->conexao->prepare($sql);
        
        //Executa a query com os parametros passados
        $sucesso = $query->execute($params);
        
        
        //Se houver sucesso ent�o:
        if($sucesso){
            //Resultado recebe os dados da consulta como objetos
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);

            //Retorna os resultados
            return $resultado;
        }
        //Se n�o houver sucesso:
        else{
            return false;
        }
    }
    
    

    /**
     * Executa um comando select no banco de dados
     * 
     * @param string $sql Query para o prepare    
     * @param array $params Dados para a query
     * @return int Retorna a quantidade de registros encontrados na consulta SQL
     */
    public function contarDB($sql,$params=null){
        //Prepara a execu��o da query
        $query=$this->conexao->prepare($sql);
        
        //Executa a query com os parametros passados
        $sucesso = $query->execute($params);
        
        
        //Se houver sucesso ent�o:
        if($sucesso){
            //Resultado recebe os dados da consulta como objetos
            $resultado = $query->rowCount();

            //Retorna os resultados
            return $resultado;
        }
        //Se n�o houver sucesso:
        else{
            return false;
        }
    }    

    

    /**
     * Executa um comando insert no banco de dados
     * 
     * @param string $sql Query para o prepare    
     * @param array $params Dados para a query
     * @return int Retorna o ultimo id inserido ou 1 se houver sucesso
     *             se n�o houver sucesso ent�o retorna 0.
     */
    public function insertDB($sql, $params=null){
        //Prepara a execu��o da query
        $query = $this->conexao->prepare($sql);
        
        //Executa a query com os parametros passados e resultado recebe true ou false
        $resultado = $query->execute($params);
        
        //Retorna o resultado
        return $resultado;
    }

    

    /**
     * Executa um comando update no banco de dados
     * 
     * @param string $sql Query para o prepare    
     * @param array $params Dados para a query
     * @return int Retorna a quantidade de linhas alteradas
     */
    public function updateDB($sql,$params=null){
        //Prepara a execu��o da query
        $query=$this->conexao->prepare($sql);

        //Executa a query com os parametros passados
        $resultado = $query->execute($params);         

        //Retorna o resultado
        return $resultado;
    }


    
    /**
     * Executa um comando delet no banco de dados
     * 
     * @param string $sql Query para o prepare    
     * @param array $params Dados para a query
     * @return int Retorna a quantidade de linhas exclu�das
     */
    public function deleteDB($sql,$params=null){
        //Prepara a execu��o da query
        $query=$this->conexao->prepare($sql);
        
        //Executa a query com os parametros passados
        $query->execute($params);
        
        //Resultado recebe a quantidade de linhas alteradas
        $rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
        
        //Retorna o resultado
        return $rs;
    }


    
    /**
     * Métodos GET das vari�veis privadas
     * 
     * @return XXX Dado da vari�vel escolhida
     */
    private function getDBType(){
        return $this->dbtype;
    }

    private function getHost(){
        return $this->host;
    }

    private function getPort(){
        return $this->port;
    }

    private function getUser(){
        return $this->user;
    }

    private function getPassword(){
        return $this->password;
    }

    private function getDB(){
        return $this->db;
    }
}

?>