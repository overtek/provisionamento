<?php

/*
 * Sistema de Documentação do Provedor
 * Autor: Célio Martins
 * Versão: 1.1
 */

class ArquivoControle extends Controle {

    /**
     * MÃ©todo geraArquivo()
     * Carrega os dados de uma ONU em um arquivo de provisionamento
     * 
     * @param int $mac MAC da ONU
     */
    public function geraArquivo() {

        if (!isset($_GET["mac"])) {
            echo "Código do MAC não informado";
        } else {

            $mac = $_GET["mac"];

            $MAC = str_split($mac);

            $macONU = $MAC[0] . $MAC[1] . ':' . $MAC[2] . $MAC[3] . ':'
                    . $MAC[4] . $MAC[5] . ':' . $MAC[6] . $MAC[7] . ':'
                    . $MAC[8] . $MAC[9] . ':' . $MAC[10] . $MAC[11];


            # carrega o modelo Provisionamento		
            $this->modelo('Provisionamento');

            # executa o método getMac passando o mac da onu como parâmetro e guarda os dados na variável $dados
            $dados = $this->Provisionamento->getMac($macONU);

            # checar se obteve resultado do BD
            if (count($dados) < 1) {
                echo "MAC da ONU não encontrado no banco de dados";
                exit();
            }

            # seta os dados da variável $data para a View
            $this->visao->set('dados', $dados);
			
			# se existir o get da versão
			if (isset($_GET["version"])) {
				# renderiza a view versão 2
	            $this->visao->render('provisionamento_v2');
			} 
			else {
	            # renderiza a view versão 1
    	        $this->visao->render('provisionamento');
			}
        }
    }

}
