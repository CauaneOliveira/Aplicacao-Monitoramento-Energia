<?php
    session_start();
    
    include "Usuario.php";
 
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $usuario = new Usuario();
    
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
     
    if($usuario->fazerLogin()){
        
        $_SESSION["EMAIL_LOGADO"] = $usuario->getEmail();
        $_SESSION["ID_USUARIO_LOGADO"]= $usuario->getIdUsuario();
        
        //$_SESSION["EMAIL_LOGADO"] = $usuario->getEmail() ;
        header("location: home_perfil.php");
    }else{
        echo "<script> alert('E-mail ou Senha incorretos, tente novamente.'); location.href=\"login.html\"; </script>";
    }

?>