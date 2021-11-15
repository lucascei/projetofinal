<?php

function __autoload($Classe) {
    include_once "../model/$Classe.php";
}

$E = new Editora;
$A = new Autor;
$L = new Livro;

if (filter_input(INPUT_GET, 'acao') == 'cadEditora') {
    $Editora = filter_input(INPUT_POST, 'editora');
    $E->setEditora($Editora);
    if ($E->Inserir()) {
        echo "<script>alert('Editora Gravada');location='../logado.php?link=1' </script>";
    }
}

if (filter_input(INPUT_GET, 'acao') == 'cadAutor') {
    $Nome = filter_input(INPUT_POST, 'nome');
    $Sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $Id_Editora = filter_input(INPUT_POST, 'id_editora');
    $A->setNome($Nome);
    $A->setSobrenome($Sobrenome);
    $A->setId_Editora($Id_Editora);
    if ($A->Inserir()) {
        echo "<script>alert('Editora Gravada');location='../logado.php?link=2' </script>";
    }
}

 if (filter_input(INPUT_GET, 'acao') == 'cadLivro') {
        $Titulo = filter_input(INPUT_POST, 'titulo');
        $Categoria = filter_input(INPUT_POST, 'categoria');
        $Edicao = filter_input(INPUT_POST, 'edicao');
        $Id_Autor = filter_input(INPUT_POST, 'id_autor');

        $L->setTitulo($Titulo);
        $L->setCategoria($Categoria);
        $L->setEdicao($Edicao);
        $L->setId_Autor($Id_Autor);
        if ($L->Inserir()) {
            echo "<script>alert('Livro Gravado');location='../logado.php?link=3' </script>";
        }
    }

