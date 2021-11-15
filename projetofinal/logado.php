  <meta charset="UTF-8">
<!DOCTYPE html>

<?php 
session_start();
function __autoload($Classe){
        include_once "model/$Classe.php";
    }
if(filter_input(INPUT_GET, 'logout') == 'ok'){
    Login::Deslogar();
}

if(isset($_SESSION['logado'])){
    //executa o mÃ©todo estÃ¡tico Deslogar() NomeClasse:NomeMetodo
    //verica se a sessao para logar no sistema, se não houver ele desloga 
    
?>

<html>
    <head>
      
        <title></title>
    </head>
    <body style="background: #ccc; text-align: center;">
   
            <?=  ucwords($_SESSION['login'])?>,bem Vindo(a) a Nosso Biblioteca
            <p>
                <a href="logado.php?logout=ok"><button onclick="return confirm('Deseja sair do sistema ?')">Sair</button></a>
            </p>
    
            <hr>
            <a href="logado.php?link=1"><button>Editora</button></a>
            <a href="logado.php?link=2"><button>Autor</button></a>
            <a href="logado.php?link=3"><button>Livro</button></a>
            <?php 
                $link = filter_input(INPUT_GET, 'link');
                $pag[1] = 'view/editora.php';
                $pag[2] = 'view/autor.php';
                $pag[3] = 'view/livro.php';
                
                if(file_exists($pag[$link])){
                    include_once $pag[$link];
                }else{
                    echo 'Pagina nao encontrada';
                }
            ?>
    </body>
</html>
<?php 
}else{
    echo "<script>alert('Sem Permição de Acesso');location='index.php'</script>";
}
?>