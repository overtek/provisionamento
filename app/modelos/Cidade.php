<?php



/**
 * Classe Cidade
 * @author Steve Evangelista
 * Modelo da Cidade
 *
 * Upgrade: Vers�o 1.1
 * C�lio Martins
 */
 
class Cidade  {
	
    private $nome;
    private $id;
    
   
    /**
     * M�todo carrega()
     * Carrega dos dados de uma cidade
     * 
     * @param int $id Identificador da Cidade
     */
    public function carrega($id) {
		
        $this->id = $id;
        
        $query = "SELECT * FROM tbCidade, tbEstado WHERE tbCidade.idCidade = $id
            AND tbEstado.idEstado = tbCidade.idEstado LIMIT 1";
        

		# criar conex�o com o banco de dados
		$db = DB::criar('padrao');	

        $bd_cidade = $db->query($query)->fetch_all(MYSQLI_ASSOC);
		
		return json_encode($bd_cidade);
    }
    
	
    /**
     * M�todo getLista()
     * Carrega a listagem das cidades cadastradas.
     */    
    public function getLista($pagina) {
		
		# criar conex�o com o banco de dados
		$db = DB::criar('padrao');
		
		$inicio = (REG_PAGINA * $pagina) - REG_PAGINA;
		
        $query = "SELECT * FROM tbCidade c left join tbestado e on e.idEstado = c.idEstado WHERE c.statusCidade = 1 ORDER BY c.nomeCidade LIMIT ".$inicio.", ".REG_PAGINA;
		
		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query)->fetch_all(MYSQLI_ASSOC);
        
		return $resultado;
	}
	
	
	
    /**
     * M�todo getTotalRegistros()
     * Retorna o total de registros cadastrados no banco de dados
     */		
	public function getTotalRegistros(){
		# criar conex�o com o banco de dados
		$db = DB::criar('padrao');
		
		# pegar a quantidade total dos registros para a pagina��o
		$query = "SELECT count(*) as tot from tbCidade WHERE statusCidade = 1";		
		$resultado = $db->query($query);
		$result = $resultado->fetch_all(MYSQLI_ASSOC);
		$total_registros = $result[0]['tot'];		
		$resultado->free();
		
		return $total_registros;
	}	
	
    
    /**
     * M�todo getCidades()
     * Carrega a listagem das cidades cadastradas para popular o select.
     */  	
    public function getCidades() {
		
        $query = "SELECT * FROM tbCidade c left join tbestado e on e.idEstado = c.idEstado WHERE c.statusCidade = 1 ORDER BY c.nomeCidade";
        
		# criar conex�o com o banco de dados
		$db = DB::criar('padrao');
		
		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query)->fetch_all(MYSQLI_ASSOC);
        
		$city = '';
		
		# cria o option para popular o select
        foreach ($resultado as $cidades) {            
            $city .= "<option value='". $cidades['idCidade'] ."'>" . $cidades['nomeCidade'] . '/' . $cidades['nomeEstado'] . "</option>\n";
        }
		return $city;
    }
    
    
	
    /**
     * M�todo getEstados()
     * Carrega a listagem dos estados cadastradas para popular select.
     */    
    public function getEstados() {
        $query = "SELECT * FROM tbEstado WHERE statusEstado = 1 ORDER BY nomeEstado";
        
		# criar conex�o com o banco de dados
		$db = DB::criar('padrao');
		
		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query)->fetch_all(MYSQLI_ASSOC);
		
		$uf = '';
        
		# cria o option para popular o select
        foreach ($resultado as $estado) {
            $uf .= "  <option value='".$estado['idEstado']."'>".$estado['nomeEstado']."</option>";
        }
		
		return $uf;
    } 
    
    
	 /**
     * M�todo salva()
     * Cadastra ou altera uma cidade.
	 * @param: $post vindo do formul�rio.
     */  
    public function salva($post) {
		
		if (isset($post['idCidade']) and strlen($post['idCidade']) > 0) 
		{
			$query = "UPDATE tbCidade SET "
					 . "nomeCidade = '" . $post['nomeCidade'] . "', "
					 . "idEstado = '" . $post['idEstado'] . "' "
					 . "where idCidade = ".$post['idCidade'];
		}
		else
		{		
			$query = "INSERT INTO tbCidade (
					 nomeCidade,
					 idEstado,
					 statusCidade) VALUES ('"
						. $post['nomeCidade'] . "', '"
						. $post['idEstado'] . "', 
						1
					)";
		}
		# criar conex�o com o banco de dados
		$db = DB::criar('padrao');
		
		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query);

        if($resultado){
            echo 'Cidade cadastrada com sucesso!';
        }
        else{
            echo 'Falha ao cadastrar a Cidade! erro='. mysqli_error($db);
        }
    }
    

    
	 /**
     * M�todo deletaCidade()
     * Excluir uma cidade cadastrada.
	 * @param: $id c�digo da cidade
     */  
    public function deleta($id) {
		
		#validar ID e executar o m�todo, caso contr�rio retorna erro
		if (isset($id) and (strlen($id) > 0)) {
			
			$query = "DELETE from tbCidade where idCidade = $id";
		
			# criar conex�o com o banco de dados
			$db = DB::criar('padrao');
			
			# executa a query e guarda o resultado na variavel
			$resultado = $db->query($query);
	
			if($resultado){
				echo 'Cidade Exclu�da com sucesso!';
			}
			else{
				echo 'Falha ao excluir a Cidade! erro='. mysqli_error($db);
			}			
		} else
		{
			echo "ID n�o Informado na a��o";
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
