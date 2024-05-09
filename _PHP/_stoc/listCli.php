<?php
  
  $conn = new mysqli("localhost", "root", "", "market");
  $list = mysqli_query($conn, 'SELECT * FROM cadcli;');
  
  
  if($nivel=='admin'){
    while($campo=mysqli_fetch_array($list)){
      echo "<tr>";
      echo "<td><a href='../../_HTML/_editValor/editCli.php?param=". $campo["idCli"]."'>". $campo["NomeCli"]."</a></td>";
      echo "<td>". $campo["Dni"]."</td>";
      echo "<td>". $campo["NumCli"]."</td>";
      echo "<tr/>";
      
    }
   
  }
  
?>