<?php
  
  $conn = new mysqli("localhost", "root", "", "market");
  $list = mysqli_query($conn, 'select cadprod.idFor, cadprod.idProd, cadprod.NomeProd, CadFor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Custo, cadprod.Preco, cadprod.total FROM CadFor INNER JOIN CadProd ON CadFor.idfor = CadProd.idfor WHERE CadProd.idProd = cadprod.idProd ORDER BY cadprod.idProd ASC;');
  $errorMessage = array();
  if($nivel=='usuario'){
    while($campo=mysqli_fetch_array($list)){
      echo "<tr>";
      echo "<td>". $campo["NomeProd"]."</td>";
      echo "<td>". $campo["NomeFor"] ."</td>";
      echo "<td>". $campo["DesProd"] ."</td>";
      echo "<td>". $campo["ContProd"] ."</td>";
      echo "<td>". $campo["CodBar"] ."</td>";
      echo "<td>$ ". number_format($campo["Preco"],2) ."</td>";
      echo "<tr/>";
    }
  }
  $totalc = 0;
  $total = 0;
  
  if($nivel=='admin'){
    while($campo=mysqli_fetch_array($list)){
      echo "<tr>";
      echo "<td><a href='../../_HTML/_editValor/editProd.php?param=". $campo["idProd"]."'>". $campo["NomeProd"]."</a></td>";
      echo "<td><a href='../../_HTML/_editValor/edit.php?param=". $campo["idFor"]."'>". $campo["NomeFor"] ."</a></td>";
      echo "<td>". $campo["DesProd"] ."</td>";
      echo "<td>". $campo["ContProd"] ."</td>";
      echo "<td>". $campo["CodBar"] ."</td>";
      echo "<td>$ ". number_format($campo["Custo"],2) ."</td>";
      echo "<td>$ ". number_format($campo["Preco"],2) ."</td>";
      echo "<td>$ ". number_format($campo["total"],2) ."</td>";
      echo "<tr/>";
      $total+= $campo["total"]; 
      $totalc += $campo["Custo"];
      if($campo["ContProd"] < 10){
        $errorMessage[] = 'Faltante: '.$campo['NomeProd'];
      }
      
    }
    echo "<tr>";
    echo "<td colspan='5'></td>";
    echo "<td>$ ".number_format($totalc,2)."</td>";
    echo "<td colspan='1'></td>";
    echo "<td>$ ".number_format($total,2)."</td>";
    echo "<tr>";
    foreach($errorMessage as $key => $value){
      echo "<div style='color: red; font-weight: bold;'>$value</div>";
    }
  }
  
?>
