<?php

  $conn = new mysqli("localhost", "root", "", "market");

 
  $NomeFun = $_POST['NomeFun'];
  $Dni = $_POST['Dni'];
  $EndFun = $_POST['EndFun'];
  $NumFun = $_POST['NumFun'];
  $EmailFun = $_POST['EmailFun'];
  $CredAces = $_POST['CredAces'];
  $CargoFun = $_POST['CargoFun'];
  $id = $_POST['id'];
    
  mysqli_query($conn,"UPDATE cadfun SET NomeFun = '$NomeFun', Dni ='$Dni', EndFun = '$EndFun', NumFun ='$NumFun', EmailFun = '$EmailFun', CredAces = '$CredAces', CargoFun ='$CargoFun' WHERE idFun = '$id'");
 
  header("location: ../../../_HTML/_stoc/listFun.php");
  
?>

  

