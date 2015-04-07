<?php

/*
 * Sistema de Documenta��o do Provedor
 * Autor: Steve Evangelista
 * Vers�o: 1.0
 * 
 * Upgrade: Vers�o 1.1
 * C�lio Martins
 */


/**
 * Classe Provisionamento
 * @author Steve Evangelista
 * Modelo do Provisionamento
 */
 
class Provisionamento {  
    
    /**
     * M�todo lista()
     * Retorna os objetos com os dados cadastrados no banco de dados
     * @param int $pagina N�mero da p�gina a ser carregada
     */
    public function getLista($pagina, $cliente) {
		
        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();
			
        $inicio = (REG_PAGINA * $pagina) - REG_PAGINA;		
                
        $query = "SELECT * FROM tbonu o left join tbcidade c on c.idCidade = o.idCidade left join tbestado e on e.idEstado = c.idEstado
WHERE statusONU = 1";

        if ($cliente != null) {
            # remover os caracteres com ac�ntos
            $from = "��������������������������";
            $to = "aaaaeeiooouucAAAAEEIOOOUUC";
            $cliente = strtr($cliente, $from, $to);
            $query .= " and nomeClienteONU like '%" . $cliente . "%'";
        }

        $query .= " order by idONU LIMIT ".$inicio.", ".REG_PAGINA;

        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);
		
    	$db->desconecta();

    	return $resultado;
        
    }
	
    /**
     * M�todo getTotalRegistros()
     * Retorna o total de registros cadastrados no banco de dados
     */	
	public function getTotalRegistros($cliente){
            
            # criar conex�o com o banco de dados
            $db = new ConexaoDB();
            $db->conecta();
		
            # pegar a quantidade total dos registros para o paginamento
            $query = "SELECT * from tbonu WHERE statusONU = 1";

            if ($cliente != null) {
                # remover os caracteres com ac�ntos
                $from = "��������������������������";
                $to = "aaaaeeiooouucAAAAEEIOOOUUC";
                $cliente = strtr($cliente, $from, $to);			
                $query .= " and nomeClienteONU like '%" . $cliente . "%'";
            }

            $resultado = $db->contarDB($query);
		
            $db->desconecta();

            return $resultado;
	}	
	
	
    /**
     * M�todo getCadastro()
     * Retorna os dados cadastrados no banco de dados
     * @param int $id C�digo do cadastro a ser carregado
     */
    public function getCadastro($id) {
                
        $query = "SELECT * FROM tbonu where idONU = $id";

        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();
		
        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $db->desconecta();
        
    	return json_encode($resultado);
        
    }	
	
	
    /**
     * M�todo setCadastro()
     * Cadastra os dados do provisionamento
     * @param $onu com o post do formul�rio
     */	
    public function setCadastro($onu) {
                
        $query = "INSERT INTO tbonu (loginPPPoEONU, senhaPPPoEONU, numero1ONU, controle1ONU, numero2ONU, controle2ONU, macONU, nomeClienteONU, idTecnico, idCidade) VALUES ('"
            . $onu['login']. "', '"
            . $onu['senha']. "', '"
            . $onu['numero1']. "', '"
            . $onu['controle1']. "', '"
            . $onu['numero2']. "', '"
            . $onu['controle2']. "', '"
            . strtoupper($onu['mac']). "', '"
            . $onu['nome']. "', '"
            . $onu['tecnico']. "', '"
            . $onu['cidade']
            . "')";
						
        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->insertDB($query);		

    	if (!$resultado) {
            echo "Falha ao efetuar o Cadastro ";
        } else {
            echo "Cadastro efetuado com Sucesso";
        }
    }
	
    /**
     * M�todo setUpdate()
     * Altera o cadastro dos dados do provisionamento
     * @param $onu com o post do formul�rio
     */	
    public function setUpdate($onu) {
                
        $query = "UPDATE tbonu SET "   
			. "loginPPPoEONU = '" . $onu['login']. "', "
			. "senhaPPPoEONU = '" . $onu['senha']. "', "
			. "numero1ONU = '" . $onu['numero1']. "', "
			. "controle1ONU = '" . $onu['controle1']. "', "
			. "numero2ONU = '" . $onu['numero2']. "', "
			. "controle2ONU = '" . $onu['controle2']. "', "
			. "macONU = '" . strtoupper($onu['mac']). "', "
			. "nomeClienteONU = '" . $onu['nome']. "', "
			. "idTecnico = '" . $onu['tecnico']. "', "
			. "idCidade = '" .$onu['cidade'] . "'"
			. " where idONU = " . $onu['id'];
			
						
        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->updateDB($query);		

    	if (!$resultado ) {
                echo "Falha ao efetuar a atualiza��o do Cadastro " .$resultado;
        } else {
                echo "Cadastro atualizado com Sucesso";
        }
    }
	
	
    /**
     * M�todo getMac()
     * Retorna os dados cadastrados no banco de dados
     * @param int $id C�digo do cadastro a ser carregado
     */
    public function getMac($mac) {
                
        $query = "SELECT * FROM tbonu, tbconfig where macONU = '$mac'";

        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $db->desconecta();

    	return $resultado;
        
    }
	
	
	 /**
     * M�todo deleta()
     * Excluir uma cidade cadastrada.
	 * @param: int $id c�digo da cidade
     */  
    public function deleta($id) {
		
        #validar ID e executar o m�todo, caso contr�rio retorna erro
        if (isset($id) and (strlen($id) > 0)) {

        $query = "DELETE from tbonu where idONU = $id";

        # criar conex�o com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->deleteDB($query);

        if($resultado){
            echo 'Cliente Exclu�do com sucesso!';
        }
        else{
            echo 'Falha ao excluir o Cliente! erro='. mysqli_error($db);
        }			
        } else
        {
            echo "ID n�o Informado na a��o";
        }
	}	
	
}