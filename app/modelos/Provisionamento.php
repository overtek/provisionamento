<?php

/*
 * Sistema de Documentação do Provedor
 * Autor: Steve Evangelista
 * Versão: 1.0
 * 
 * Upgrade: Versão 1.1
 * Célio Martins
 */


/**
 * Classe Provisionamento
 * @author Steve Evangelista
 * Modelo do Provisionamento
 */
 
class Provisionamento {  
    
    /**
     * Método lista()
     * Retorna os objetos com os dados cadastrados no banco de dados
     * @param int $pagina Número da página a ser carregada
     */
    public function getLista($pagina, $cliente) {
		
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();
			
        $inicio = (REG_PAGINA * $pagina) - REG_PAGINA;		
                
        $query = "SELECT * FROM tbonu o left join tbcidade c on c.idCidade = o.idCidade left join tbestado e on e.idEstado = c.idEstado
WHERE statusONU = 1";

        if ($cliente != null) {
            # remover os caracteres com acêntos
            $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
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
     * Método getTotalRegistros()
     * Retorna o total de registros cadastrados no banco de dados
     */	
	public function getTotalRegistros($cliente){
            
            # criar conexão com o banco de dados
            $db = new ConexaoDB();
            $db->conecta();
		
            # pegar a quantidade total dos registros para o paginamento
            $query = "SELECT * from tbonu WHERE statusONU = 1";

            if ($cliente != null) {
                # remover os caracteres com acêntos
                $from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
                $to = "aaaaeeiooouucAAAAEEIOOOUUC";
                $cliente = strtr($cliente, $from, $to);			
                $query .= " and nomeClienteONU like '%" . $cliente . "%'";
            }

            $resultado = $db->contarDB($query);
		
            $db->desconecta();

            return $resultado;
	}	
	
	
    /**
     * Método getCadastro()
     * Retorna os dados cadastrados no banco de dados
     * @param int $id Código do cadastro a ser carregado
     */
    public function getCadastro($id) {
                
        $query = "SELECT * FROM tbonu where idONU = $id";

        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();
		
        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $db->desconecta();
        
    	return json_encode($resultado);
        
    }	
	
	
    /**
     * Método setCadastro()
     * Cadastra os dados do provisionamento
     * @param $onu com o post do formulário
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
						
        # criar conexão com o banco de dados
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
     * Método setUpdate()
     * Altera o cadastro dos dados do provisionamento
     * @param $onu com o post do formulário
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
			
						
        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->updateDB($query);		

    	if (!$resultado ) {
                echo "Falha ao efetuar a atualização do Cadastro " .$resultado;
        } else {
                echo "Cadastro atualizado com Sucesso";
        }
    }
	
	
    /**
     * Método getMac()
     * Retorna os dados cadastrados no banco de dados
     * @param int $id Código do cadastro a ser carregado
     */
    public function getMac($mac) {
                
        $query = "SELECT * FROM tbonu, tbconfig where macONU = '$mac'";

        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->selectDB($query);

        $db->desconecta();

    	return $resultado;
        
    }
	
	
	 /**
     * Método deleta()
     * Excluir uma cidade cadastrada.
	 * @param: int $id código da cidade
     */  
    public function deleta($id) {
		
        #validar ID e executar o método, caso contrário retorna erro
        if (isset($id) and (strlen($id) > 0)) {

        $query = "DELETE from tbonu where idONU = $id";

        # criar conexão com o banco de dados
        $db = new ConexaoDB();
        $db->conecta();

        # executa a query e guarda o resultado na variavel
        $resultado = $db->deleteDB($query);

        if($resultado){
            echo 'Cliente Excluído com sucesso!';
        }
        else{
            echo 'Falha ao excluir o Cliente! erro='. mysqli_error($db);
        }			
        } else
        {
            echo "ID não Informado na ação";
        }
	}	
	
}