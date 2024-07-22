<?php 
  session_start();
  
  $conn = new mysqli("localhost", "root", "", "market");
  $id = $_POST['id'];
  $preco = $_POST['preco'] * -1;
  $produto = $_POST['produto'];
  $data = $_POST['data'];
  $codB = $_POST['codb'];

  mysqli_query($conn,"insert into devo (DataD, NomeD, Preco) values ('$data', '$produto','$preco')");

  $edit = mysqli_query($conn, "select * FROM CadProd WHERE CadProd.CodBar = '$codB';");
  while($campo=mysqli_fetch_array($edit)){
    $nCP = $campo['ContProd'] + 1;
    $nTotal = $campo['Preco'] * $nCP;
    mysqli_query($conn, "UPDATE cadprod SET  ContProd = '$nCP', total = '$nTotal' WHERE cadprod.CodBar = '$codB'");    
  }

  header('location: ../../_HTML/_venda/devo.php');
?>