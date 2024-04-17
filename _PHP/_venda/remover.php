<?php
  
  // Verificar se há uma variável de sessão para os produtos
  if (!isset($_SESSION['produtos'])) {
      $_SESSION['produtos'] = array();
      $_SESSION['id'] = array();
  }
  
  
  if(isset($_GET['pago'])){ 
    $pago=$_GET['pago'];
    $_SESSION['troco']= $pago - $total;
    $troco = $_SESSION['troco'];              
  }  
  
  if (isset($_GET['id'])) {
     $id = $_GET['id'];
     $_SESSION['id'][] = $id;
  }

?>