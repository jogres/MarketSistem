<?php 
  
  $conn = new mysqli("localhost", "root", "", "market");
  
  $Porcent = floatval($_POST['Porcent'])/100;
  $id = $_POST['id'];
  $edit = mysqli_query($conn, "select cadprod.idProd, cadprod.idFor, cadprod.NomeProd, cadfor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Preco FROM cadfor INNER JOIN cadprod ON cadfor.idfor = CadProd.idfor WHERE CadProd.idFor= '$id'");
  
  if(isset($_POST['add'])){
    while($campo = mysqli_fetch_array($edit)){

      $porV = $campo['Preco']*$Porcent;
      $novoV = $porV + $campo['Preco'];
      $totalN = $campo['ContProd'] * $novoV;
      
      mysqli_query($conn, "UPDATE cadprod SET  Preco = '$novoV', total = '$totalN' WHERE idFor ='$id' AND idProd = '".$campo['idProd']."'");
    }
    header("Location: ../../../_HTML/_stoc/stoc.php");
  }
  elseif(isset($_POST['sub'])){
    while($campo = mysqli_fetch_array($edit)){

      $porV = $campo['Preco']*$Porcent;
      $novoV = $campo['Preco'] - $porV;
      $totalN = $campo['ContProd'] * $novoV;
      
      mysqli_query($conn, "UPDATE cadprod SET  Preco = '$novoV', total = '$totalN' WHERE idFor ='$id' AND idProd = '".$campo['idProd']."'");
    }
    header("Location: ../../../_HTML/_stoc/stoc.php");
  } 

?>

