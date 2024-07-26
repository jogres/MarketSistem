<?php
  // Estabelece conexão com o banco de dados
  $conn = new mysqli("localhost", "root", "", "market");

  // Verifica se os parâmetros 'ano', 'mes' e 'dia' foram passados via URL
  if (isset($_GET['ano']) && isset($_GET['mes'])) {
    $ano = $_GET['ano'];
    $mes = $_GET['mes'];
    $meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
    $nomeMes = $meses[$mes - 1];
    $Total = 0;
    echo "<h1>$nomeMes $ano</h1>";
    echo "<a href='resumo.php?ano=$ano&mes=$mes' class='total'>Resumo del Mes</a>";
    // Calcula o número de dias no mês
    $diasNoMes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

    // Gera o calendário
    echo "<table class='calendario' border='1'>";
    echo "<tr>";
    for ($dia = 1; $dia <= $diasNoMes; $dia++) {
      // Consulta ao banco de dados para verificar se há registros para esse dia, mês e ano
      $sql = "SELECT COUNT(*) as total FROM vendad WHERE YEAR(DataV) = $ano AND MONTH(DataV) = $mes AND DAY(DataV) = $dia";
      $result = mysqli_query($conn, $sql);

      // Verifica se a consulta foi bem-sucedida
      if ($result) {
        $row = mysqli_fetch_assoc($result);
        $total = $row['total'];

        // Se houver registros, exibe o link para o resumo do dia
        if ($total > 0) {
          echo "<td><a href='?ano=$ano&mes=$mes&dia=$dia'>$dia</a></td>";
        } else {
          echo "<td>$dia</td>";
        }
      } else {
        echo "<td>Erro</td>";
      }

      // Quebra a linha após cada semana (7 dias)
      if ($dia % 7 == 0) {
        echo "</tr><tr>";
      }
    }
    echo "</tr>";
    echo "</table>";
  } else {
    echo "Ano ou mês não especificado.";
  }

  // Exibe as vendas e devoluções de um dia específico, se o parâmetro 'dia' for passado
  if (isset($_GET['ano']) && isset($_GET['mes']) && isset($_GET['dia'])) {
    $ano = $_GET['ano'];
    $mes = $_GET['mes'];
    $dia = $_GET['dia'];

    // Consulta ao banco de dados para obter as vendas do dia especificado
    $sql_vendas = "SELECT idDia AS id, ProdV AS nome, qt AS Quantidade, Preco, DataV AS data, TotalD FROM vendad WHERE YEAR(DataV) = $ano AND MONTH(DataV) = $mes AND DAY(DataV) = $dia";
    $result_vendas = mysqli_query($conn, $sql_vendas);

    // Consulta para obter o total de devoluções do dia especificado
    $sql_total_devolucoes = "SELECT SUM(Preco) as total_devolucoes FROM devo WHERE YEAR(DataD) = $ano AND MONTH(DataD) = $mes AND DAY(DataD) = $dia";
    $result_total_devolucoes = mysqli_query($conn, $sql_total_devolucoes);

    if ($result_vendas && $result_total_devolucoes) {
      echo "<h2>Vendas e Devoluções de $dia/$mes/$ano</h2>";
      echo "<table class='dia' border='1'>";
      echo "<tr><th>Data</th><th>Nome</th><th>Quantidade</th><th>Preço</th><th>Total</th><th>Total de Devoluções</th></tr>";

      while ($row = mysqli_fetch_assoc($result_vendas)) {
        echo "<tr>";
        echo "<td>" . $row['data'] . "</td>";
        echo "<td>" . $row['nome'] . "</td>";
        echo "<td>" . $row['Quantidade'] . "</td>";
        echo "<td>" . $row['Preco'] . "</td>";        
        echo "<td>" . $row['TotalD'] . "</td>";
        $Total += $row['TotalD'];
      }

      // Exibe o total de devoluções em uma linha separada
      $row_total_devolucoes = mysqli_fetch_assoc($result_total_devolucoes);
      $total_devolucoes = $row_total_devolucoes['total_devolucoes'];
      
      
      echo "<td>" . ($total_devolucoes ? $total_devolucoes : '0.00') . "</td>";
      echo "</tr>";
      echo "<tr>";
      echo "<td colspan= '4'></td>";
      echo "<td >".($Total ? $Total : "0.00")."</td>";
      echo "</tr>";
      echo "</table>";
    } else {
      echo "Erro na consulta de vendas ou devoluções: " . mysqli_error($conn);
    }
  }
?>
