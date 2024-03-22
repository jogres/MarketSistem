<?php
  $param = $_GET['param'];
  $conn = new mysqli("localhost", "root", "", "market");
  $list = mysqli_query($conn, "select cadprod.idFor, cadprod.NomeProd, cadfor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Preco FROM cadfor INNER JOIN cadprod ON cadfor.idfor = CadProd.idfor WHERE CadProd.idFor = '$param'");
  

  while($campo=mysqli_fetch_array($list)){
    echo "<tr>";
    echo "<td>". $campo["idFor"], $campo["NomeProd"]."</td>";
    echo "<td>". $campo["NomeFor"] ."</td>";
    echo "<td>". $campo["DesProd"] ."</td>";
    echo "<td>". $campo["ContProd"] ."</td>";
    echo "<td>". $campo["CodBar"] ."</td>";
    echo "<td>". $campo["Preco"] ."</td>";
    echo "<tr/>";
  }
  
  
?>