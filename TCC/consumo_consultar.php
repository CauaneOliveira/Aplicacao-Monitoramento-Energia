<?php

include "Consumo.php";
session_start();

$id_usuario = $_SESSION["ID_USUARIO_LOGADO"];
$consumo = new Consumo();

//print_r($_GET);

$sintaxe = "select ROUND(sum(Quantidade*consumo*tempo_de_uso*30/1000),2) as consumo from aparelhos where";
$contador = 0;

if (sizeof($_GET) == 0) {
    echo "<script>alert('Selecione algum aparelho!');location.href=\"home_consumo.php\";</script>";
    //header("Location: home_consumo.php");
}

foreach ($_GET as $value) {
    //echo "$value <br>";

    $contador = $contador + 1;
    if ($contador == 1) {
        $sintaxe .= " ID_Aparelho = '$value'";
    } elseif ($contador > 1) {
        $sintaxe .= " or ID_Aparelho = '$value'";
    }
}

//echo $sintaxe;
//$sintaxe .= ";";
$tarifa = $consumo->buscarTarifa($id_usuario);

if (empty($tarifa)) {

    echo"<script>alert('Tarifa não inserida!');location.href=\"home_tarifas.php\";</script>";

}else{

    $result = $consumo->calculoConsumo($id_usuario, $sintaxe);
}




//echo $sintaxe;
//select sum(Quantidade*consumo*tempo_de_uso*30/1000) from aparelhos where id_aparelho = 1 or id_aparelho = 2;
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link href="resultados.css" rel="stylesheet">
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

    <div class="title">
        <h1>Resultados</h1>
    </div>

    <div class='tabela'>
        <table>
            <tr>
                <td>
                    <br>
                    <p class="corzinha">Consumo Total</p>
                    <div class="resultado">
                        <?php
                        echo "<div>";
                        while ($obj = $result->fetch_object()) {
                            echo "<br> <div class=\"consumo\"> <p>$obj->consumo kWh</p> </div>";
                            $multiplicacao = round(($obj->consumo) * $tarifa, 2);
                        } ?>
                    </div>
                </td>
                <td>
                    <br>
                    <p class="corzinha">Tarifa</p>
                    <div class="resultado">
                        <?php
                        echo "<br> <div> <p>R$ $multiplicacao</p> </div>";
                        echo "</div>";
                        ?>
                    </div>
                </td>
            </tr>
        </table>

        <div class="voltar">
            <button onclick="window.history.back()"><b>VOLTAR</b></button>
        </div>

    </div>




</body>

</html>