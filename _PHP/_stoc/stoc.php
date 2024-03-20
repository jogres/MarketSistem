<?php

  $conn = new mysqli("localhost", "root", "", "market");
  $list = mysqli_query($conn, 'select cadprod.NomeProd, CadFor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Preco FROM CadFor INNER JOIN CadProd ON CadFor.idfor = CadProd.idfor WHERE CadProd.idProd = cadprod.idProd;');

  while($campo=mysqli_fetch_array($list)){
    echo "<tr>";
    echo "<td>". $campo["NomeProd"] ."</td>";
    echo "<td>". $campo["NomeFor"] ."</td>";
    echo "<td>". $campo["DesProd"] ."</td>";
    echo "<td>". $campo["ContProd"] ."</td>";
    echo "<td>". $campo["CodBar"] ."</td>";
    echo "<td>". $campo["Preco"] ."</td>";
    echo "<tr/>";
  }

?>