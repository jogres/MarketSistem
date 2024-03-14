<?php
  include("../_conect/conect.php");
  $NomeFun = $_POST['NomeFun'];
  $Dni = $_POST['Dni'];
  $EndFun = $_POST['EndFun'];
  $NumFun = $_POST['NumFun'];
  $EmailFun = $_POST['EmailFun'];
  $CredAces = $_POST['CredAces'];
  $CargoFun = $_POST['CargoFun'];

  mysqli_query($conexao,"insert into cadfun (NomeFun, Dni, EndFun, NumFun, EmailFun,CredAces, CargoFun) value('$NomeFun','$Dni','$EndFun','$NumFun','$EmailFun','$CredAcess','$CargoFun')");

  header("location: ../../_HTML/_cad/cadFun.php");
  exit();
?>