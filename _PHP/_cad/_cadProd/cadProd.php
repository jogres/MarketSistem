<?php
  include("../../_conect/conect.php");
  $NomeProd = $_POST['NomeProd'];
  $idFor = $_POST['idFor'];
  $DesProd = $_POST['DesProd'];
  $ContProd = $_POST['ContProd'];
  $CodBar = $_POST['CodBar'];
  $Custo = $_POST['Costo'];
  $Preco = $_POST['Preco'];
  $total = $ContProd * $Preco;
  
  mysqli_query($conexao,"insert into cadprod (NomeProd, DesProd, ContProd, CodBar, Custo, Preco, total,idFor) value('$NomeProd','$DesProd','$ContProd','$CodBar', '$Custo', '$Preco','$total','$idFor')");

  header("location: ../../../_HTML/_cad/cadProd.php");
  exit();
?>