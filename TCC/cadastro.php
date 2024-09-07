<?php
 
include "Usuario.php";
 
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
 
$usuario = new Usuario();

$usuario->setNome($nome);
$usuario->setSobrenome($sobrenome);
$usuario->setEmail($email);
$usuario->setSenha($senha);

echo $usuario->Cadastrar();
 
?>