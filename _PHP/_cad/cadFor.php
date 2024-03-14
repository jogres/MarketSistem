<?php
  include("../_conect/conect.php");
  $NomeFor = $_POST['NomeFor'];
  $Cuit = $_POST['Cuit'];
  $NumFor = $_POST['NumFor'];
  $EmailFor = $_POST['EmailFor'];

  mysqli_query($conexao,"insert into cadfor (NomeFor, Cuit, NumFor, EmailFor) values ('$NomeFor','$Cuit','$NumFor','$EmailFor')");
  
  header("location: ../../_HTML/_cad/cadFor.php");
  exit();
?>