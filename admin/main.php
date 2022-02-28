<?php

session_start();

if (!isset($_SESSION['sessionstatus'])) {
    header("location:login.php");
    exit;
}

require_once('include/config.php');

if (!isset($_REQUEST['page'])) {
    $page = "home";
}
else{
    $page = $_REQUEST['page'];
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/painel.css">

    <title>Gestão de Painéis</title>
</head>

<body>
    <div class="nav-container">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="?page=home">
                    <img src="img/icon-ra.svg" width="30" height="30" class="d-inline-block align-top" alt="Logo Rodoviária do Alentejo, SA" loading="lazy">
                    Gestão de Paineis
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Horários
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="?page=horarios&day=sunday">Domingo</a>
                                <a class="dropdown-item" href="?page=horarios&day=monday">Segunda-feira</a>
                                <a class="dropdown-item" href="?page=horarios&day=tuesday">Terça-feira</a>
                                <a class="dropdown-item" href="?page=horarios&day=wednesday">Quarta-feira</a>
                                <a class="dropdown-item" href="?page=horarios&day=thursday">Quinta-feira</a>
                                <a class="dropdown-item" href="?page=horarios&day=friday">Sexta-feira</a>
                                <a class="dropdown-item" href="?page=horarios&day=saturday">Sábado</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Configurações</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-ra-buttons">
                        <li class="nav-item">
                            <a href="http://192.168.1.73/ra/paineis/v3/" target="_blank"><button type="button" class="btn btn-outline-primary my-2 my-sm-0"><i class="fa fa-eye" aria-hidden="true"></i> Ver Painel</button></a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php"><button type="button" class="btn btn-outline-danger my-2 my-sm-0"><i class="fa fa-sign-out" aria-hidden="true"></i> Sair</button></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="main-contents" style="margin-bottom: 50px;">
        <div class="container">
            <?php
                include $page .".php";
            ?> 
        </div>
    </div>
    <footer>
        <div class="container">
            <p class="text-muted">Gestão de paineis - Rodoviária do Alentejo, SA @2020</p>
        </div>
    </footer>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>