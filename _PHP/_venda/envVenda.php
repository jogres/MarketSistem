<?php 
  session_start();
  
  $conn = new mysqli("localhost", "root", "", "market");

  $DataV = $_POST['data'];
  $ProdV = $_POST['pdV'];
  $NomeFun = $_POST['nome'];
  $Nome= $_POST['empresa'];
  $CredAcesV = $_POST['cred'];
  $Total = $_POST['total'];
  echo $NomeFun;
  echo $CredAcesV;
  mysqli_query($conn,"insert into venda (DataV, ProdV, CredAcesV, Nome, NomeFun, Total) value('$DataV','$ProdV','$CredAcesV','$Nome','$NomeFun','$Total')");
  unset($_SESSION['produtos']);
  $_SESSION['total']=0;
  header('location: ../../_HTML/_venda/venda.php');  
?>