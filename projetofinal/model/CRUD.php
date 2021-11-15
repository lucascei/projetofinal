<?php
include_once 'DB.php';

abstract class CRUD extends DB{
    //propriedade protegida
    protected $Tabela;
    
    //declarando métods abstratos inserir() e atualizar($id)
    protected abstract function Inserir();
    protected abstract function Atualizar($id);
    
    //método selecionarTudo()
    public function selecionarTudo(){
        $sql = "SELECT * FROM $this->Tabela";//cria a instrução
        $stmt = DB::preparaSQL($sql);//prepara na conexão a instrução
        $stmt->execute();//executa a instrução
        return $stmt->fetchAll();//retorna todos os registros encontrados
    }
    
    //método selecionarTudo($id)
    public function selecionar($id){
        $sql = "SELECT * FROM $this->Tabela WHERE id = ?";//cria a instrução
        $stmt = DB::preparaSQL($sql);//prepara na conexão a instrução
        $stmt->bindValue(1, $id, PDO::PARAM_INT);//busca cheia por um valors
        $stmt->execute();//executa a instrução
        return $stmt->fetch();//retorna todos os registros encontrados
    }
    //método Selecionar($id)
    public function Deletar($id){
        $sql = "DELETE FROM $this->Tabela WHERE id = ?";//cria a instrução
        $stmt = DB::preparaSQL($sql);//prepara na conexão a instrução
        $stmt->bindValue(1, $id, PDO::PARAM_INT);//busca cheia por um valors
        return $stmt->execute();//executa a instrução
    }
}
