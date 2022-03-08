<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/fonts.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <title>Painel de Partidas</title>
</head>
<body>
    <div id="main">
        <header>
            <h1 style="width:30%; float:left;">Teste Partidas<small style="color: black;">[Departures]</small></h1>
            <h1 style="width:60%; float:right;" id="data-hora"></h1>
        </header>
        <section id="horarios">
            <div class="horario-header">
                <div class="servico">SERVIÇO<small>[Service]</small> </div>
                <div class="destino">DESTINO<small>[Destiny]</small> </div>
                <div class="hora">Hora<small>[Hour]</small> </div>
                <div class="linha">Linha<small>[Line]</small> </div>
            </div>
            <!-- Result of ajax query goes here -->
            <div id="result">

            </div>
            <!-- Result of ajax query goes here -->
        </section>
        <footer>
            <h2>www.rodalentejo.pt</h2>
            <img src="img/logo-ra-footer.jpg" alt="Rodoviária do Alentejo"/> 
        </footer>
    </div>
    <!-- Data para o header -->
    <script type="text/JavaScript">
			// Função para formatar 1 em 01
			const zeroFill = n => {
				return ('0' + n).slice(-2);
			}

			// Cria intervalo
			const interval = setInterval(() => {
				// Pega o horário atual
                const now = new Date();
                
                switch (now.getDay()) {
                    case 0:
                        $day_of_week = "Domingo";
                        break;
                    case 1:
                        $day_of_week = "Segunda-Feira";
                        break;
                    case 2:
                        $day_of_week = "Terça-Feira";
                        break;
                    case 3:
                        $day_of_week = "Quarta-Feira";
                        break;
                    case 4:
                        $day_of_week = "Quinta-Feira";
                        break;
                    case 5:
                        $day_of_week = "Sexta-Feira";
                        break;
                    case 6:
                        $day_of_week = "Sábado";
                        break;
                    default:
                        break;
                }

				// Formata a data conforme dd/mm/aaaa hh:ii:ss
				const dataHora = zeroFill(now.getUTCDate()) + '/' + zeroFill((now.getMonth() + 1)) + '/' + now.getFullYear() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

				// Exibe na tela usando a div#data-hora
				document.getElementById('data-hora').innerHTML = $day_of_week + ", " + dataHora;
			}, 1000);
        </script>
        <!-- Data para o header -->

        <!-- Reload #result every 5 seconds -->
        <script type="text/JavaScript">
            window.setInterval(function(){ 
                $('#result').load('horarios.php');
            }, 5000) /* time in milliseconds (ie 5 seconds)*/
        </script>
       <!-- Reload #result every 5 seconds -->
</body>
</html>