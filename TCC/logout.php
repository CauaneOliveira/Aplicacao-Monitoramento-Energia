<?php 
session_start();
unset($_SESSION['ID_USUARIO_LOGADO']);
session_destroy();
header("Location: login.html");
?>