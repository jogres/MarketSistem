<?php
  include("../_conect/conect.php");
  $NomeCli = $_POST['NomeCli'];
  $Dni= $_POST['Dni'];
  $NumCli = $_POST['NumCli'];
  

  mysqli_query($conexao,"insert into cadcli (NomeCli, Dni, NumCli) values ('$NomeCli','$Dni','$NumCli')");
  
  header("location: ../../_HTML/_cad/cadCli.php");
  exit();
?>