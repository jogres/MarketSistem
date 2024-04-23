<?php
  
  $conn = new mysqli("localhost", "root", "", "market");
  $list = mysqli_query($conn, 'SELECT * FROM cadfor;');
  
  
  if($nivel=='admin'){
    while($campo=mysqli_fetch_array($list)){
      echo "<tr>";
      echo "<td><a href='../../_HTML/_editValor/editFor.php?param=". $campo["idFor"]."'>". $campo["NomeFor"]."</a></td>";
      echo "<td>". $campo["Cuit"]."</td>";
      echo "<td>". $campo["NumFor"]."</td>";
      echo "<td>". $campo["EmailFor"]."</td>";
      echo "<tr/>";
      
    }
   
  }
  
?>