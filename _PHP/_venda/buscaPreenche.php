<?php
  // Iniciar ou resumir a sessão
  session_start(); 

  // Verificar se há uma variável de sessão para os produtos
  if (!isset($_SESSION['produtos'])) {
      $_SESSION['produtos'] = array();
  }
  $total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;
  $troco = 0;

  if (isset($_GET['produto'], $_GET['preco'], $_GET['quantidade'])) {
    $produto = $_GET['produto'];
    $preco = $_GET['preco'];
    $quantidade = $_GET['quantidade'];
    

    // Adicionar novo produto à variável de sessão
    $_SESSION['produtos'][] = "$produto | $" . number_format($preco, 2) . " | $quantidade";
    $total += $preco;
    $_SESSION['total']=$total;
  }

  
  
?>
