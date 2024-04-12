<?php
  $conn = new mysqli("localhost", "root", "", "market");
  if (isset($_GET['ano'])) {
    $ano = $_GET['ano'];
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    echo"<h1>".$ano."</h1>";
    $i=0;
    for ($mes = 1; $mes <= 12; $mes++) {
      // Consulta ao banco de dados para verificar se há registros para esse mês e ano
      $sql = "SELECT COUNT(*) as total FROM venda WHERE YEAR(DataV) = $ano AND MONTH(DataV) = $mes";
      $result = mysqli_query($conn, $sql);
      
      // Verificar se a consulta foi bem-sucedida
      if ($result) {
          $row = mysqli_fetch_assoc($result);
          $total = $row['total'];
          
          // Se houver registros, exibe o link para o resumo do mês
          if ($total > 0) {
              echo "<a href='resumo.php?ano=$ano&mes=$mes'>".$meses[$i]."</a> ";
          }
      } else {
          echo "Erro na consulta: " . mysqli_error($conn);
      }
      
      $i++;
  }
  } else {
    echo "Ano não especificado.";
  }
?>