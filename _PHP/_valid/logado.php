<?php
  
  $permis = array(
    'admin' => array(
      '../_cad/cadProd.php',
      '../_cad/cadFun.php',
      '../_cad/cadFor.php',
      '../_stoc/stoc.php'
    ),
    'usuario' => array(
      '../_stoc/stoc.php'
    )
  );
  
  if(!isset($_SESSION['nivel'])){
    $_SESSION['nivel'] = 'usuario';
  }
  $nivel = $_SESSION['nivel'];
  
  
?>