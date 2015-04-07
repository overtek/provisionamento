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
 * Classe ProvisionamentoView
 * @author Steve Evangelista
 * Views do Provisionamento
 */

$pagina = new ProvisionamentoView();
$render = $pagina->getPagina($lista_cidades, $lista_tecnicos, $lista_estados, $cliente);

switch ($acao) {
    case "getTabela" : $render .= $pagina->getTabela($lista, $registros, $pag_request);
}

return $render;

class ProvisionamentoView {  
    
    /*
     * Método pagina()
     * Abre a página de cadastro de Provisionamento, Cadastro de Técnicos e Cadastro de Cidades
     */
    
    public function getPagina($lista_cidades, $lista_tecnicos, $lista_estados, $cliente){
		
        echo " <div id='conteudo'>\n";
        echo "  <div class='meioTabela'>\n";
        echo "      <h1>\n";
        echo "          Clientes com Provisionamento\n";
        echo "      </h1>\n";
        echo "      <input type='button' value='Novo' onClick='abrirCadastro()' class='botaoNovo'>\n";
        echo "		<div class='input-group busca'>\n";
        echo "			<input type='text' id='busca_cliente' class='form-control' value='".$cliente."' placeholder='Buscar por Cliente'>\n";
        echo "			<span class='input-group-btn'>\n";
        echo "				<button class='btn btn-default' onClick='buscar_cliente()' type='button'>Ok</button>\n";
        echo "			</span>\n";
        echo "		</div>\n";		
        echo "  </div>\n";
        
        echo "  <div id='formCadONU'>\n";
        echo "      <form method='post' action='' onSubmit='return false' class='formularioGeral' id='cadastroTelefonia'>\n";
        echo "          <div class='esquerda divConteudo margemEsq20'>\n"; 
        echo "              <h2>PPPoE</h2>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <label>Usu&aacute;rio PPPoE</label><br />\n";
        echo "                  <input type='text' name='login' style='width: 170px' required='required'><br />\n";
        echo "              </div>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <label>Senha PPPoE</label><br />\n";
        echo "                  <input type='text' name='senha' style='width: 170px' required='required'><br />\n";
        echo "              </div>\n";
        echo "          </div>\n";
        
        echo "          <div class='esquerda divConteudo margemEsq20'>\n";
        echo "              <h2>Telefone P1</h2>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <label>N&uacute;mero de Telefone - 1</label><br />\n";
        echo "                  <input type='text' name='numero1' style='width: 170px' class='desativado'><br />\n";
        echo "              </div>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <label>N&uacute;mero de Controle - 1</label><br />\n";
        echo "                  <input type='text' name='controle1' style='width: 170px' class='desativado'><br />\n";
        echo "              </div>\n";
        echo "          </div>\n";
        
        echo "          <div class='esquerda divConteudo margemEsq20'>\n";
        echo "              <h2>Telefone P2</h2>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <label>N&uacute;mero de Telefone - 2</label><br />\n";
        echo "                  <input type='text' name='numero2' style='width: 170px' class='desativado'><br />\n";
        echo "              </div>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <label>N&uacute;mero de Controle - 2</label><br />\n";
        echo "                  <input type='text' name='controle2' style='width: 170px' class='desativado'><br />\n";
        echo "              </div>\n";
        echo "          </div>\n";
            
        echo "          <div class='esquerda divConteudo margemEsq20'>\n";
        echo "              <h2>Equipamento do Cliente</h2>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <label>MAC da ONU</label><br />\n";
        echo "                  <input type='text' name='mac' style='width: 183px' id='campo_mac' required='required'>\n";
        echo "              </div>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <label>Titular</label><br />\n";
        echo "                  <input type='text' name='nome' style='width: 183px' required='required'>\n";
        echo "              </div>\n";
        echo "          </div>\n";
        
        echo "          <div class='esquerda divConteudo margemEsq20 margemTop20'>\n";
        echo "              <h2>T&eacute;cnico &nbsp;<img class='botaoSpan' src='img/adicionar.png' onclick='cadastro_tecnico()' title='Cadastrar novo T&eacute;cnico' id='btAddTec'/></h2>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <select name='tecnico' style='width: 280px' id='LISTATEC'>\n";
		echo utf8_decode($lista_tecnicos);
        echo "                  </select>\n";
        echo "              </div>\n";
        echo "          </div>\n";
        
        echo "          <div class='esquerda divConteudo margemEsq20 margemTop20'>\n";
        echo "              <h2>Cidade da Instala&ccedil;&atilde;o &nbsp;<img class='botaoSpan' onclick='cadastro_cidade()' src='img/adicionar.png' title='Cadastrar Nova Cidade' id='btAddCid'/></h2>\n";
        echo "              <div class='campo margemTop10'>\n";
        echo "                  <select name='cidade' style='width: 280px' id='LISTACIDADES'>\n";
        echo utf8_decode($lista_cidades);
        echo "                  </select>\n";
        echo "              </div>\n";
        echo "          </div>\n";
            
        echo "          <input type='hidden' value='' name='id' />\n";
        
        echo "          <input type='submit' value='Salvar\nProvisionamento' onclick='gravarONU()' class='direita' id='btEnviarMAC'>\n";
        
        echo "          <div class='arruma'></div>\n";
        echo "      </form>\n";
        echo "  </div>\n";
		
        # formulário de cadastro de Técnico

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

        echo "              <input type='hidden' id='codTecnico' name='idTecnico'/>";
        echo "              <input type='submit' value='Salvar' id='salvaTecnico' onClick='gravar_Tecnico()' class='btEnviar margemTop15'/>";
        echo "              <input type='button' value='Cancelar' onClick='cadtecnico.close()' class='btEnviar margemTop15'/>";
        echo "          </form>\n";
		
        # formulário de cadastro de cidade
		
        echo "          <form id='formCidade' method='POST' action='' onSubmit='return false' class='formularioGeral'>\n";
        echo "              <div class='esquerda margemTop15 margemEsq10'>\n";
        echo "                  <label>Nome da Cidade</label><br />\n";
        echo "                  <input type='text' required name='nomeCidade' value='teste' style='width: 285px'><br />\n";
        echo "              </div>\n";
        
        echo "              <div class='esquerda margemTop15 margemEsq10'>\n";
        echo "                  <label>Estado</label><br />\n";
        echo "                  <select name='idEstado' style='width: 70px'>\n";
        echo $lista_estados;
        echo "                  </select>\n";
        echo "              </div>\n";
        echo "				<input type='hidden' id='codCidade' name='codCidade'>\n";
        echo "              <input type='submit' value='Salvar' onClick='gravar_Cidade()' class='btEnviar'/>";
        echo "              <input type='button' value='Cancelar' onClick='cadcidade.close()' class='btEnviar margemTop15'/>";		
        echo "          </form>\n";		
    }
    
    
    
    
    /**
     * Método tabela()
     * Gera a tabela de clientes cadastrados
     * @param type $ONUs
     */
	 
    public function getTabela($ONUs, $registros, $pag_request) {

        echo "  <table class='table table-striped table-condensed table-hover'>\n";
        echo "      <tr class='titulo'>\n";
        echo "          <th width='5%'>C&oacute;digo</th>\n";
        echo "          <th width='20%'>Nome do Cliente</th>\n";
        echo "          <th width='10%'>MAC da ONU</th>\n";
        echo "          <th width='10%'>Login</th>\n";
        echo "          <th width='10%'>Telefone 1</th>\n";
        echo "          <th width='10%'>Telefone 2</th>\n";
        echo "          <th width='15%'>Cidade</th>\n";
        echo "          <th width='15%'>Adicionado</th>\n";
        echo "          <th width='60px' colspan='2'>A&ccedil;&otilde;es</th>\n";
        echo "      </tr>\n";
		
        # define a contagem inicial dos registros
        $i = 0;
        
        foreach ($ONUs as $onu) {
            
            echo "      <tr class='linha'>\n";
            echo "          <td width='5%'>".$onu->idONU."</td>\n";
            echo "          <td id='".$onu->idONU."' width='20%'>".utf8_decode($onu->nomeClienteONU)."</td>\n";
            echo "          <td width='10%'>".$onu->macONU."</td>\n";
            echo "          <td width='10%'>".$onu->loginPPPoEONU."</td>\n";
            echo "          <td width='10%'>".$onu->numero1ONU."</td>\n";
            echo "          <td width='10%'>".$onu->numero2ONU."</td>\n";
            echo "          <td width='15%'>".utf8_decode($onu->nomeCidade). "/" . $onu->nomeEstado ."</td>\n";
            echo "          <td width='15%'>".$onu->criadoEm."</td>\n";
            echo "          <td width='30px'>\n";
            echo "				<button class='btn btn-default btn-xs toltip' title='Clique para Editar' onclick='editarCadastro(".$onu->idONU.")'>\n";
            echo "					<span class='glyphicon glyphicon-pencil'></span>\n";
            echo "				</button></td>\n";
            echo "          <td width='30px'>\n";
            echo "				<button class='btn btn-default btn-xs toltip' title='Clique para Excluir' onclick='excluir_cliente(".$onu->idONU.")'>\n";
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
                        echo "<li><a href=\"?controle=Provisionamento&acao=carregaTabela&pag=".($j)." \">".($j)."</a></li>\n";   			
                }              
                echo "	</ul>\n";
                echo "	<br>\n";
        }
        echo " </div>\n";
    }
    
}