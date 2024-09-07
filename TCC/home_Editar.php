<?php
include "Aparelhos.php";
$aparelho = new Aparelho();
$idAparelho = $_GET['idAparelho'];
$result =  $aparelho->buscarAparelhoById($idAparelho);
//print_r($result);


while ($obj = $result->fetch_object()) {
    //print_r($obj);
    $idAparelho = $obj->ID_Aparelho;
    $qtd = $obj->Quantidade;
    $nome = $obj->Nome_Aparelho;
    $consumo = $obj->Consumo;
    $tempo = $obj->Tempo_de_Uso;
    //echo $nome;
}
//return;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link href="home_cadastrar.css" rel="stylesheet">
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

        function ap01() {
            document.querySelector("[name='nome_ap']").value = 'Televisão';
            document.querySelector("[name='pot']").value = 120;
        }

        function ap02() {
            document.querySelector("[name='nome_ap']").value = 'Ar Condicionado';
            document.querySelector("[name='pot']").value = 1400;
        }

        function ap03() {
            document.querySelector("[name='nome_ap']").value = 'Liquidificador';
            document.querySelector("[name='pot']").value = 200;
        }

        function ap04() {
            document.querySelector("[name='nome_ap']").value = 'Ventilador';
            document.querySelector("[name='pot']").value = 100;
        }
    </script>

    <!--LADO_ESQUERDO----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <div class="ed">
        <h1>Editar aparelhos</h1>
    </div>

    <form action="editar_aparelhos.php" method="POST">
        <input type="hidden" name="ID_Aparelho" value="<?php echo $idAparelho; ?>">

        <label id="nome_ap" for="nome_ap"><b>Nome do aparelho</b></label><br>
        <input type="text" id="nome_ap" name="nome_ap" required value="<?php echo $nome; ?>"><br>

        <label id="qtd" for="qtd"><b>Quantidade</b></label><br>
        <input type="number" id="qtd" name="qtd" min="1" required value="<?php echo $qtd; ?>"><br>

        <label id="tempo" for="tempo"><b>Tempo de uso</b></label><br>
        <input type="number" id="tempo" name="tempo" min="1" required value="<?php echo $tempo; ?>">
        <select name="tipo_temp">
            <option value="v1" id="horas">horas/dia</option>
            <option value="v2" id="minutos">minutos/dia</option>
        </select><br>

        <label id="pot" for="pot"><b>Potência</b></label><br>
        <input type="number" id="pot" name="pot" min="1" required value="<?php echo $consumo; ?>"><br>

        <button type="submit"><b>EDITAR</b></button>
    </form>

    <!--LADO_ESQUERDO_DOIS----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <div class="all">
        <div class="title_left">
            <h1>VAI UMA MÃOZINHA AI?</h1>
        </div>

        <a href="#" onclick="ap01();">
            <div class="elipse_v" id="v1"><img src="https://cdn-icons-png.flaticon.com/512/5650/5650519.png">
        </a>
        <p>TELEVISÃO</p>
    </div>
    <a href="#" onclick="ap02();">
        <div class="elipse_a" id="a1"><img src="https://cdn-icons-png.flaticon.com/512/5650/5650689.png">
    </a>
    <p>AR CONDICIONADO</p>
    </div>
    <a href="#" onclick="ap03()">
        <div class="elipse_v" id="v2"><img src="https://cdn-icons-png.flaticon.com/512/5650/5650773.png">
    </a>
    <p>LIQUIDIFICADOR</p>
    </div></a>
    <a href="#" onclick="ap04()">
        <div class="elipse_a" id="a2"><img src="https://cdn-icons-png.flaticon.com/512/5650/5650859.png">
    </a>
    <p>VENTILADOR</p>
    </div></a>
    </div>





</body>

</html>