<?php

//classe abstrata não pode ser instanciada
abstract class DB {
    //propriedade estática $instancia
    private static $instancia;
    
    //método privado estático pega instância de conexão pegar Instancia()
    private static function pegarInstancia(){
        //verifica se não possui instância de conexão
        if(empty(self::$instancia)){
            //tente - caso ocorra alguma exceção mostre o erro
            try{
                $dsn = 'mysql:host=localhost;dbname=projetofinal';
                self::$instancia = new PDO($dsn, 'root', '');
                self::$instancia->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instancia->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,  PDO::FETCH_OBJ);
                
            } catch (Exception $ex) {
                //caso ocorra exceção
                print 'Erro!:'.$ex->getMessage();
            }
        }
        //retorna a instancia de conexão 
        return self::$instancia;
        
    }
    // método prepara o sql na instancia de conexão estabelecida prepara sql()
    protected static function preparaSQL($sql){
        return self::pegarInstancia()->prepare($sql);
    }
}
