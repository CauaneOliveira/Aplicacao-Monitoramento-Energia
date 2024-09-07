<?php
include "Banco.php";

class Usuario
{
    private $id_usuario;
    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
 
    function __construct(){
        $this->banco = new Banco();
        $this->banco->conectar();
    }
    
    public function Cadastrar(){
        $sql = "";
        $nome = $this->getNome();
        $sobrenome = $this->getSobrenome();
        $email = $this->getEmail();
        $senha = $this->getSenha();
 
        $sql = "insert into Usuário (Nome, Sobrenome, Email, Senha) values ('$nome', '$sobrenome', '$email', '$senha')";
 
        $this->banco->executarSql($sql);
        header("location: cadastro_feito.html");
    }

    public function fazerLogin(){
        $email = $this->getEmail();
        $senha = $this->getSenha();
    
        $sql = "select count(*) as qtd,email,id_usuario from Usuário where email='$email' and senha='$senha';";
    
        $resultado = $this->banco->executarSql($sql);
    
        while($linha=mysqli_fetch_array($resultado)){
            $qtd = $linha['qtd'];
            $email = $linha['email'];
            $id = $linha['id_usuario'];

            $this->id_usuario =$id; 
            
            if($qtd>0){
                return true;
            }else{
                return false;
            }
        }
    
    }

    public function getIdUsuario(){
        return $this->id_usuario;
    }

    public function getNome(){
        return $this->nome;
    }
    
    public function getSobrenome(){
        return $this->sobrenome;
    }

    public function getEmail(){
        return $this->email;
    }
 
    public function getSenha(){
        return $this->senha;
    }

    public function setIdUsuario($novovalor){
        $this->id_usuario = $novovalor;
    }
    public function setNome($novovalor){
        $this->nome = $novovalor;
    }

    public function setSobrenome($novovalor){
        $this->sobrenome = $novovalor;
    }
 
    public function setEmail($novovalor){
        $this->email = $novovalor;
    }
 
    public function setSenha($novovalor){
        $this->senha = $novovalor;
    }


}

?>