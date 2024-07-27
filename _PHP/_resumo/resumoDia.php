<?php
  // Establece conexión con la base de datos
  $conn = new mysqli("localhost", "root", "", "market");

  // Verifica si los parámetros 'ano', 'mes' y 'dia' fueron pasados por la URL
  if (isset($_GET['ano']) && isset($_GET['mes'])) {
    $ano = $_GET['ano'];
    $mes = $_GET['mes'];
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $nomeMes = $meses[$mes - 1];
    $Total = 0;
    echo "<h1>$nomeMes $ano</h1>";
    echo "<a href='resumo.php?ano=$ano&mes=$mes' class='total'>Resumen del Mes</a>";
    // Calcula el número de días en el mes
    $diasNoMes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

    // Genera el calendario
    echo "<table class='calendario' border='1'>";
    echo "<tr>";
    for ($dia = 1; $dia <= $diasNoMes; $dia++) {
      // Consulta a la base de datos para verificar si hay registros para ese día, mes y año
      $sql = "SELECT COUNT(*) as total FROM vendad WHERE YEAR(DataV) = $ano AND MONTH(DataV) = $mes AND DAY(DataV) = $dia";
      $result = mysqli_query($conn, $sql);

      // Verifica si la consulta fue exitosa
      if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];

        // Si hay registros, muestra el enlace para el resumen del día
        if ($total > 0) {
          echo "<td><a href='?ano=$ano&mes=$mes&dia=$dia'>$dia</a></td>";
        } else {
          echo "<td>$dia</td>";
        }
      } else {
        echo "<td>Error</td>";
      }

      // Rompe la línea después de cada semana (7 días)
      if ($dia % 7 == 0) {
        echo "</tr><tr>";
      }
    }
    echo "</tr>";
    echo "</table>";
  } else {
    echo "Año o mes no especificado.";
  }

  // Muestra las ventas y devoluciones de un día específico, si se pasa el parámetro 'dia'
  if (isset($_GET['ano']) && isset($_GET['mes']) && isset($_GET['dia'])) {
    $ano = $_GET['ano'];
    $mes = $_GET['mes'];
    $dia = $_GET['dia'];

    // Consulta a la base de datos para obtener las ventas del día especificado
    $sql_vendas = "SELECT idDia AS id, ProdV AS nombre, qt AS Cantidad, Preco, DataV AS fecha, TotalD FROM vendad WHERE YEAR(DataV) = $ano AND MONTH(DataV) = $mes AND DAY(DataV) = $dia";
    $result_vendas = mysqli_query($conn, $sql_vendas);

    // Consulta para obtener el total de devoluciones del día especificado
    $sql_total_devolucoes = "SELECT SUM(Preco) as total_devoluciones FROM devo WHERE YEAR(DataD) = $ano AND MONTH(DataD) = $mes AND DAY(DataD) = $dia";
    $result_total_devolucoes = mysqli_query($conn, $sql_total_devolucoes);

    if ($result_vendas && $result_total_devolucoes) {
      echo "<h2>Ventas y Devoluciones del $dia/$mes/$ano</h2>";
      echo "<table class='dia' border='1'>";
      echo "<tr><th>Fecha</th><th>Nombre</th><th>Cantidad</th><th>Precio</th><th>Total</th><th>Total de Devoluciones</th></tr>";

      while ($row = mysqli_fetch_assoc($result_vendas)) {
        echo "<tr>";
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['Cantidad'] . "</td>";
        echo "<td>" . $row['Preco'] . "</td>";        
        echo "<td>" . $row['TotalD'] . "</td>";
        $Total += $row['TotalD'];
      }

      // Muestra el total de devoluciones en una fila separada
      $row_total_devolucoes = mysqli_fetch_assoc($result_total_devolucoes);
      $total_devoluciones = $row_total_devolucoes['total_devoluciones'];
      
      echo "<td>" . ($total_devoluciones ? $total_devoluciones : '0.00') . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td colspan='4'></td>";
      echo "<td>".($Total ? $Total : "0.00")."</td>";
      echo "</tr>";
      echo "</table>";
    } else {
      echo "Error en la consulta de ventas o devoluciones: " . mysqli_error($conn);
    }
  }
?>
