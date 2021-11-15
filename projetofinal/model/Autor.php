<?php

include_once 'CRUD.php';

class Autor extends CRUD {

    private $id;
    private $Nome;
    private $Sobrenome;
    private $Id_Editora;
    protected $Tabela = 'autor';

    function getId() {
        return $this->id;
    }
     function setId($id) {
        $this->id = $id;
    }
    function getNome() {
        return $this->Nome;
    }

    function getSobrenome() {
        return $this->Sobrenome;
    }

   

    function setNome($Nome) {
        $this->Nome = $Nome;
    }

    function setSobrenome($Sobrenome) {
        $this->Sobrenome = $Sobrenome;
    }
    function getId_Editora() {
        return $this->Id_Editora;
    }

    function setId_Editora($Id_Editora) {
        $this->Id_Editora = $Id_Editora;
    }

    
    public function Inserir() {
        $sql = "INSERT INTO $this->Tabela(nome,sobrenome,id_editora)VALUE(?,?,?)";
        $stmt = DB::preparaSQL($sql);
        $stmt->bindValue(1, $this->getNome());
        $stmt->bindValue(2, $this->getSobrenome());
        $stmt->bindValue(3, $this->getId_Editora());
        return $stmt->execute();
    }

    public function Atualizar($id) {
        $sql = "UPDATE $this->Tabela SET nome = ?,sobrenome = ?, id_editora = ? WHERE id = ? ";
        $stmt = DB::preparaSQL($sql);
        $stmt->bindValue(1, $this->getNome());
        $stmt->bindValue(2, $this->getSobrenome());
        $stmt->bindValue(3, $this->getId_Editora());
        $stmt->bindValue(4, $id,  PDO::PARAM_INT);
        return $stmt->execute();
    }


}
