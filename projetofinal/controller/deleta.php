<?php
function __autoload($Classe) {
    include_once "../model/$Classe.php";
}

$E = new Editora;
$A = new Autor;
$L = new Livro;

if (filter_input(INPUT_GET, 'acao') == 'delEditora') {
    $id = filter_input(INPUT_GET, 'id');
    
    if ($E->Deletar($id)) {
        echo "<script>alert('Editora Excluida'); location='../logado.php?link=1'</script>";
    }
}
if (filter_input(INPUT_GET, 'acao') == 'delAtor') {
    $id = filter_input(INPUT_GET, 'id');
    
    if ($A->Deletar($id)) {
        echo "<script>alert('Autor Excluido'); location='../logado.php?link=2'</script>";
    }
}
if (filter_input(INPUT_GET, 'acao') == 'delLivro') {
    $id = filter_input(INPUT_GET, 'id');
    
    if ($L->Deletar($id)) {
        echo "<script>alert('Livro Excluido'); location='../logado.php?link=3'</script>";
    }
}


