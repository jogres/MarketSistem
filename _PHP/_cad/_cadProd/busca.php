<?php  
  include("../../_conect/conect.php");

  $conn = new mysqli("localhost", "root", "", "market");

  // Executa a query
  $result = mysqli_query($conn, "SELECT idFor, NomeFor FROM cadfor");

  // Verifica se há resultados
  if ($result->num_rows > 0) {
      // Loop através dos resultados para criar as opções do select
      while ($row = $result->fetch_assoc()) {
          echo "<option value='" . $row["idFor"] . "'>" . $row["NomeFor"] . "</option>";
      }
  } else {
      echo "<option value=''>Nenhum fornecedor encontrado</option>";
  }

  // Fecha a conexão
  $conn->close();
    
?>