<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
/*
 * Sistema de Documentação do Provedor
 * Autor: Célio Martins
 * Versão: 1.1
 */
 
 
# gera os métodos e cria a página.

$pagina  = new CidadeView();
$render  = $pagina->getPagina();
$render .= $pagina->getForm($lista_estados);
$render .= $pagina->getTabela($lista, $registros, $pag_request);
return $render;



class CidadeView {
	
	/*
	* Método getPagina()
	* Retorna o cabeçalho da página
	*/	
	public function getPagina(){
		echo " <div id='conteudo'>\n";
	    echo "  <div class='meioTabela'>\n";
        echo "      <h1>\n";
        echo "          Cadastro de Cidades\n";
        echo "      </h1>\n";
        echo "      <input type='button' value='Novo' onClick='Form_cadCidade()' class='botaoNovo'>\n";      
        echo "  </div>\n";
	}
	
	
	
	
	/*
	* Método getTabela()
	* Retorna a tabela com as cidades cadastradas
	* @Param $dados - dados das cidades cadastradas para popular a tabela
	*/
		
	function getTabela($dados, $registros, $pag_request) {
		
        echo "  <table class='table table-striped table-condensed table-hover' style='width:600px'>\n";
        echo "      <tr class='titulo'>\n";
        echo "          <th width='5%'>C&oacute;digo</th>\n";
        echo "          <th>Cidade</th>\n";
        echo "          <th>Estado</th>\n";
        echo "          <th class='central' width='60px' colspan='2'>Ações</th>\n";
        echo "      </tr>\n";
        
		# define a contagem inicial dos registros
		$i = 0;
				
        foreach ($dados as $cit) {
            
            echo "      <tr class='linha'>\n";
			echo "          <td>".$cit['idCidade']."</td>\n";
            echo "          <td id='".$cit['idCidade']."'>".utf8_decode($cit['nomeCidade'])."</td>\n";
            echo "          <td>".$cit['nomeEstado']."</td>\n";
            echo "          <td width='30px'>\n";
			echo "				<button class='btn btn-default btn-xs toltip' title='Clique para Editar' onclick='editarCidade(".$cit['idCidade'].")'>\n";
			echo "					<span class='glyphicon glyphicon-pencil'></span>\n";
			echo "				</button></td>\n";
            echo "          <td width='30px'>\n";
			echo "				<button class='btn btn-default btn-xs toltip' title='Clique para Excluir' onclick='excluir_cidade(".$cit['idCidade'].")'>\n";
			echo "					<span class='glyphicon glyphicon-remove'></span>\n";
			echo "				</button></td>\n";
            echo "      </tr>\n";
			
			# incrementa um dígito na contagem;
			$i++;			
        }
		
        echo "  </table>\n";		
		echo "  <script>$('.toltip').jBox('Tooltip', {});</script>\n";
		
		/*
		* GERAR PAGINAÇÃO DOS REGISTROS PARA EXIBIÇÃO NA PÁGINA
		* $param REG_PAGINA definido na página index.
		*/
		$registros_pagina = REG_PAGINA;
		if ($i < REG_PAGINA) {			
			$lista = $i + (($pag_request * REG_PAGINA)- REG_PAGINA);
		} else {
			$lista = $i;
		}
		
		echo "	<p>Listando <b>".$lista."</b> registros de <b>".$registros."</b></p>\n";
		
		# Se a quantidade de registros for maior que o listado irá paginar caso contrário não exibe páginas.
		if ($registros > $i)
		{	
			echo "	<ul class='pagination pagination-sm'>\n";
			echo "	<p>P&aacute;ginas: </p>\n";
			$quant_paginas = ceil( $registros / REG_PAGINA );
			
			for($j=1; $j <= $quant_paginas; $j++)
			{
				if ($j == $pag_request) echo "<li class='active'><a>".($j)."</a></li>\n";
				else 
				echo "<li><a href=\"?controle=Cidade&acao=paginaCidades&pag=".($j)." \">".($j)."</a></li>\n";   			
			}              
			echo "	</ul>\n";
		}
		
		echo "	<br>\n";
		echo "  </div>\n";
	}
	
	
	/*
	* Método getForm()
	* Retorna o formulário de cadastro e edição
	* @Param $lista_estados - lista dos estados cadastrados para popular o select
	*/
	
	function getForm($lista_estados) {
		
		# formulário de cadastro de cidade
		
        echo "          <form id='formCidade' method='POST' action='' onSubmit='return false' class='formularioGeral'>\n";
        
		echo "              <div class='esquerda margemTop15 margemEsq10'>\n";
        echo "                  <label>Nome da Cidade</label><br />\n";
        echo "                  <input type='text' required name='nomeCidade' style='width: 285px'><br />\n";
        echo "              </div>\n";
        
        echo "              <div class='esquerda margemTop15 margemEsq10'>\n";
        echo "                  <label>Estado</label><br />\n";
        echo "                  <select name='idEstado' style='width: 70px'>\n";
		echo $lista_estados;
        echo "                  </select>\n";
        echo "              </div>\n";
		
		echo "              <input type='hidden' id='codCidade' name='idCidade' />";
		
        echo "              <input type='submit' id='codCidade' value='Salvar' onClick='Formgravar_Cidade()' class='btEnviar'/>";
		echo "              <input type='button' value='Cancelar' onClick='cadcidade.close()' class='btEnviar margemTop15'/>";		
        echo "          </form>\n";		
	}
	
	
}