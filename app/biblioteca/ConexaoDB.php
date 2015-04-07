<?php

/*
 * Sistema de Documentação do Provedor
 * Autor: Steve Evangelista
 * Versão: 1.0
 * 
 * Upgrade: Versão 1.1
 * Célio Martins
 */

class ConexaoDB {
    
    /**
     * Tipo do banco de dados     
     * @var string
     */   
    private $dbtype   = DBTYPE;  
    
    
    /**
     * Configugação de acesso ao banco de dados do sistema de provisionamento    
     * @var string
     */   
    private $host     = HOST;
    private $port     = PORTA;
    private $user     = USERDB;
    private $password = SENHA;
    private $db       = BANCO;
    
    
    
    /**
     * Conexão do banco de dados     
     * @var Conexao
     */   
    private $conexao;

        
    /**
     * Método construtor do banco de dados     
     */ 
    public function __construct(){
       
    }


    
    /**
     * Método que evita que a classe seja clonada     
     */ 
    public function __clone(){

    }


    
    /**
     * Conecta ao banco de dados e seta em UTF-8 o charset    
     */ 
    public function conecta(){
        //Tenta a conexão com o banco de dados
        try{
            //Abre uma conexão com o banco de dados
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
     * Desconecta do banco de dados e zera as variáveis    
     */
    public function desconecta(){
        //Fecha a conexão com o banco de dados
        $this->conexao = null;
        
        //Enquanto houver valor nas variáveis
        foreach ($this as $key => $value) {
            //Zera a variável
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
        //Prepara a execução da query
        $query=$this->conexao->prepare($sql);
        
        //Executa a query com os parametros passados
        $sucesso = $query->execute($params);
        
        
        //Se houver sucesso então:
        if($sucesso){
            //Resultado recebe os dados da consulta como objetos
            $resultado = $query->fetchAll(PDO::FETCH_OBJ);

            //Retorna os resultados
            return $resultado;
        }
        //Se não houver sucesso:
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
        //Prepara a execução da query
        $query=$this->conexao->prepare($sql);
        
        //Executa a query com os parametros passados
        $sucesso = $query->execute($params);
        
        
        //Se houver sucesso então:
        if($sucesso){
            //Resultado recebe os dados da consulta como objetos
            $resultado = $query->rowCount();

            //Retorna os resultados
            return $resultado;
        }
        //Se não houver sucesso:
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
     *             se não houver sucesso então retorna 0.
     */
    public function insertDB($sql, $params=null){
        //Prepara a execução da query
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
        //Prepara a execução da query
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
     * @return int Retorna a quantidade de linhas excluí­das
     */
    public function deleteDB($sql,$params=null){
        //Prepara a execução da query
        $query=$this->conexao->prepare($sql);
        
        //Executa a query com os parametros passados
        $query->execute($params);
        
        //Resultado recebe a quantidade de linhas alteradas
        $rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
        
        //Retorna o resultado
        return $rs;
    }


    
    /**
     * MÃ©todos GET das variáveis privadas
     * 
     * @return XXX Dado da variável escolhida
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