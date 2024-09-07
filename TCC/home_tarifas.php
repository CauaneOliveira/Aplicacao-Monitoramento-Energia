<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link href="home_tarifas.css" rel="stylesheet">
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
                <a href="login.html">
                    <span class="icon"><img src="https://cdn-icons-png.flaticon.com/512/1828/1828404.png"></span>
                    <span class="text">Logout</span>
                </a>
            </div>
        </ul>
    </div>

    <!--LADO_ESQUERDO----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <div class="title">
        <h1>Adicionar tarifa</h1>
    </div>

    <form action="cadastrar_tarifas.php" method="POST">
        <label id="valor_tarifa" for="valor_tarifa"><b>Valor da tarifa</b></label><br>
        <input type="number" id="valor_tarifa" name="valor_tarifa" pattern="[0-9]+([,\.][0-9]+)?" step="any" min="0" required><br>

        <label id="data" for="data"><b>Data</b></label><br>
        <input type="date" id="data" name="data" required><br>

        <button type="submit"><b>ADICIONAR</b></button>
    </form>


    <!--LADO_ESQUERDO_DOIS----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

    <script type="text/javascript">
        const menu_toggle = document.querySelector('.menu_toggle');
        const navigation = document.querySelector('.navigation');

        menu_toggle.onclick = function(){
            navigation.classList.toggle('active')
        }
        
        function abrir() {
            document.getElementById('popup').style.display = 'block';
        }

        function fechar() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>

    <div class="popup" id="popup">
        <p>O valor da tarifa muda de acordo com as regiões e situações dos reservatórios de água. Os itens mais comuns que variam os valores são as Bandeiras, podendo ser a Verde, Amarela, Vermelha ou Escassez Hídrica.</p>
        <a href="Javascript: fechar();">Fechar</a>
    </div>

    <div class="all">
        <a href="Javascript: abrir();">
            <div class="dica" id="dica"><img src="https://cdn-icons-png.flaticon.com/512/5726/5726775.png"></div>
        </a>
    </div>

</body>

</html>