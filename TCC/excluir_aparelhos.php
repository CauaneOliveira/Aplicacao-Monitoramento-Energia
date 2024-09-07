<?php
include "Aparelhos.php";
session_start();

$id_usuario = $_SESSION["ID_USUARIO_LOGADO"];
$aparelho = new Aparelho();

$idAparelho = $_GET["idAparelho"];
$aparelho->setIdApBusca($idAparelho);

echo $aparelho->excluirAparelho();

?>