<?php
  // Iniciar ou resumir a sessão
  session_start(); 
  
  // Verificar se há uma variável de sessão para os produtos
  if (!isset($_SESSION['produtos'])) {
      $_SESSION['produtos'] = array();  
  }
  if (!isset($_SESSION['cliname'])) {
    $_SESSION['cliname'] = '';  
  }
  
  $total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;
  $troco = 0;

  if (isset($_GET['produto'], $_GET['preco'], $_GET['quantidade'])) {
    $produto = $_GET['produto'];
    $preco = $_GET['preco'];
    $quantidade = $_GET['quantidade'];
    

    // Adicionar novo produto à variável de sessão
    $_SESSION['produtos'][] = "$produto | $" . $preco . " | $quantidade";
    $total += $preco;
    $_SESSION['total']=$total;
  }
  $errorMessage ='';
  if(isset($_GET['cont'])){
    
      $errorMessage = 'Erro: Os parâmetros produto, preco e quantidade são obrigatórios.';
    
  }
  if ($errorMessage) {
    echo "<div style='color: red; font-weight: bold;'>$errorMessage</div>";
  }

  
  
?>
