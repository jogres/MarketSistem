<?php
  
  $permis = array(
    'admin' => array(
      '../_stoc/listFun.php' => 'Empleados',
      '../_stoc/listFor.php' => 'Provedores',
      '../_stoc/stoc.php' => 'Produtos',
      '../_venda/venda.php' => 'Vender',
      '../_resumo/resumoAno.php' => 'Resumo'
      
    ),
    'usuario' => array(
      '../_stoc/stoc.php' => 'Produtos' ,
      '../_venda/venda.php' => 'Vender'
    )
  );
  
 
  if(!isset($_SESSION['nivel'])){
    header('location: ../../_HTML/_valid/login.php');
  }
  $nivel = $_SESSION['nivel'];
  $cred = $_SESSION['cred'];
  $nomeP = $_SESSION['nomeFunP'];
  $nomeF = $_SESSION['nomeFun'];
  
  $menu = $permis[$nivel];

  if($nivel === 'usuario' ){
    $menu =array(
      '../_stoc/stoc.php' => 'Produtos' ,
      '../_venda/venda.php' => 'Vender'
    );
  }

  if($nivel === 'admin' && (basename($_SERVER['PHP_SELF']) === 'cadFun.php' || basename($_SERVER['PHP_SELF']) === 'listFun.php' || basename($_SERVER['PHP_SELF']) === 'editFun.php')){
    $menu =array(
      '../_cad/cadFun.php' => 'Registrar Empleado',
      '../_stoc/listFun.php' => 'Empleados',
      '../_venda/venda.php' => 'Vender'
    );
  }
  if($nivel === 'admin' && (basename($_SERVER['PHP_SELF']) === 'cadFor.php' || basename($_SERVER['PHP_SELF']) === 'listFor.php' || basename($_SERVER['PHP_SELF']) === 'editFor.php')){
    $menu =array(
      '../_cad/cadFor.php' => 'Registrar Provedores',
      '../_stoc/listFor.php' => 'Provedores',
      '../_venda/venda.php' => 'Vender'
    );
  }
  if($nivel === 'admin' && (basename($_SERVER['PHP_SELF']) === 'cadProd.php' || basename($_SERVER['PHP_SELF']) === 'stoc.php' || basename($_SERVER['PHP_SELF']) === 'editProd.php' || basename($_SERVER['PHP_SELF']) === 'edit.php')){
    $menu =array(
      '../_cad/cadProd.php' => 'Registrar Produtos',
      '../_stoc/stoc.php' => 'Produtos',
      '../_venda/venda.php' => 'Vender',
      '../_resumo/resumoAno.php' => 'Resumo'
    );
  }
?>