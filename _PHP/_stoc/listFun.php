<?php
  
  $conn = new mysqli("localhost", "root", "", "market");
  $list = mysqli_query($conn, 'SELECT idFun, NomeFun, Dni, EndFun, NumFun, EmailFun, CredAces, CargoFun FROM cadfun;');
  
  
  if($nivel=='admin'){
    while($campo=mysqli_fetch_array($list)){
      echo "<tr>";
      echo "<td><a href='../../_HTML/_editValor/editFun.php?param=". $campo["idFun"]."'>". $campo["NomeFun"]."</a></td>";
      echo "<td>". $campo["Dni"]."</td>";
      echo "<td>". $campo["EndFun"]."</td>";
      echo "<td>". $campo["NumFun"]."</td>";
      echo "<td>". $campo["EmailFun"]."</td>";
      echo "<td>". $campo["CredAces"]."</td>";
      echo "<td>". $campo["CargoFun"]."</td>";
      echo "<tr/>";
      
    }
   
  }
  
?>