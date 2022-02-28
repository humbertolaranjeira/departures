<?php

if (!isset($_SESSION['sessionstatus'])) {
    header("location:login.php");
    exit;
}

if (isset($_REQUEST['day'])) {
    switch ($_REQUEST['day']) {
        case 'sunday':
            $day_of_week = "Domingo";
            break;
        case 'monday':
            $day_of_week = "Segunda-Feira";
            break;
        case 'tuesday':
            $day_of_week = "Terça-Feira";
            break;
        case 'wednesday':
            $day_of_week = "Quarta-Feira";
            break;
        case 'thursday':
            $day_of_week = "Quinta-Feira";
            break;
        case 'friday':
            $day_of_week = "Sexta-Feira";
            break;
        case 'saturday':
            $day_of_week = "Sábado";
            break;
        default:
            $day_of_week = "";
            break;
    }
}

if (isset($_REQUEST['remove'])) {
    $sql = "DELETE FROM horarios WHERE id = $_REQUEST[remove]";
    if ($conn->query($sql) === TRUE) {
        $deleted = "success";
    } else {
        $deleted = "error";
    }

    //$conn->close();
}
?>

<div class="d-flex bd-highlight ra-breadcrumb">
    <div class="p-2 flex-grow-1 bd-highlight"><a href="?page=home">Gestão de painéis</a> / Horários / <?php echo $day_of_week; ?></div>
    <div class="p-2 bd-highlight">
        <a href="?page=horarios&day=<?php echo $_REQUEST['day']; ?>"><button type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Listar</button></a>
    </div>
    <div class="p-2 bd-highlight">
        <a href="?page=inserirHorarios&day=<?php echo $_REQUEST['day']; ?>"><button type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-plus-square" aria-hidden="true"></i> Inserir</button></a>
    </div>
</div>
<?php
if (isset($deleted)) {
    if ($deleted == "success") {
?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> O registo foi removido com sucesso.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
    } else {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erro!</strong> O registo não foi removido, por favor tente de novo.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
}
?>

<?php
$sql = "SELECT * FROM horarios WHERE dia LIKE '$day_of_week' ORDER BY hora";
$horarios = $conn->query($sql);
$count_horarios = mysqli_num_rows($horarios);
if ($count_horarios == 0) {
    echo "<h4 style='width: 95%;margin: 100px auto; color:#333; text-align: center; text-transform: uppercase; background-color: lightcyan; padding: 20px;'>Não existem horários.</h4>";
} else {
?>
    <div style="overflow-y: scroll; max-height:400px;">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Linha</th>
                    <th scope="col">Hora</th>
                    <th style="text-align:center;" scope="col">Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($horarios as $horario) :
                ?>

                    <tr>
                        <th scope="row"><?php echo $horario['id'] ?></th>
                        <td><?php echo $horario['servico'] ?></td>
                        <td><?php echo $horario['destino'] ?></td>
                        <td><?php echo $horario['linha'] ?></td>
                        <td>
                            <?php
                            $hora = new DateTime($horario['hora']);
                            echo date_format($hora, 'H:i');
                            ?>
                        </td>
                        <td style="text-align:center;"><a href="?page=horarios&remove=<?php echo $horario['id'] ?>&day=<?php echo $_REQUEST['day']; ?>" onclick="return confirm('Tem a certeza que quer remover este horário?');"><i class="fa fa-minus-square" style="color:red;"></i></a></td>
                    </tr>
            <?php
                endforeach;
            }
            ?>
            </tbody>
        </table>
    </div>