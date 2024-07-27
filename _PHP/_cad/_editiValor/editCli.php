<?php 
  if(isset($_GET['param'])){
    $param = $_GET['param'];
  }
  $conn = new mysqli("localhost", "root", "", "market");
  $edit = mysqli_query($conn, "SELECT * FROM cadcli WHERE idCli = '$param';");
  
  while($campo=mysqli_fetch_array($edit)){
    echo"<p>
      <label for='NomeCli'>Nombre de la Empresa: </label>
      <input type='text' id='NomeCli' name='NomeCli' value='".$campo["NomeCli"]."'>
    </p>
    <p>
      <label for='Dni'>DNI: </label>
      <input type='text' id='Dni' name='Dni' value='".$campo["Dni"]."'>
    </p>
    <p>
      <label for='NumCli'>Número de la Empresa: </label>
      <input type='text' id='NumCli' name='NumCli' value='".$campo["NumCli"]."'>
    </p>
    ";
    echo"<input type='hidden' name='id' value='".$param."'>";
  }
?>
