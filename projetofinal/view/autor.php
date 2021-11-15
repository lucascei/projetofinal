<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $E = new Editora;
            $A = new Autor;
            if(filter_input(INPUT_GET, 'acao') == 'formEditar2'){
                $id = filter_input(INPUT_GET, 'id');
                $autor = $A->Selecionar($id);
        ?>
        <h3 style="margin-top: 80px">Editores de Autores</h3>
        <form method="post" action="./controller/altera.php?acao=altAutor">
            Autor
            <input type="hidden" name="id" required value="<?=$autor->id?>">
            <input type="text" name="nome" required value="<?=$autor->nome?>">
            <input type="text" name="sobrenome" required value="<?=$autor->sobrenome?>">
            <select name="id_editora" >
                
               <?php 
                    foreach($E->selecionarTudo() as $chave => $editoras){
                        if($autor->id_editora == $editoras->id){
                ?>
                <option selected value="<?=$editoras->id?>"><?=$editoras->editora?></option>
                    <?php
                        }else{
                    ?>
                    }
                        <option value="<?=$editoras->id?>"><?=$editoras->editora?></option>
                 
                <?php 
                        
                        }
                   
                        }
                ?>
            </select>
            <input type="submit" value="Altera" onclick=" return confirm('Confirmar Edicao ?')">
            
        </form>
        <p>
        <a href="logado.php?link=2"><button>Sair da Edicao</button></a>
        </p>
        <?php }else { ?>
                
                
        <h3 style="margin-top: 80px">Cadastro de Autores</h3>
        <form method="post" action="./controller/insere.php?acao=cadAutor">
            Autor
            <input type="text" name="nome" required placeholder="Nome:">
            <input type="text" name="sobrenome" required placeholder="Sobrenome:">
<!--            para colocar a opção obrigatoria utiliza-se o atributo required na tag html select-->
            <select name="id_editora" required>
                <?php
                    $E = new Editora;
                    $A = new Autor;
                    
                    foreach ($E->selecionarTudo() as $chave => $editoras){
                ?>
                    
                    <option value="<?=$editoras->id?>"><?=$editoras->editora?></option>
                <?php } ?>
                
            </select>
            <input type="submit" value="Gravar">
        </form>
        
        
        <?php
        }
        ?>
        <table style="text-align: center; width: 50%; margin: 50px auto;">
            <tr style="background: #000; color:#fff">
                <td colspan="4">Lista de Autores</td>
            </tr>
            <tr style="background: darkgray;">
                <td>Autores</td>
                <td>Sobrenome</td>
                <td>Editoras</td>
                <td>AÃ§Ãµes</td>
            </tr>
            <?php 
            
            
            foreach($A->selecionarTudo() as $chave => $autores){ 
          
?>
            <tr style="background: navajowhite;">
                <td><?= $autores->nome ?></td>
                <td><?= $autores->sobrenome ?></td>
                <td>
                    <?php
                    //verifica se existe editora
                    foreach($E->selecionarTudo() as $chave => $editora){
                        if($autores->id_editora == $editora->id){
                            echo $editora->editora;
                        } 
                        
                    }
                    //verifica se existe editora se nao existir imprime --
                    if(empty($autores->id_editora)){
                            echo '---';
                        }
                    ?>
                </td>
                <td>
                    <a href="logado.php?link=2&acao=formEditar2&id=<?= $autores->id ?>"><button>Editar</button></a>
                    <a href="./controller/deleta.php?acao=delAtor&id=<?= $autores->id ?>"><button onclick="return confirm('Confirmar Exclusao ?')">Excluir</button></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
