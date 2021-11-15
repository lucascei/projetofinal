<?php

function __autoload($Classe) {
    include_once "../model/$Classe.php";
}

$E = new Editora;
$A = new Autor;
$L = new Livro;




if(filter_input(INPUT_GET, 'acao') == 'altEditora'){
    $id = filter_input(INPUT_POST, 'id');
    $Editora = filter_input(INPUT_POST, 'editora');
    
    
    $E->setEditora($Editora);
    
    if($E->Atualizar($id)){
        echo "<script>alert('Editora Atualizada');location='../logado.php?link=1'</script>";
    }else{
        echo 'estou aqui';
    }
}

if(filter_input(INPUT_GET, 'acao') == 'altAutor'){
    $id = filter_input(INPUT_POST, 'id');
    $Nome = filter_input(INPUT_POST, 'nome');
    $Sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $Id_Editora = filter_input(INPUT_POST, 'id_editora');
    
    
    $A->setId($id);
    $A->setNome($Nome);
    $A->setSobrenome($Sobrenome);
    $A->setId_Editora($Id_Editora);
    
    if($A->Atualizar($id)){
        echo "<script>alert('Autor Atualizada');location='../logado.php?link=2'</script>";
    }else{
        echo 'estou aqui';
    }
}

if(filter_input(INPUT_GET, 'acao') == 'altLivro'){
    
    $id = filter_input(INPUT_POST, 'id');
    $Titulo = filter_input(INPUT_POST, 'titulo');
    $Categoria = filter_input(INPUT_POST, 'categoria');
    $Edicao = filter_input(INPUT_POST, 'edicao');
    
    $Id_autor = filter_input(INPUT_POST, 'id_autor');

  
    echo $id;
    $L->setId($id);
    $L->setTitulo($Titulo);
    $L->setCategoria($Categoria);
    $L->setEdicao($Edicao);
    
    
    $L->setId_autor($Id_autor);
    
    if($L->Atualizar($id)){
        echo "<script>alert('Livro Atualizado');location='../logado.php?link=3'</script>";
    }else{
        echo 'estou aqui';
    }
}
