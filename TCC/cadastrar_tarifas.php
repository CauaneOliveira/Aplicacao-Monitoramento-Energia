<?php
 session_start();
 if(!isset($_SESSION["EMAIL_LOGADO"])){
    header("location: login.html");
 }
include "Consumo.php";

$consumo = new Consumo();

$valorTarifa = $_POST['valor_tarifa'];
$data = $_POST['data'];

$date = new DateTime($data);
$recebido = $date->getTimestamp();


$agora = date("Y/m/d");
$agora = new DateTime($agora );
$agoratimeStamp =  $agora->getTimestamp();

//echo "$recebido - $agoratimeStamp";
if($recebido> $agoratimeStamp){
   echo "<script>alert('Data Invalida!');location.href=\"home_tarifas.php\";</script>";
}else{
   $email_usuario = $_SESSION["EMAIL_LOGADO"];
   $id_usuario = $_SESSION["ID_USUARIO_LOGADO"];

   $consumo->setTarifa($valorTarifa);
   $consumo->setData($data);
   $consumo->setIdUsuario($id_usuario);
   $consumo->setEmailUsuario($email_usuario);

   echo $consumo->addTarifa();
}


?>