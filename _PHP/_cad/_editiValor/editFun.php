<?php 
  if(isset($_GET['param'])){
    $param = $_GET['param'];
  }
  $conn = new mysqli("localhost", "root", "", "market");
  $edit = mysqli_query($conn, "SELECT idFun, NomeFun, Dni, EndFun, NumFun, EmailFun, CredAces, CargoFun FROM cadfun WHERE idFun = '$param';");
  
  while($campo=mysqli_fetch_array($edit)){
    echo "<p>";
    echo"<label for='NomeFun'>Nombre: </label>";
    echo"<input type='text' name='NomeFun' id='NomeFun' value ='".$campo["NomeFun"]."'>";
    echo"</p>";
    echo"<p>";
    echo"<label for='Dni'> DNI: </label>";
    echo"<input type='text' name='Dni' id='Dni' value ='".$campo["Dni"]."'>";
    echo"</p>";
    echo"<p>";
    echo"<label for='EndFun'>Dirección: </label>";
    echo"<input type='text' name='EndFun' id='EndFun' value='".$campo["EndFun"]."'>";
    echo"</p>";
    echo"<p>";
    echo"<label for='NumFun'>Número del empleado: </label>";
    echo"<input type='text' name='NumFun' id='NumFun' value='".$campo["NumFun"]."'>";
    echo"</p>";
    echo"<p>";
    echo"<label for='EmailFun'>E-MAIL del empleado: </label>";
    echo"<input type='text' name='EmailFun' id='EmailFun' value='".$campo["EmailFun"]."'>";
    echo"</p>";
    echo"<p>";
    echo"<label for='CredAces'>Clave de acceso: </label>";
    echo"<input type='number' name='CredAces' id='CredAces' value='".$campo["CredAces"]."'>";
    echo"</p>";
    echo"<p>";
    echo"<label for='CargoFun'>Puesto: </label>";
    echo"<input type='text' name='CargoFun' id='CargoFun' value='".$campo["CargoFun"]."'>";
    echo"</p>";
    echo"<input type='hidden' name='id' value='".$param."'>";
  }
?>