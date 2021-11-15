<?php

include_once 'DB.php';


class Login extends DB{
    private $Tabela = 'tb_login';
    private $Login;
    private $Senha;
    
    
    function getTabela() {
        return $this->Tabela;
    }

    function getLogin() {
        return $this->Login;
    }

    function getSenha() {
        return $this->Senha;
    }

    function setTabela($Tabela) {
        $this->Tabela = $Tabela;
    }

    function setLogin($Login) {
        $this->Login = $Login;
    }

    function setSenha($Senha) {
        $this->Senha = $Senha;
    }

        //fun��o LOGAR() utilizada para comfirma se existe o usuario no banco.
    public function Logar(){
       $sql = "SELECT * FROM $this->Tabela WHERE login = ? AND senha = ?";//cria a instrução de consulta
       //prepara na conexão a instrução
       $login = DB::preparaSQL($sql);
       //busca cheia por um valor Login
       $login->bindValue(1, $this->getLogin());
       //busca cheia por um valor senha
       $login->bindValue(2, $this->getSenha());
       //executa a instrução 
       $login->execute();
       //verifica se retornou e armazena no objeto $dados
       if($login->rowCount()){
           //retorna o registro e armazena no objeto $dados
           $dados = $login->fetch();
           //armazena o login na sessão logado recebe true
           $_SESSION['login']  = $dados->login;
           $_SESSION['logado'] = TRUE;
           return TRUE;
       }else{
           //se n�o retornou registro
           return FALSE;
       }
        
    }
    
    //m�todo est�tico Deslogar()
    public static function Deslogar(){
        //verifica se está logado na sessão
        if(isset($_SESSION['logado'])){
            //apaga a sessão
            unset($_SESSION['logado']);
            //destrói a sessão 
            session_destroy($_SESSION['logado']);
            //redireciona para a url
            header("Location:index.php");
        }
    }
}
            
            

