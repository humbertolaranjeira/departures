<?php

if (!isset($_SESSION['sessionstatus'])) {
    header("location:login.php");
    exit;
}

if(isset($_REQUEST["horario"])){
    $horario_id = $_REQUEST["horario"];

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
if (isset($_POST['save'])) {
    if($_POST["linha"] == ""){
        $linha = "";
    }
    else{
        $linha = $_POST["linha"];
    }

    $sql = "UPDATE horarios SET servico = '$_POST[servico]' , destino =  '$_POST[destino]', linha =  '$linha', hora = '$_POST[hora]', dia =  '$_POST[dia]', periodo = $_POST[periodo] WHERE id = $_POST[horario_id]";

    if ($conn->query($sql) === TRUE) {
        $saved = "success";
    } else {
        $saved = "error";
    }

    //$conn->close();
}

?>
<div class="d-flex bd-highlight ra-breadcrumb">
    <div class="p-2 flex-grow-1 bd-highlight"><a href="?page=home">Gestão de paineis</a> / Editar Horários / <?php echo $day_of_week; ?></div>
    <div class="p-2 bd-highlight">
        <a href="?page=horarios&day=<?php echo $_REQUEST['day']; ?>"><button type="button" class="btn btn-outline-primary btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Listar</button></a>
    </div>
    <div class="p-2 bd-highlight">
        <a href="?page=inserirHorarios&day=<?php echo $_REQUEST['day']; ?>"><button type="button" class="btn btn-outline-success btn-sm"><i class="fa fa-plus-square" aria-hidden="true"></i> Inserir</button></a>
    </div>
</div>
<?php
        if(isset($saved)){
            if($saved == "success"){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sucesso!</strong> O registo foi gravado com sucesso.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            else{
                ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro!</strong> O registo não foi gravado, por favor tente de novo.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
        }
        ?>

        <?php
            $sql = "SELECT * FROM horarios WHERE id =" . $horario_id;
            $result = $conn->query($sql); 
            $horario = $result->fetch_array();
        ?>

<form action="?page=editarHorario&horario=<?php echo $horario_id; ?>&day=<?php echo $_REQUEST['day']; ?>" method="post" class="insertSchedule">
    <div class="container">
        <div class="row">
            <div class="col-sm input-form-horarios">
                <div class="form-group">
                    <label for="servico">Serviço</label>
                    <select class="form-control" id="servico" name="servico" required>
                        <option value="NOR" <?= ($horario["servico"] == "NOR" ? "selected" : "")?> >NOR</option>
                        <option value="EXP" <?= ($horario["servico"] == "EXP" ? "selected" : "")?>>EXP</option>
                    </select>
                </div>
            </div>
            <div class="col-sm input-form-horarios">
                <div class="form-group">
                    <label for="destino">Destino</label>
                    <input type="text" class="form-control" id="destino" name="destino" placeholder="Destino" value="<?=$horario["destino"]?>" required>
                </div>
            </div>
            <div class="col-sm input-form-horarios">
                <div class="form-group">
                    <label for="linha">Linha</label>
                    <input type="text" class="form-control" id="linha" name="linha" placeholder="Linha" value="<?=$horario["linha"]?>">
                </div>
            </div>
            <div class="col-sm input-form-horarios">
                <div class="form-group">
                    <label for="linha">Hora</label>
                    <input type="time" class="form-control" id="hora" name="hora" placeholder="Linha" value="<?=$horario["hora"]?>" required>
                    <input type="hidden" class="form-control" id="horario_id" name="horario_id" value="<?php echo $horario_id; ?>">
                    <input type="hidden" class="form-control" id="dia" name="dia" value="<?php echo $day_of_week; ?>">
                </div>
            </div>
            <div class="col-sm input-form-horarios">
                <div class="form-group">
                    <label for="periodo">Periodo</label>
                    <select class="form-control" id="periodo" name="periodo" required>
                    <?php
                        $sql = "SELECT * FROM periodos WHERE activo = 1 ORDER BY periodo_id";
                        $periodos = $conn->query($sql);
                        foreach($periodos as $periodo){
                    ?>
                        <option value="<?php echo $periodo['periodo_id'] ?>" <?=($horario["periodo"] == $periodo["periodo_id"]) ? "selected" : "" ?>><?php echo $periodo['abreviatura'] ?></option>
                    <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mb-2 float-right" name="save" value="save"><i class="fa fa-floppy-o" aria-hidden="true"></i> Gravar</button>
    </div>

</form>