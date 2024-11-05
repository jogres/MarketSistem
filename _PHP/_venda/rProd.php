<?php
session_start();

if (isset($_POST['idProduto'])) {
    $idProduto = $_POST['idProduto'];
    
    // Remover produto da variável de sessão
    unset($_SESSION['produtos'][$idProduto]);
    
    // Recalcular o total
    $total = 0;
    foreach ($_SESSION['produtos'] as $produto) {
        $dadosProduto = explode(" | $", $produto);
        $precoProduto = floatval($dadosProduto[1]);
        $total += floatval($precoProduto);
    }
    $_SESSION['total'] = $total;

      foreach ($_SESSION['id'] as $key => $id) {
        if ($key == $idProduto) {
            unset($_SESSION['id'][$key]);
            unset($_SESSION['id_temp'][$key]);
            break; // Parar o loop após remover o item
        }
      }
    
    // Redirecionar de volta para a página principal
    header('Location: ../../_HTML/_venda/venda.php');
    exit;
}
?>
