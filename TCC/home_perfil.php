<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="home_perfil.css" rel="stylesheet">
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
            <li>
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

        menu_toggle.onclick = function(){
            navigation.classList.toggle('active')
        }

        function getRandom() {
            return Math.floor(Math.random() * 4);
        }

        ajax_Frases();

        function ajax_Frases() {

            const ajax = new XMLHttpRequest();
            var num = getRandom();

            ajax.onload = function() {
                if (num == 0){    
                    document.getElementById("span_Frases").innerHTML = "Um aparelho de ar condicionado com uma potência de 1.580 Watts gasta 12 vezes mais energia do que um pequeno ventilador de mesa.";
                
                }else if (num == 1){
                    document.getElementById("span_Frases").innerHTML = "Você sabia que a lâmpada da sua residência consome cerca de 25% do valor da sua conta de energia?";

                }else if (num == 2){
                    document.getElementById("span_Frases").innerHTML = "Busque um aparelho adequado ao tamanho do cômodo. Um aparelho com alta capacidade para um espaço pequeno vai levar a um gasto desnecessário.";

                }else if (num == 3){
                    document.getElementById("span_Frases").innerHTML = "Dica: Mantenha a geladeira longe do Fogão, porque para compensar o calor transmitido pelo fogão ela gasta maior energia. Não abra a porta sem necessidade e verifique se o seu equipamento está com a vedação em dia.";

                }
            }
           
            ajax.open("GET", "#");
            ajax.send();

        }

    </script>

<!--LADO_ESQUERDO----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


<h1 class="vermelho">BEM-VINDO&nbsp</h1>
<h1 class="amarelo">DE VOLTA</h1>

<p>Sentimos sua falta, que bom te encontrar novamente :-)</p>

<div class="texto">
    <h2>Curiosidade</h2>
    <p><span id="span_Frases"></span></p>
</div>

<div class="onda">
    <img src="https://i.ibb.co/Lx6Zn6Y/Frame.png">
</div>


</body>
</html>