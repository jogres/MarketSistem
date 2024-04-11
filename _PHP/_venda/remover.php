<?php
  // Iniciar ou resumir a sessão
  
  $conn = new mysqli("localhost", "root", "", "market");
  // Verificar se há uma variável de sessão para os produtos
  if (!isset($_SESSION['produtos'])) {
      $_SESSION['produtos'] = array();
  }

  

  if (isset($_GET['id'])) {
    $id=$_GET['id'];
    $edit = mysqli_query($conn, "select cadprod.idProd, cadprod.idFor, cadprod.NomeProd, cadfor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Preco FROM cadfor INNER JOIN cadprod ON cadfor.idfor = CadProd.idfor WHERE CadProd.idProd= '$id'");
    
    while($campo = mysqli_fetch_array($edit)){
      $Cont = $campo['ContProd'] - 1;      
      $totalN = $Cont * $campo['Preco'];
      mysqli_query($conn, "UPDATE cadprod SET ContProd = '$Cont', total = '$totalN' WHERE  idProd = '$id'");
    }    
  }

?>