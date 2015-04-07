<?php



/**
 * Classe Cidade
 * @author Steve Evangelista
 * Modelo da Cidade
 *
 * Upgrade: Versão 1.1
 * Célio Martins
 */
 
class Cidade  {
	
    private $nome;
    private $id;
    
   
    /**
    * Método carrega()
    * Carrega dos dados de uma cidade
    * 
    * @param int $id Identificador da Cidade
    */
    public function carrega($id) {
		
        $this->id = $id;
        
        $query = "SELECT * FROM tbcidade, tbestado WHERE tbcidade.idCidade = $id
            AND tbestado.idEstado = tbcidade.idEstado LIMIT 1";
        

        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	

        $bd_cidade = $db->selectDB($query);
        
        $db->desconecta();
		
	return json_encode($bd_cidade);
    }
    
	
    /**
    * Método getLista()
    * Carrega a listagem das cidades cadastradas.
    */    
    public function getLista($pagina) {
		
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	

        $inicio = (REG_PAGINA * $pagina) - REG_PAGINA;
		
        $query = "SELECT * FROM tbcidade c left join tbestado e on e.idEstado = c.idEstado WHERE c.statusCidade = 1 ORDER BY c.nomeCidade LIMIT ".$inicio.", ".REG_PAGINA;
		
        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        return $resultado;
    }
	
	
	
    /**
    * Método getTotalRegistros()
    * Retorna o total de registros cadastrados no banco de dados
    */		
    public function getTotalRegistros(){
        
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	

        # pegar a quantidade total dos registros para a paginação
        $query = "SELECT * from tbcidade WHERE statusCidade = 1";		
        
        $resultado = $db->contarDB($query);
	
        $db->desconecta();

        return $resultado;
	}	
	
    
    /**
    * Método getCidades()
    * Carrega a listagem das cidades cadastradas para popular o select.
    */  	
    public function getCidades() {
		
        $query = "SELECT * FROM tbcidade c left join tbestado e on e.idEstado = c.idEstado WHERE c.statusCidade = 1 ORDER BY c.nomeCidade";
        
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	
		
        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);
        
        $db->desconecta();

        $city = '';
		
        # cria o option para popular o select
        foreach ($resultado as $cidades) {            
            $city .= "<option value='". $cidades->idCidade ."'>" . $cidades->nomeCidade . '/' . $cidades->nomeEstado . "</option>\n";
        }
        return $city;
    }
    
    
	
    /**
    * Método getEstados()
    * Carrega a listagem dos estados cadastradas para popular select.
    */    
    public function getEstados() {
        $query = "SELECT * FROM tbestado WHERE statusEstado = 1 ORDER BY nomeEstado";
        
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();	
		
        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $uf = '';
        
        # cria o option para popular o select
        foreach ($resultado as $estado) {
            $uf .= "  <option value='".$estado->idEstado."'>".$estado->nomeEstado."</option>";
        }
		
        return $uf;
    } 
    
    
    /**
    * Método salva()
    * Cadastra ou altera uma cidade.
    * @param: $post vindo do formulário.
    */  
    public function salva($post) {
		
        if (isset($post['idCidade']) and strlen($post['idCidade']) > 0) 
        {
            $query = "UPDATE tbcidade SET "
                    . "nomeCidade = '" . $post['nomeCidade'] . "', "
                    . "idEstado = '" . $post['idEstado'] . "' "
                    . "where idCidade = ".$post['idCidade'];
        }
        else
        {		
            $query = "INSERT INTO tbcidade (
                    nomeCidade,
                    idEstado,
                    statusCidade) VALUES ('"
                           . $post['nomeCidade'] . "', '"
                           . $post['idEstado'] . "', 
                           1
                    )";
        }

        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->updateDB($query);

        if($resultado){
            echo 'Cidade cadastrada com sucesso!';
        }
        else{
            echo 'Falha ao cadastrar a Cidade! erro='. $resultado;
        }
    }
    

    
    /**
    * Método deletaCidade()
    * Excluir uma cidade cadastrada.
    * @param: $id código da cidade
    */  
    public function deleta($id) {
		
        #validar ID e executar o método, caso contrário retorna erro
        if (isset($id) and (strlen($id) > 0)) {

        $query = "DELETE from tbcidade where idCidade = $id";

        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->deleteDB($query);

        if($resultado){
                echo 'Cidade Excluída com sucesso!';
        }
        else{
                echo 'Falha ao excluir a Cidade! erro='. $resultado;
        }
        } else
        {
            echo "ID não Informado na ação";
        }
    }
    
    
    function getNome() {
        return $this->nome;
    }

    function getId() {
        return $this->id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setId($id) {
        $this->id = $id;
    }
}
