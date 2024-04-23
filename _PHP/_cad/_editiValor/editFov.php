<?php
   $conn = new mysqli("localhost", "root", "", "market");
   $NomeFor = $_POST['NomeFor'];
   $Cuit = $_POST['Cuit'];
   $NumFor = $_POST['NumFor'];
   $EmailFor = $_POST['EmailFor'];
   $id = $_POST['id'];

   mysqli_query($conn,"UPDATE cadfor SET NomeFor = '$NomeFor', Cuit ='$Cuit', NumFor = '$NumFor', EmailFor ='$EmailFor' WHERE idFor = '$id'");
 
   header("location: ../../../_HTML/_stoc/listFor.php");
?>