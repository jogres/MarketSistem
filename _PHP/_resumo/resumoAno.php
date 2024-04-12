<?php

  $conn = new mysqli("localhost", "root", "", "market");
  $sql = mysqli_query($conn,"SELECT DISTINCT YEAR(DataV) as ano FROM venda ORDER BY ano ASC;");

  while($row = mysqli_fetch_assoc($sql)){
    echo "<li><a href='resumoMes.php?ano=".$row['ano']."'>".$row['ano']."</a></li>";
  }
?>