<?php 

/**
 * classe que serve de caminho padrão
 * para instanciar uma conexão com
 * o banco de dados usando singleton.
 */
class DB {

    /**
     * lista de conexões com o banco
     * de dados abertas para cada
     * tipo de configuração em Config.php
     */
	private static $banco = array();

	/**
	 * Método usado para instanciar um objeto
	 * de conexão com o banco de dados.
	 */
	public static function criar($tipo) {
		# Verifica se a configuração de banco de dados
		# existe na classe config. Se não existir, emite
		# uma mensagem de erro.
		if (!array_key_exists($tipo, Config::$banco)) {
			die('Configuração de banco de dados não encontrada!');
		}

		# Verifica se o tipo de banco de dados já
		# foi instanciado. Se já tiver sido criado
		# retorna a conexão com o banco existentene
		if (array_key_exists($tipo, self::$banco)) {
			return self::$banco[$tipo];
		}

		# Se o banco de dados ainda não tiver sido criado
		# cria uma nova conexão com o banco de dados.
		if (Config::$banco[$tipo]['driver'] == 'mysqli') {
			self::$banco[$tipo] = new mysqli(
				Config::$banco[$tipo]['servidor'],
				Config::$banco[$tipo]['usuario'],
				Config::$banco[$tipo]['senha'],
				Config::$banco[$tipo]['banco']
			);

			if (Config::$banco[$tipo]['charset'] != '') {
				self::$banco[$tipo]->set_charset(Config::$banco[$tipo]['charset']);
			}

			return self::$banco[$tipo];
		}

		
	}
}

?>