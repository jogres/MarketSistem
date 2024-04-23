<?php 
  if(isset($_GET['param'])){
    $param = $_GET['param'];
  }
  $conn = new mysqli("localhost", "root", "", "market");
  $edit = mysqli_query($conn, "SELECT * FROM cadfor WHERE idFor = '$param';");
  
  while($campo=mysqli_fetch_array($edit)){
    echo"<p>
      <label for='NomeFor'>Nombre de la Empresa: </label>
      <input type='text' id='NomeFor' name='NomeFor' value='".$campo["NomeFor"]."'>
    </p>
    <p>
      <label for='Cuit'>CUIT de la empresa: </label>
      <input type='text' id='Cuit' name='Cuit' value='".$campo["Cuit"]."'>
    </p>
    <p>
      <label for='NumFor'>Número de la empresa: </label>
      <input type='text' id='NumFor' name='NumFor' value='".$campo["NumFor"]."'>
    </p>
    <p>
      <label for='EmailFor'>E-MAIL de la empresa: </label>
      <input type='text' id='EmailFor' name='EmailFor' value='".$campo["EmailFor"]."'>
    </p>";
    echo"<input type='hidden' name='id' value='".$param."'>";
  }
?>