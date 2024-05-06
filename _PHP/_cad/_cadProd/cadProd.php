<?php
  include("../../_conect/conect.php");
  $NomeProd = $_POST['NomeProd'];
  $idFor = $_POST['idFor'];
  $DesProd = $_POST['DesProd'];
  $ContProd = $_POST['ContProd'];
  $CodBar = $_POST['CodBar'];
  $Custo = $_POST['Custo'];
  $Preco = $_POST['Preco'];
  $total = $ContProd * $Preco;
  $Cuni = $Custo / $ContProd;
  $Puni = $Preco / $ContProd;
  mysqli_query($conexao,"insert into cadprod (NomeProd, DesProd, ContProd, CodBar, Cuni, Custo, Puni, Preco, total,idFor) value('$NomeProd','$DesProd','$ContProd','$CodBar', '$Cuni', '$Puni','$Custo', '$Preco','$total','$idFor')");

  header("location: ../../../_HTML/_cad/cadProd.php");
  exit();
?>