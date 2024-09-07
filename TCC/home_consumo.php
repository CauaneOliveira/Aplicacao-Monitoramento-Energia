<?php
session_start();
include "Aparelhos.php";
require_once "Consumo.php";
if (!isset($_SESSION["ID_USUARIO_LOGADO"])) {
    header("Location: login.html");
}
$idUsuario = $_SESSION["ID_USUARIO_LOGADO"];


$aparelho = new Aparelho();
$aparelho->setUsuario($idUsuario);
$result = $aparelho->buscarAparelho();



$tabela = "<form action ='consumo_consultar.php'><table class='sem borda'>";

$tabela .= "<tr>";
$tabela .= "<td></td>";
// $tabela .="<td>ID</td>";
$tabela .= "<td>Quantidade</td>";
$tabela .= "<td>Nome</td>";
$tabela .= "<td>Consumo</td>";
$tabela .= "<td>Tempo de uso</td>";
$tabela .= "</tr>";

$contador = 0;


while ($obj = $result->fetch_object()) {

    $tabela .= "<tr class = 'tit'>";
    //aqui no value ele pega a ID do aparelho, logo se acontecer de apagar algum aparelho
    //ele vai pegar o ID exato mesmo que seja, por exemplo, ID 5 na 2° posição da tabela.
    $tabela .= "<td class='radius1'><input name='rdo_" . $obj->ID_Aparelho . "' type='checkbox' value='" . $obj->ID_Aparelho . "'> </td>";
    //$tabela .="<td>".$obj->ID_Aparelho."</td>";
    $tabela .= "<td>" . $obj->Quantidade . "</td>";
    $tabela .= "<td>" . $obj->Nome_Aparelho . "</td>";
    $tabela .= "<td>" . $obj->Consumo . " W</td>";
    $tabela .= "<td class='radius2'>" . $obj->Tempo_de_Uso . " Horas</td>";
    $tabela .= "</tr>";


    $contador = 1;
}


if ($contador == 0) {

    $tabela .= "</table></form>";


    $tabela .= "<form action ='home_cadastrar.php'><table class='sem borda'>";


    $tabela .= "<tr>";
    $tabela .= "<td>";
    $tabela .= "<p class='aviso'>AVISO: NÃO existem aparelhos cadastrados.</p>";
    $tabela .= "</td>";
    $tabela .= "</tr>";


    $tabela .= "</table><input type='submit' value='Cadastrar'></form>";

} else if ($contador == 1) {

    $tabela .= "</table><input type='submit' value='Calcular'></form>";
}




?>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap');


    table {
        position: relative;
        font-family: 'Montserrat';
        background-color: none;
        width: 100%;
        height: 20px;
        margin-left: 200px;
        margin-top: 30%;
    }

    table td {
        padding-left: 20px;
        text-align: center;

    }

    form input[type="submit"] {
        position: relative;
        margin-top: 50px;
        left: 200px;
        width: 265px;
        height: 57px;
        border: 2px solid #000000;
        border-radius: 50px;
        font-family: 'Montserrat';
        font-size: 20px;
        cursor: pointer;
    }

    .radius1 {
        border-radius: 30px 0px 0px 30px;

    }

    .radius2 {
        border-radius: 0px 30px 30px 0px;

    }

    .tit {
        border: 10px;
        background-color: #EBEBEB;
        width: 925px;
        height: 73px;
    }

    .popup {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 300px;
        height: 180px;
        padding: 15px;
        border: solid 1px #4c4d4f;
        background: #f5812a;
        display: none;
    }

    .aviso {
        font-size: 24px;
        margin-top: 20px;
        font-weight: bold;
    }
</style>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link href="home_consumo.css" rel="stylesheet">
</head>

<body>
    <!--MENU----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="navigation">
        <div class="menu_toggle"></div>
        <div class="profile">
            <div class="imgBx">
                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png">
            </div>
        </div>
        <ul class="menu">
            <li>
                <a href="home_perfil.php">
                    <span class="icon"><img src="https://cdn-icons-png.flaticon.com/512/5619/5619060.png"></span>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="home_aparelhos.php">
                    <span class="icon"><img src="https://cdn-icons-png.flaticon.com/512/7411/7411230.png"></span>
                    <span class="text">Aparelhos</span>
                </a>
            </li>
            <li>
                <a href="home_cadastrar.php">
                    <span class="icon"><img src="https://cdn-icons-png.flaticon.com/512/5553/5553518.png"></span>
                    <span class="text">Cadastrar</span>
                </a>
            </li>
            <li>
                <a href="home_tarifas.php">
                    <span class="icon"><img src="https://cdn-icons-png.flaticon.com/512/3345/3345913.png"></span>
                    <span class="text">Tarifas</span>
                </a>
            </li>
            <li>
                <a href="home_consumo.php">
                    <span class="icon"><img src="https://cdn-icons-png.flaticon.com/512/7404/7404405.png"></span>
                    <span class="text">Resultados</span>
                </a>
            </li>
            <div class="logout">
                <a href="logout.php">
                    <span class="icon"><img src="https://cdn-icons-png.flaticon.com/512/1828/1828404.png"></span>
                    <span class="text">Logout</span>
                </a>
            </div>
        </ul>
    </div>

    <script>
        const menu_toggle = document.querySelector('.menu_toggle');
        const navigation = document.querySelector('.navigation');

        menu_toggle.onclick = function() {
            navigation.classList.toggle('active')
        }

        function selecionartudo() {
            let inputs = [...document.getElementsByTagName("input")].filter(item => item.type == "checkbox");

            for (let i = 0; i < inputs.length; i++) {
                inputs[i].checked = true;
            }
        }
    </script>


    <!--LADO_ESQUERDO----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <div class="selectalldiv">
        <button type="button" class="selectallbutton" onclick="selecionartudo()">Marcar todos</button>
    </div>

    <?php echo $tabela; ?>



    <script>
        ajax_Buscar_consumo();

        function ajax_Buscar_consumo() {

            const ajax = new XMLHttpRequest();

            ajax.onload = function() {
                var respostaPHP = this.responseText;
                document.getElementById("span_Consumo").innerHTML = respostaPHP + " kWh";
            }

            ajax.open("GET", "consumo_consultar.php");
            ajax.send();

        }
    </script>

    <!--POPUP----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <!--
<script type="text/javascript">
      function abrir(){
        document.getElementById('popup').style.display = 'block';
      }
      function fechar(){
          document.getElementById('popup').style.display = 'none';
      }
    </script>


      <div id="popup" class="popup">
        <p>O valor total do consumo foi de:</p>
        <a href="javascript: fechar();">Fechar</a>
      </div>

      <a href="Javascript: abrir();">Abrir Pop-Up</a>-->