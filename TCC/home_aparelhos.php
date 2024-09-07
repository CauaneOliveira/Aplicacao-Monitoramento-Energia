<?php
session_start();
include "Aparelhos.php";
require_once "Consumo.php";
$idUsuario = $_SESSION["ID_USUARIO_LOGADO"];

$aparelho = new Aparelho();
$aparelho->setUsuario($idUsuario);
$result = $aparelho->buscarAparelho();


$tabela = "<table class='sem borda'>";


$contador = 0;

$tabela .= "<tr>";
$tabela .= "<td>Quantidade</td>";
$tabela .= "<td>Nome</td>";
$tabela .= "<td>Consumo</td>";
$tabela .= "<td>Tempo de uso</td>";
$tabela .= "</tr>";


while ($obj = $result->fetch_object()) {


    $idAparelho = $obj->ID_Aparelho;
    $tabela .= "<tr class = 'tit'>";
    $tabela .= "<td class='radius1'>" . $obj->Quantidade . "</td>";
    $tabela .= "<td>" . $obj->Nome_Aparelho . "</td>";
    $tabela .= "<td>" . $obj->Consumo . " W</td>";
    $tabela .= "<td>" . $obj->Tempo_de_Uso . " Horas</td>";
    $tabela .= "<td class='btn1'> <a href='home_Editar.php?idAparelho=$idAparelho'><img src='https://cdn-icons-png.flaticon.com/512/505/505210.png' id='lapis'></a></td>";
    $tabela .= "<td class='radius2'><button onclick='excluir($idAparelho)'><img src='https://cdn-icons-png.flaticon.com/512/2496/2496740.png' id='lixeira'></button> </td>";
    $tabela .= "</tr>";


    $contador = 1;
}

if ($contador == 0) {

    $tabela .= "<tr>";
    $tabela .= "<p class='aviso'>AVISO: NÃO existem aparelhos cadastrados.</p>";
    $tabela .= "</tr>";
}


$tabela .= "</table>";

//print_r($result);
//$tabela ="<table border='1'>";




?>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap');


    table {
        position: absolute;
        font-family: 'Montserrat';
        background-color: none;
        width: 800px;
        height: 20px;
        left: 504px;
        margin-top: 15%;

    }

    table td {
        padding-left: 20px;
        text-align: center;

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

    #lapis {
        width: 40%;
    }

    #lixeira {
        width: 40%;
        cursor: pointer;
    }

    .radius2 button {
        border: none;
        background-color: #EBEBEB;
        width: 80px;
    }

    .btn1 {
        width: 80px;
    }

    .aviso {
        margin-top: 20px;
        font-weight: bold;
    }
</style>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aparelhos</title>
    <link href="home_aparelhos.css" rel="stylesheet">
    <script>
        function excluir(idAparelho) {
            var r = confirm('Deseja realmente excluir?');
            if (r == true) {

                window.location.href = "excluir_aparelhos.php?idAparelho=" + idAparelho;

            }
        }
    </script>
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
    </script>

    <!--LADO_ESQUERDO----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


    <h1 class="vermelho">MEUS&nbsp</h1>
    <h1 class="amarelo">APARELHOS</h1>

    <?php echo $tabela; ?>

    <div class="texto">
        <h2>Cadastro de dispositivos</h2>
        <a href="home_cadastrar.php">Não encontrou na lista um determinado aparelho? Clique aqui para realizar o cadastro.</a>
    </div>


</body>

</html>