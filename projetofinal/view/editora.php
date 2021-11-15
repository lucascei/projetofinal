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
            if(filter_input(INPUT_GET, 'acao') == 'formEditar'){
                $id = filter_input(INPUT_GET, 'id');
                $linha = $E->selecionar($id);
        ?>
        <h3 style="margin-top: 80px">Edição de Editora</h3>    
        <form method="post" action="./controller/altera.php?acao=altEditora">
            Editora
            <input type="hidden" name="id" required value="<?=$linha->id?>">
            <input type="text" name="editora" required value="<?=$linha->editora?>">
            <input type="submit" value="Altera" onclick=" return confirm('Confirmar Edição ?')">
            
        </form>
        <a href="logado.php?link=1"><button>Sair da Edição</button></a>
        <?php }else { ?>
        
         <h3 style="margin-top: 80px;">Cadastro de Editora</h3>
        <form method="post" action="./controller/insere.php?acao=cadEditora">
            Editora
            <input type="text" name="editora" required>
            <input type="submit" value="Gravar">
        </form>
         
        <?php
        }
        ?>
        
        <table style="text-align: center; width: 40%; margin: 50px auto;">
            <tr style="background: #000; color:#fff">
                <td colspan="2">Lista de Editoras</td>
            </tr>
            <tr style="background: darkgray;">
                <td>Editoras</td>
                <td>Ações</td>
            </tr>
            <?php 
            
            //$E = new Editora;
            foreach($E->selecionarTudo() as $chave => $linha){ 
          
?>
            <tr style="background: navajowhite;">
                <td><?= $linha->editora ?></td>
                <td>
                    <a href="logado.php?link=1&acao=formEditar&id=<?= $linha->id ?>"><button>Editar</button></a>
                    <a href="./controller/deleta.php?acao=delEditora&id=<?= $linha->id ?>"><button onclick="return confirm('Confirmar Exclusao ?')">Excluir</button></a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>
