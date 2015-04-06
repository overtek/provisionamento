<?php

/**
 * Classe usada para recuperar e adicionar informações
 * dentro da variável $_REQUEST. É apenas um facilitador
 * para evitar a reescrita de códigos de verificação isset.
 *
 */
class Request {
    
    /**
     *
     *  Método estático usado para recuperar uma informação
     *  de dentro da variável $_REQUEST. Ele verifica se a
     *  chave existe no array. Caso exista, retorna o valor
     *  da variável. Se não existir, retorna uma string vazia.
     *
     *  @param string $key
     *  @return string
     */
    public static function get($key) {
        
        if (isset($_REQUEST[$key]) && ($_REQUEST[$key] != '')) {
            return $_REQUEST[$key];
        }
        else {
            return '';
        }
        
    }
    
    /**
     *
     *  Método usado para adicionar um valor numa chave
     *  da variável $_REQUEST, independente da variável
     *  existir ou não.
     * 
     *  @param string $key
     *  @param mixed $val
     *  @return void
     */
    public static function set($key, $val) {
        $_REQUEST[$key] = $val;
    }
}
