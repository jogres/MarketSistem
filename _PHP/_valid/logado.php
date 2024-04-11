<?php
  
  $permis = array(
    'admin' => array(
      '../_cad/cadProd.php',
      '../_cad/cadFun.php',
      '../_cad/cadFor.php',
      '../_stoc/stoc.php',
      '../_venda/venda.php'
    ),
    'usuario' => array(
      '../_stoc/stoc.php'
    )
  );
  
  $nomeL = array(
    '../_cad/cadProd.php' => 'Registrar Produtos',
    '../_cad/cadFun.php' => 'Registrar Empleado',
    '../_cad/cadFor.php' => 'Registrar Proverdor',
    '../_stoc/stoc.php' => 'Produtos',
    '../_venda/venda.php' => 'Vender'
  );
  
  if(!isset($_SESSION['nivel'])){
    header('location: ../../_HTML/_valid/login.php');
  }
  $nivel = $_SESSION['nivel'];
  $cred = $_SESSION['cred'];
  $nomeP = $_SESSION['nomeFunP'];
  $nome = $_SESSION['nomeFun'];
  
?>