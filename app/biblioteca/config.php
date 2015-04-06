<?php 


class Config {

	/**
	 * Um array de configurações possibilita a 
	 * criação de modelos para múltiplos bancos
	 * de dados.
	 */
	public static $banco = array(
		'padrao' => array(
			'servidor' => 'localhost',
			'usuario' => 'root',
			'driver' => 'mysqli',
			'senha' => '',
			'porta' => '',
			'banco' => 'provisionamento',
			'charset' => 'utf-8'
		),

		'outro_banco' => array(
			'servidor' => 'localhost',
			'usuario' => 'root',
			'driver' => 'postgre',
			'senha' => '',
			'porta' => '5432',
			'banco' => 'dbmvc',
			'charset' => 'utf-8'
		)
	);

}

?>
