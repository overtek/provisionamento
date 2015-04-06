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
		$db = DB::criar('padrao');
			
        $inicio = (REG_PAGINA * $pagina) - REG_PAGINA;		
                
        $query = "SELECT * FROM tbONU o left join tbcidade c on c.idCidade = o.idCidade left join tbestado e on e.idEstado = c.idEstado
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
		$resultado = $db->query($query);

    	$result = $resultado->fetch_all(MYSQLI_ASSOC);
		
    	$resultado->free();

    	return $result;
        
    }
	
    /**
     * Método getTotalRegistros()
     * Retorna o total de registros cadastrados no banco de dados
     */	
	public function getTotalRegistros($cliente){
		# criar conexão com o banco de dados
		$db = DB::criar('padrao');
		
		# pegar a quantidade total dos registros para o paginamento
		$query = "SELECT count(*) as tot from tbONU WHERE statusONU = 1";
		
		if ($cliente != null) {
			# remover os caracteres com acêntos
			$from = "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ";
			$to = "aaaaeeiooouucAAAAEEIOOOUUC";
			$cliente = strtr($cliente, $from, $to);			
			$query .= " and nomeClienteONU like '%" . $cliente . "%'";
		}

		$resultado = $db->query($query);
		$result = $resultado->fetch_all(MYSQLI_ASSOC);
		$total_registros = $result[0]['tot'];		
		$resultado->free();
		
		return $total_registros;
	}	
	
	
    /**
     * Método getCadastro()
     * Retorna os dados cadastrados no banco de dados
     * @param int $id Código do cadastro a ser carregado
     */
    public function getCadastro($id) {
                
        $query = "SELECT * FROM tbONU where idONU = $id";

		# criar conexão com o banco de dados
		$db = DB::criar('padrao');
		
		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query);

    	$result = $resultado->fetch_all(MYSQLI_ASSOC);
		
    	$resultado->free();

    	return json_encode($result);
        
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
		$db = DB::criar('padrao');

		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query);		

    	if (!$resultado ) {
			echo "Falha ao efetuar o Cadastro " .$resultado;
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
		$db = DB::criar('padrao');

		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query);		

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
                
        $query = "SELECT * FROM tbONU, tbConfig where macONU = '$mac'";

		# criar conexão com o banco de dados
		$db = DB::criar('padrao');

		# executa a query e guarda o resultado na variavel
		$resultado = $db->query($query);

    	$result = $resultado->fetch_all(MYSQLI_ASSOC);
		
    	$resultado->free();

    	return $result;
        
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
			$db = DB::criar('padrao');
			
			# executa a query e guarda o resultado na variavel
			$resultado = $db->query($query);
	
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
