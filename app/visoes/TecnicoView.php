<?php
header("Content-Type: text/html; charset=ISO-8859-1",true);
/*
 * Sistema de Documenta��o do Provedor
 * Autor: C�lio Martins
 * Vers�o: 1.1
 */
 
 
# gera os m�todos e cria a p�gina.

$pagina  = new TecnicoView();
$render  = $pagina->getPagina();
$render .= $pagina->getForm();
$render .= $pagina->getTabela($lista, $registros, $pag_request);
return $render;



class TecnicoView {
	
	/*
	* M�todo getPagina()
	* Retorna o cabe�alho da p�gina
	*/	
	public function getPagina(){
		echo " <div id='conteudo'>\n";
	    echo "  <div class='meioTabela'>\n";
        echo "      <h1>\n";
        echo "          Cadastro de T�cnicos\n";
        echo "      </h1>\n";
        echo "      <input type='button' value='Novo' onClick='cadastro_tecnico()' class='botaoNovo'>\n";      
        echo "  </div>\n";
	}
	
	
	
	
	/*
	* M�todo getTabela()
	* Retorna a tabela com os t�cnicos cadastradas
	* @Param $dados - dados dos t�cnicos cadastradas para popular a tabela
	*/
		
	function getTabela($dados, $registros, $pag_request) {
		
        echo "  <table class='table table-striped table-condensed table-hover' style='width:700px'>\n";
        echo "      <tr class='titulo'>\n";
        echo "          <th width='5%'>C&oacute;digo</th>\n";
        echo "          <th>Nome</th>\n";
        echo "          <th>Email</th>\n";
		echo "          <th>Cadastro</th>\n";
        echo "          <th class='central' width='60px' colspan='2'>A��es</th>\n";
        echo "      </tr>\n";

		# define a contagem inicial dos registros
		$i = 0;
		        
        foreach ($dados as $tec) {
            
            echo "      <tr class='linha'>\n";
			echo "          <td>".$tec['idTecnico']."</td>\n";
            echo "          <td id='".$tec['idTecnico']."'>".utf8_decode($tec['nomeTecnico'])."</td>\n";
            echo "          <td>".$tec['emailTecnico']."</td>\n";
			echo "          <td>".$tec['criadoEm']."</td>\n";
            echo "          <td width='30px'>\n";
			echo "				<button class='btn btn-default btn-xs toltip' title='Clique para Editar' onclick='editarTecnico(".$tec['idTecnico'].")'>\n";
			echo "					<span class='glyphicon glyphicon-pencil'></span>\n";
			echo "				</button></td>\n";
            echo "          <td width='30px'>\n";
			echo "				<button class='btn btn-default btn-xs toltip' title='Clique para Excluir' onclick='excluir_Tecnico(".$tec['idTecnico'].")'>\n";
			echo "					<span class='glyphicon glyphicon-remove'></span>\n";
			echo "				</button></td>\n";
            echo "      </tr>\n";
			
			# incrementa um d�gito na contagem;
			$i++;
        }
		
        echo "  </table>\n";		
		echo "  <script>$('.toltip').jBox('Tooltip', {});</script>\n";
		
		/*
		* GERAR PAGINA��O DOS REGISTROS PARA EXIBI��O NA P�GINA
		* $param REG_PAGINA definido na p�gina index.
		*/
		$registros_pagina = REG_PAGINA;
		if ($i < REG_PAGINA) {			
			$lista = $i + (($pag_request * REG_PAGINA)- REG_PAGINA);
		} else {
			$lista = $i;
		}
		
		echo "	<p>Listando <b>".$lista."</b> registros de <b>".$registros."</b></p>\n";
		
		# Se a quantidade de registros for maior que o listado ir� paginar caso contr�rio n�o exibe p�ginas.
		if ($registros > $i)
		{		
			echo "	<ul class='pagination pagination-sm'>\n";
			echo "	<p>P&aacute;ginas: </p>\n";
			$quant_paginas = ceil( $registros / REG_PAGINA );
			
			for($j=1; $j <= $quant_paginas; $j++)
			{
				if ($j == $pag_request) echo "<li class='active'><a>".($j)."</a></li>\n";
				else 
				echo "<li><a href=\"?controle=Tecnicos&acao=paginaTecnicos&pag=".($j)." \">".($j)."</a></li>\n";   			
			}              
			echo "	</ul>\n";
			echo "	<br>\n";
		}
		echo "  </div>\n";
		echo "	<br>\n";
	}
	
	
	/*
	* M�todo getForm()
	* Retorna o formul�rio de cadastro e edi��o
	*/
	
	function getForm() {
		
		# formul�rio de cadastro de T�cnico
		
		echo "          <form id='formTecnico' method='POST' action='' onSubmit='return false' class='formularioGeral'>\n";
        echo "              <div class='esquerda margemTop15 margemEsq10'>\n";
        echo "                  <label>Nome do T&eacute;cnico</label><br />\n";
        echo "                  <input type='text' name='nomeTecnico' required style='width: 366px'><br />\n";
        echo "              </div>\n";
               
        echo "              <div class='arruma'></div>\n";
        
        echo "              <div class='esquerda margemTop15 margemEsq10'>\n";
        echo "                  <label>Email</label><br />\n";
        echo "                  <input type='email' name='emailTecnico' required style='width: 245px'><br />\n";
        echo "              </div>\n";
        
        echo "              <div class='esquerda margemTop15 margemEsq10'>\n";
        echo "                  <label>Senha</label><br />\n";
        echo "                  <input type='text' name='senhaTecnico' required style='width: 110px'><br />\n";
        echo "              </div>\n";

		echo "				<input type='hidden' id='codTecnico' name='codTecnico'>\n";	
		
        echo "              <input type='submit' value='Salvar' id='salvaTecnico' onClick='Formgravar_Tecnico()' class='btEnviar margemTop15'/>";
		echo "              <input type='button' value='Cancelar' onClick='cadtecnico.close()' class='btEnviar margemTop15'/>";
        echo "          </form>\n";		
	}
	
	
}