<?php

session_start();

if (isset($_SESSION['sessionstatus']) && $_SESSION['sessionstatus'] == 1) {
    header("location:main.php");
    exit;
}

require_once('include/config.php');

if (isset($_POST['login'])) {

    //var_dump($_POST);
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username LIKE '$username' AND password Like '$password'";
    //echo $sql;
    $user = $conn->query($sql);
    $count_user = mysqli_num_rows($user);

    if ($count_user == 1) {
        $user_data = $user->fetch_row();
        $_SESSION['username'] = $user_data['username'];
        $_SESSION['created_at'] = $user_data['created_at'];
        $_SESSION['sessionstatus'] = 1;

        session_start();

        header("location:main.php");
    } else {
        $login_error = "Acesso inválido!";
    }
    //echo $count_user;
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
    <link rel="stylesheet" href="css/painel.css">

    <title>Controlo de Painéis</title>
</head>

<body style="background-color: var(--gray);">
    <div class="container login">
        <div style="text-align: center; margin-bottom:20px;">
            <img src="img/icon-ra.svg" alt="" style="width: 65px;">
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h1>Controlo de Painéis</h1>
            <div class="form-group">
                <label for="username">Utilizador</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" required>
                <input type="hidden" class="form-control" id="login" value="1">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" name="login" id="login" value="1">
            </div>
            <?php
            if (isset($login_error)) {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro!</strong> <?php echo $login_error; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            }
            ?>
            <button type="submit" class="btn btn-danger">Entrar</button>
        </form>
    </div>



    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>