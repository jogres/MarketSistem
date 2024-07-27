<?php
  $conn = new mysqli("localhost", "root", "", "market");
  if (isset($_GET['ano'])) {
    $ano = $_GET['ano'];
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    echo "<h1>".$ano."</h1>";
    $i=0;
    for ($mes = 1; $mes <= 12; $mes++) {
      // Consulta a la base de datos para verificar si hay registros para ese mes y año
      $sql = "SELECT COUNT(*) as total FROM venda WHERE YEAR(DataV) = $ano AND MONTH(DataV) = $mes";
      $result = mysqli_query($conn, $sql);
      
      // Verificar si la consulta fue exitosa
      if ($result) {
          $row = mysqli_fetch_assoc($result);
          $total = $row['total'];
          
          // Si hay registros, muestra el enlace para el resumen del mes
          if ($total > 0) {
              echo "<a href='resumoDia.php?ano=$ano&mes=$mes' class='link-item'>".$meses[$i]."</a> ";
          }
      } else {
          echo "Error en la consulta: " . mysqli_error($conn);
      }
      
      $i++;
  }
  } else {
    echo "Año no especificado.";
  }
?>
