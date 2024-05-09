<?php
   $conn = new mysqli("localhost", "root", "", "market");
   $NomeCli = $_POST['NomeCli'];
   $Dni = $_POST['Dni'];
   $NumCli = $_POST['NumCli'];
   
   $id = $_POST['id'];

   mysqli_query($conn,"UPDATE cadcli SET NomeCli = '$NomeCli', Dni ='$Dni', NumCli = '$NumCli' WHERE idCli = '$id'");
 
   header("location: ../../../_HTML/_stoc/listCli.php");
?>