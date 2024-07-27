<?php
  $conn = new mysqli("localhost", "root", "", "market");
  $total=0;
  if (isset($_GET['ano'],$_GET['mes'])) {
    $ano = $_GET['ano'];
    $mes = $_GET['mes'];
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    echo"<h1>".$meses[$mes-1].", ".$ano."</h1>";
    
    $list = mysqli_query($conn, "SELECT YEAR(DataV) as ano, MONTH(DataV) as mes, DataV, ProdV, CredAcesV, Nome, NomeFun, Total, Troco
    FROM venda WHERE YEAR(DataV) = '$ano' AND MONTH(DataV) = '$mes'
    ORDER BY DataV ASC;");
    while($campo=mysqli_fetch_array($list)){
      echo "<tr>";
      echo "<td>". $campo["DataV"]."</td>";
      echo "<td>". $campo["NomeFun"] ."</td>";
      echo "<td>". $campo["CredAcesV"] ."</td>";
      echo "<td>". $campo["ProdV"] ."</td>";   
      echo "<td>$ ". $campo["Troco"] ."</td>";
      echo "<td>$ ". $campo["Total"] ."</td>";
      echo "<tr/>";
      $total+= $campo["Total"]; 
    }
    echo "<tr>";
    
    echo "<td colspan='5'></td>";
    echo "<td>$ ".number_format($total,2)."</td>";
    echo "<tr>";
  }
   
?>