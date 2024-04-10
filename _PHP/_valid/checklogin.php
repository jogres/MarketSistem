<?php
  session_start();
  $conn = new mysqli("localhost", "root", "", "market");
  $ident = $_POST['ident'];
  $sql = mysqli_query($conn,"SELECT CredAces, CargoFun FROM cadfun WHERE CredAces = '$ident'");
  while($linha = mysqli_fetch_assoc($sql)){
    $cred = $linha['CredAces'];
    $_SESSION['nivel'] = $linha['CargoFun'];
  }
  header('location: ../../_HTML/_venda/venda.php');
?>