<?php
  
  $permis = array(
    'admin' => array(
      '../_stoc/listFun.php' => 'Empleados',
      '../_stoc/listFor.php' => 'Proveedores',
      '../_stoc/listCli.php' => 'Clientes',
      '../_stoc/stoc.php' => 'Productos',
      '../_venda/venda.php' => 'Vender',
      '../_venda/devo.php' => 'Devoluciones',
      '../_resumo/resumoAno.php' => 'Resumen'
      
    ),
    'usuario' => array(
      '../_stoc/stoc.php' => 'Productos',
      '../_venda/devo.php' => 'Devoluciones',
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
    $menu = array(
      '../_stoc/stoc.php' => 'Productos',
      '../_venda/devo.php' => 'Devoluciones',
      '../_venda/venda.php' => 'Vender'
    );
  }

  if($nivel === 'admin' && (basename($_SERVER['PHP_SELF']) === 'cadFun.php' || basename($_SERVER['PHP_SELF']) === 'listFun.php' || basename($_SERVER['PHP_SELF']) === 'editFun.php')){
    $menu = array(
      '../_cad/cadFun.php' => 'Registrar Empleado',
      '../_stoc/listFun.php' => 'Empleados',
      '../_venda/venda.php' => 'Vender'
    );
  }
  if($nivel === 'admin' && (basename($_SERVER['PHP_SELF']) === 'cadCli.php' || basename($_SERVER['PHP_SELF']) === 'listCli.php' || basename($_SERVER['PHP_SELF']) === 'editCli.php')){
    $menu = array(
      '../_cad/cadCli.php' => 'Registrar Clientes',
      '../_stoc/listCli.php' => 'Clientes',
      '../_venda/venda.php' => 'Vender'
    );
  }
  if($nivel === 'admin' && (basename($_SERVER['PHP_SELF']) === 'cadFor.php' || basename($_SERVER['PHP_SELF']) === 'listFor.php' || basename($_SERVER['PHP_SELF']) === 'editFor.php')){
    $menu = array(
      '../_cad/cadFor.php' => 'Registrar Proveedores',
      '../_stoc/listFor.php' => 'Proveedores',
      '../_venda/venda.php' => 'Vender'
    );
  }
  if($nivel === 'admin' && (basename($_SERVER['PHP_SELF']) === 'cadProd.php' || basename($_SERVER['PHP_SELF']) === 'stoc.php' || basename($_SERVER['PHP_SELF']) === 'editProd.php' || basename($_SERVER['PHP_SELF']) === 'edit.php')){
    $menu = array(
      '../_cad/cadProd.php' => 'Registrar Productos',
      '../_stoc/stoc.php' => 'Productos',
      '../_venda/venda.php' => 'Vender',
      '../_resumo/resumoAno.php' => 'Resumen'
    );
  }
?>
