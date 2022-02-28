<?php
if (!isset($_SESSION['sessionstatus'])) {
  header("location:login.php");
  exit;
}

// contar horários
// Domingo
$sql = "SELECT * FROM horarios WHERE dia LIKE 'Domingo'";
$sunday = $conn->query($sql);
$count_sunday = mysqli_num_rows($sunday);

// Monday
$sql = "SELECT * FROM horarios WHERE dia LIKE 'Segunda-feira'";
$monday = $conn->query($sql);
$count_monday = mysqli_num_rows($monday);

// Tuesday
$sql = "SELECT * FROM horarios WHERE dia LIKE 'Terça-feira'";
$tuesday = $conn->query($sql);
$count_tuesday = mysqli_num_rows($tuesday);

// Wednesday
$sql = "SELECT * FROM horarios WHERE dia LIKE 'Quarta-feira'";
$wednesday = $conn->query($sql);
$count_wednesday = mysqli_num_rows($wednesday);

// Thursday
$sql = "SELECT * FROM horarios WHERE dia LIKE 'Quinta-feira'";
$thursday = $conn->query($sql);
$count_thursday = mysqli_num_rows($thursday);

// Friday
$sql = "SELECT * FROM horarios WHERE dia LIKE 'Sexta-feira'";
$friday = $conn->query($sql);
$count_friday = mysqli_num_rows($friday);

// Saturday
$sql = "SELECT * FROM horarios WHERE dia LIKE 'Sábado'";
$saturday = $conn->query($sql);
$count_saturday = mysqli_num_rows($saturday);

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
  </ol>

  <div class="dashboard">
    <div class="dash-item">
      <h1>Domingo</h1>
      <p><?php echo "<strong>" . $count_sunday . "</strong>"; ?> Horários</p>
      <a href="?page=horarios&day=sunday">Consultar <i class="fa fa-arrow-right " aria-hidden="true"></i></a>
    </div>
    <div class="dash-item">
      <h1>Segunda-feira</h1>
      <p><?php echo "<strong>" . $count_monday . "</strong>"; ?> Horários</p>
      <a href="?page=horarios&day=monday">Consultar <i class="fa fa-arrow-right " aria-hidden="true"></i></a>
    </div>
    <div class="dash-item">
      <h1>Terça-feira</h1>
      <p><?php echo "<strong>" . $count_tuesday . "</strong>"; ?> Horários</p>
      <a href="?page=horarios&day=tuesday">Consultar <i class="fa fa-arrow-right " aria-hidden="true"></i></a>
    </div>
    <div class="dash-item">
      <h1>Quarta-feira</h1>
      <p><?php echo "<strong>" . $count_wednesday . "</strong>"; ?> Horários</p>
      <a href="?page=horarios&day=wednesday">Consultar <i class="fa fa-arrow-right " aria-hidden="true"></i></a>
    </div>
    <div class="dash-item">
      <h1>Quinta-feira</h1>
      <p><?php echo "<strong>" . $count_thursday . "</strong>"; ?> Horários</p>
      <a href="?page=horarios&day=thursday">Consultar <i class="fa fa-arrow-right " aria-hidden="true"></i></a>
    </div>
    <div class="dash-item">
      <h1>Sexta-feira</h1>
      <p><?php echo "<strong>" . $count_friday . "</strong>"; ?> Horários</p>
      <a href="?page=horarios&day=friday">Consultar <i class="fa fa-arrow-right " aria-hidden="true"></i></a>
    </div>
    <div class="dash-item">
      <h1>Sábado</h1>
      <p><?php echo "<strong>" . $count_saturday . "</strong>"; ?> Horários</p>
      <a href="?page=horarios&day=saturday">Consultar <i class="fa fa-arrow-right " aria-hidden="true"></i></a>
    </div>
  </div>
</nav>