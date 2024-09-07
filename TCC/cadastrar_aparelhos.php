<?php
 session_start();
 if(!isset($_SESSION["EMAIL_LOGADO"])){
    header("location: login.html");
 }
include "Aparelhos.php";
require_once "Consumo.php";

$aparelho = new Aparelho();

$nomeAparelho = $_POST['nome_ap'];
$quantidade = $_POST['qtd'];
$consumo = $_POST['pot'];
$tempo_de_uso = $_POST['tempo'];
$unidade = $_POST['tipo_temp'];

if($unidade =="v2"){
   $tempo_de_uso = $tempo_de_uso/60;
}

$email_usuario = $_SESSION["EMAIL_LOGADO"];
$id_usuario = $_SESSION["ID_USUARIO_LOGADO"];

$aparelho->setNomeAparelho($nomeAparelho);
$aparelho->setQuantidade($quantidade);
$aparelho->setConsumo($consumo);
$aparelho->setTempoUso($tempo_de_uso);
$aparelho->setUsuario($id_usuario);
$aparelho->setEmailUsuario($email_usuario);

echo $aparelho->addAparelho();

?>