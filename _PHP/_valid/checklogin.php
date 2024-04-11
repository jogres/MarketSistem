<?php
  
  session_start();
  
  $conn = new mysqli("localhost", "root", "", "market");
    
    $ident = $_POST['ident'];
    $sql = mysqli_query($conn,"SELECT CredAces, CargoFun, 
    SUBSTRING_INDEX(NomeFun,' ',1) AS primeiroNome, NomeFun FROM cadfun WHERE CredAces = '$ident'");
    while($linha = mysqli_fetch_assoc($sql)){
      $_SESSION['nomeFunP'] = $linha['primeiroNome'];
      $_SESSION['nomeFun'] = $linha['NomeFun'];
      $_SESSION['cred'] = $linha['CredAces'];
      $_SESSION['nivel'] = $linha['CargoFun'];
    }
 
  
   header('location: ../../_HTML/_venda/venda.php');

?>