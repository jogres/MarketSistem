<?php


  $conn = new mysqli("localhost", "root", "", "market");
  
  $NomeProd = $_POST['NomeProd'];
  $DesProd = $_POST['DesProd'];
  $ContProd = $_POST['ContProd'];
  $CodBar = $_POST['CodBar'];
  $Preco = $_POST['Preco'];
  $id = $_POST['id'];
  $edit = mysqli_query($conn, "select cadprod.idProd, cadprod.idFor, cadprod.NomeProd, cadfor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Preco FROM cadfor INNER JOIN cadprod ON cadfor.idfor = CadProd.idfor WHERE CadProd.idProd= '$id'");

  while($campo=mysqli_fetch_array($edit)){
    $nCP = $campo['ContProd']+$ContProd;
    mysqli_query($conn,"UPDATE cadprod SET NomeProd = '$NomeProd', DesProd ='$DesProd', ContProd = '$nCP', CodBar ='$CodBar', Preco = '$Preco' WHERE idProd = '$id'");
  }
  header("Location: ../../../_HTML/_stoc/stoc.php");

?>  