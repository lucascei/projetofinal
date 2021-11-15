<?php

include_once 'CRUD.php';

class Livro extends CRUD{
    
    public $id;
    private $Titulo;
    private $Categoria;
    private $Edicao;
    private $id_autor;
    protected $Tabela = 'tb_livro';
    
    
    function getId() {
        return $this->id;
    }

    function getTabela() {
        return $this->Tabela;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTabela($Tabela) {
        $this->Tabela = $Tabela;
    }

    
        function getTitulo() {
        return $this->Titulo;
    }

    function getCategoria() {
        return $this->Categoria;
    }

    function getEdicao() {
        return $this->Edicao;
    }

    function getId_autor() {
        return $this->id_autor;
    }

    function setTitulo($Titulo) {
        $this->Titulo = $Titulo;
    }

    function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }

    function setEdicao($Edicao) {
        $this->Edicao = $Edicao;
    }

    function setId_autor($id_autor) {
        $this->id_autor = $id_autor;
    }

        
    public function Inserir() {
        $sql = "INSERT INTO $this->Tabela(titulo,categoria,edicao,id_autor)VALUE(?,?,?,?)";
        $stmt = DB::preparaSQL($sql);
        $stmt->bindValue(1, $this->getTitulo());
        $stmt->bindValue(2, $this->getCategoria());
        $stmt->bindValue(3, $this->getEdicao());
        $stmt->bindValue(4, $this->getId_autor());
        return $stmt->execute();
    }
    
    public function Atualizar($id) {
        $sql = "UPDATE $this->Tabela SET titulo = ?, categoria = ?, edicao = ?, id_autor = ? WHERE id = ? ";
        $stmt = DB::preparaSQL($sql);
        
        $stmt->bindValue(1, $this->getEdicao());
        $stmt->bindValue(2, $this->getCategoria());
        $stmt->bindValue(3, $this->getId_autor());
        $stmt->bindValue(4, $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    

}
