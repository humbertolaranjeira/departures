<?php
require_once('include/config.php');
require_once('include/auxiliar.php');

// getDayOffWeek
$day_of_week = getDayOffWeek();
// interval
$interval = getDateRange();

//echo $interval['min'] . " " . $interval['max'] . "<br>";

$sql = "SELECT * FROM horarios WHERE dia LIKE '$day_of_week' AND hora BETWEEN '$interval[min]' and '$interval[max]' ORDER BY hora ASC limit 0,8";
//$sql = "SELECT * FROM horarios WHERE dia LIKE '$day_of_week' ORDER BY hora ASC limit 0,8";
//echo $sql;
$horarios = $conn->query($sql);
$count_horarios = mysqli_num_rows($horarios);

if ($count_horarios == 0) {
    echo "<h4 style='width: 95%;margin: 100px auto; color:#333; text-align: center; text-transform: uppercase; background-color: lightcyan; padding: 20px;'>Não existem partidas previstas nos próximos 20 minutos.</h4>";
} else {
    $i = 2;
    foreach ($horarios as $horario) :
        if ($horario['servico'] == "NOR") {
            $bgColor = "background-color: lightskyblue;";
            $logo_src = "img/logo-ra.png";
        }
        if ($horario['servico'] == "EXP") {
            $bgColor = "background-color: lightcyan;";
            $logo_src = "img/logo-re.png";
        }
?>
        <div class="horario" style="<?php echo $bgColor; ?>">
            <div class="servico"><img src="<?php echo $logo_src ?>" /></div>
            <div class="destino"><?php echo $horario['destino'] ?></div>
            <div class="hora">
                <?php
                $hora = new DateTime($horario['hora']);
                echo date_format($hora, 'H:i');
                ?>
            </div>
            <div class="linha"><?php echo $horario['linha'] ?></div>
        </div>
<?php
        $i++;
    endforeach;
}
?>