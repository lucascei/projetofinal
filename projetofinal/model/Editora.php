<?php

include_once 'CRUD.php';

class Editora extends CRUD {
    protected $Tabela = 'editora';
    private $Editora;

    function getEditora() {
        return $this->Editora;
    }

    function setEditora($Editora) {
        $this->Editora = $Editora;
    
        
    }

    


    public function Inserir() {
        $sql = "INSERT INTO $this->Tabela(editora)VALUE(?)";
        $stmt = DB::preparaSQL($sql);
        $stmt->bindValue(1, $this->getEditora());
        return $stmt->execute();
    }
    public function Atualizar($id) {
        $sql = "UPDATE $this->Tabela SET editora = ? WHERE id = ? ";
        $stmt = DB::preparaSQL($sql);
        $stmt->bindValue(1, $this->getEditora());
        $stmt->bindValue(2, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    

}
