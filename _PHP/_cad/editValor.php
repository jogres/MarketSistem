<?php 
  
  $conn = new mysqli("localhost", "root", "", "market");
  
  $Porcent = floatval($_POST['Porcent'])/100;
  $id = $_POST['id'];
  $edit = mysqli_query($conn, "select cadprod.idProd, cadprod.idFor, cadprod.NomeProd, cadfor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Preco FROM cadfor INNER JOIN cadprod ON cadfor.idfor = CadProd.idfor WHERE CadProd.idFor= '$id'");
  
  while($campo = mysqli_fetch_array($edit)){
    
    $porV = $campo['Preco']*$Porcent;
    $novoV = $porV + $campo['Preco'];
    mysqli_query($conn, "UPDATE cadprod SET Preco = '$novoV' WHERE idFor ='$id' AND idProd = '".$campo['idProd']."'");
    } 
 

?>

