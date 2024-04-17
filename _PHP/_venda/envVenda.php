<?php 
  session_start();
  
  $conn = new mysqli("localhost", "root", "", "market");

  if (isset($_POST['submitted'])) {
    foreach ($_SESSION['id'] as $id) {
      $edit = mysqli_query($conn, "SELECT cadprod.idProd, cadprod.ContProd, cadprod.Preco FROM cadprod WHERE cadprod.idProd= '$id'");
      $campo = mysqli_fetch_array($edit);
      $Cont = $campo['ContProd'] - 1;      
      $totalN = $Cont * $campo['Preco'];
      mysqli_query($conn, "UPDATE cadprod SET ContProd = '$Cont', total = '$totalN' WHERE  idProd = '$id'");
      
    }
    
    $_SESSION['id'] = array();
  }


  $DataV = $_POST['data'];
  $ProdV = $_POST['pdV'];
  $NomeFun = $_POST['nome'];
  $Nome= $_POST['empresa'];
  $CredAcesV = $_POST['cred'];
  $Total = $_POST['total'];
  $Troco = $_POST['troco'];
  mysqli_query($conn,"insert into venda (DataV, ProdV, CredAcesV, Nome, NomeFun, Total, Troco) value('$DataV','$ProdV','$CredAcesV','$Nome','$NomeFun','$Total', '$Troco')");
  unset($_SESSION['produtos']);
  $_SESSION['total']=0;
  header('location: ../../_HTML/_venda/venda.php');  
?>