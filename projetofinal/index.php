<!DOCTYPE html>
<?php 
    session_start();
    function __autoload($Classe){
        include_once "model/$Classe.php";
    }
    
$L = new Login();
if (filter_input(INPUT_POST, 'ok')){
    $Login = filter_input(INPUT_POST, 'login');
    $Senha = filter_input(INPUT_POST, 'senha');
    
    $L->setLogin($Login);
    $L->setSenha($Senha);
    if($L->Logar()){
        header("Location:logado.php?link=1");
    }else{
        $msg = "<p style='color:red;'><script>alert('Erro ao Logar')</script></p>";
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - OO</title>
    </head>
    <body style="background: #ccc; text-align: center;">
        <h3 style="margin-top: 200px;">Login do Sistema</h3>
        
        <form method="post">
            Login
            <input type="text" name="login" required>
            senha
            <input type="password" name="senha" required>
            <input type="submit" value="Entrar" name="ok">
        </form>
       <?= (isset($msg)) ? $msg : ''?>
    </body>
</html>
