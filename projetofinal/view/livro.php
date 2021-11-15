<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $E = new Editora;
            $A = new Autor;
            $L = new Livro;
            
            if(filter_input(INPUT_GET, 'acao') == 'formEditar3'){
                $id = filter_input(INPUT_GET, 'id');
                $livros = $L->Selecionar($id);
              
        ?>
        
        <h3 style="margin-top: 80px">Edicao de Livros</h3>
        <form method="post" action="./controller/altera.php?acao=altLivro">
            Livro
            <input type="hidden" name="id" required value="<?=$livros->id?>">
            <input type="text"   name="titulo"  value="<?=$livros->titulo?>">
            <input type="text"   name="categoria" required value="<?=$livros->categoria?>">
            <input type="text"   name="edicao" required value="<?=$livros->edicao?>">
            <select name="id_autor" required>
                <option selected disabled>Autor</option>
                
                
                <?php 
                    foreach($A->selecionarTudo() as $chave => $livro){
                        if($livros->id_autor == $livro->id){
                ?>
                <option selected value="<?=$livro->id?>"><?=$livro->nome?></option>
                    <?php
                        }else{
                    ?>
                    }
                        <option value="<?=$livro->id?>"><?=$livro->nome?></option>
                    <?php 
                        
                        }
                   
                        }
                ?>
                    
            </select>
            
            <input type="submit" value="Altera" onclick=" return confirm('Confirmar Edicao ?')">
        </form>
        
        <p>
        <a href="logado.php?link=3"><button>Sair da Edicao</button></a>
        </p>
        <?php } else { ?>
        
        <h3 style="margin-top: 80px">Cadastro de Livros</h3>
        <form method="post" action="./controller/insere.php?acao=cadLivro">
            Livro
            
            <input type="text" name="titulo" required placeholder="Titulo:">
            <input type="text" name="categoria" required placeholder="Categoria:">
            <input type="text" name="edicao" required placeholder="Edicao:">
            <select name="id_autor" required>
                <option selected disabled>Autor</option>
                <?php
                    $E = new Editora;
                    $A = new Autor;
                    foreach ($A->selecionarTudo() as $chave => $autores){
                ?>
                    <option value="<?=$autores->id?>"><?=$autores->nome?></option>
                <?php } ?>
                
            </select>
            <input type="submit" value="Gravar">
            
        <?php
        }
        ?>
            
            <table style="text-align: center; width: 50%; margin: 50px auto;">
            <tr style="background: #000; color:#fff">
                <td colspan="5">Lista de Autores</td>
            </tr>
            <tr style="background: darkgray;">
                <td>Titulo</td>
                <td>Categoria</td>
                <td>Edicao</td>
                <td>autor</td>
                <td>acao</td>
            </tr>
            <?php 
            
            
            foreach($L->selecionarTudo() as $chave => $livros){ 
          
?>
            <tr style="background: navajowhite;">
                <td><?= $livros->titulo ?></td>
                <td><?= $livros->categoria ?></td>
                <td><?= $livros->edicao ?></td>
                <td>
                    <?php
                    
                    foreach($A->selecionarTudo() as $chave => $autor){
                        if($livros->id_autor == $autor->id){
                            echo $autor->nome;
                        } 
                        
                    }
                    //verifica se existe editora
                    if(empty($livros->id_autor)){
                            echo '---';
                        }
                    ?>
                </td>
                <td>
                    <a href="logado.php?link=3&acao=formEditar3&id=<?= $livros->id ?>"><button>Editar</button></a>
                    <a href="./controller/deleta.php?acao=delLivro&id=<?= $livros->id ?>"><button onclick="return confirm('Confirmar Exclusao ?')">Excluir</button></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
