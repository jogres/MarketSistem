<?php
  
  $conn = new mysqli("localhost", "root", "", "market");
  $list = mysqli_query($conn, 'select cadprod.idFor, cadprod.idProd,cadprod.NomeProd, CadFor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Preco, cadprod.total FROM CadFor INNER JOIN CadProd ON CadFor.idfor = CadProd.idfor WHERE CadProd.idProd = cadprod.idProd;');
  
  if($nivel=='usuario'){
    while($campo=mysqli_fetch_array($list)){
      echo "<tr>";
      echo "<td>". $campo["NomeProd"]."</td>";
      echo "<td>". $campo["NomeFor"] ."</td>";
      echo "<td>". $campo["DesProd"] ."</td>";
      echo "<td>". $campo["ContProd"] ."</td>";
      echo "<td>". $campo["CodBar"] ."</td>";
      echo "<td>". $campo["Preco"] ."</td>";
      echo "<tr/>";
    }
  }
  $total = 0;
  if($nivel=='admin'){
    while($campo=mysqli_fetch_array($list)){
      echo "<tr>";
      echo "<td><a href='../../_HTML/_editValor/editProd.php?param=". $campo["idProd"]."'>". $campo["NomeProd"]."</a></td>";
      echo "<td><a href='../../_HTML/_editValor/edit.php?param=". $campo["idFor"]."'>". $campo["NomeFor"] ."</a></td>";
      echo "<td>". $campo["DesProd"] ."</td>";
      echo "<td>". $campo["ContProd"] ."</td>";
      echo "<td>". $campo["CodBar"] ."</td>";
      echo "<td>". $campo["Preco"] ."</td>";
      echo "<td>". $campo["total"] ."</td>";
      echo "<tr/>";
      $total+= $campo["total"]; 
    }
    echo "<tr>";
  
    echo "<td colspan='7'>".$total."</td>";
    echo "<tr>";
  }
  
?>