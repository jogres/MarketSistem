<?php
  include('../../_PHP/_venda/buscaPreenche.php');
  include('../../_PHP/_valid/logado.php');
  include('../../_PHP/_venda/remover.php');
  

?>
<!DOCTYPE html>
<html lang="es-ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../../_CSS/menu/menu.css">
  <link rel="stylesheet" href="../../_CSS/_venda/venda.css">
   <!-- Atualice con el camino correcto -->
</head>
<body>
  <div class="container">
    <nav class="main-nav">
      <button class="menu-toggle" aria-label="Abrir menú">&#9776;</button>
      <ul class="nav-links">
        <?php
          foreach ($menu as $link => $nome) {
            echo "<li class='nav-item'><a href=\"$link\" class='nav-link'>$nome</a></li>";
          }
        ?>
      </ul>
      <div class="nav-user-actions">
        <span class="user-name"><?php echo $nomeP; ?></span>
        <form action="../../_PHP/_valid/deslogar.php" method="post" class="logout-form">
          <button type="submit" class="logout-button">Salir</button>
        </form>
      </div>
    </nav>
    
    <div class="search-container">
      <form action="../../_PHP/_buscar/busca.php" method="GET" class="search-form">
        <input type="number" id="busca" name="busca" placeholder="Búsqueda..." class="search-input">
        <button type="submit" id="codV" name="codV" class="search-button">Encontrar</button>
      </form>
    </div>
    <div class="search-cli">
          <form action="../../_PHP/_venda/buscaCli.php" method="get">
            <label for="cli" class="cliname">
              <?php
                echo $_SESSION['cliname'];
              ?>
            </label>
            <input type="text" name="cli" id="cli" class="cli">
          </form>
    </div>
    <section class="sale-section">
      <div class="product-display">
        <form action="../../_PHP/_venda/envVenda.php" method="post" class="sale-form" onsubmit="return validateForm(event)">
          <fieldset class="form-fieldset">
            <fieldset class="datetime-fieldset">
              <input type="datetime-local" id="data" name="data" readonly class="datetime-input"><br/>
              <textarea name="pdV" id="pdV" cols="100" rows="10" readonly class="product-textarea" required><?php                
                foreach ($_SESSION['produtos'] as $key => $produto) {
                  if ($key > 0) {
                    echo "\n";
                  }
                  echo $produto;
                }             
              ?></textarea>
            </fieldset>
            <input type="hidden" name="nome" id="nome" value="<?php echo $nomeF; ?>">
            <input type="hidden" name="empresa" id="empresa" value="text">
            <input type="hidden" name="cred" id="cred" value="<?php echo $cred; ?>">
            <input type="hidden" name="nomeCli" id="nomeCli" value="<?php echo $_SESSION['cliname']; ?>">
            <fieldset class="totals-fieldset">
              <input type="text" name="total" id="total" value="<?php echo $total; ?>" readonly class="total-input">
              <input type="text" name="troco" id="troco" value="<?php echo $troco; ?>" readonly class="troco-input">
            </fieldset>
            <input type="hidden" name="submitted" value="1">
            <button type="submit" name="submitte" id="submitte" class="print-button">Imprimir</button>
            <button type="submit" name="Fim" id="Fim" class="end-button">Fin</button>
          </fieldset>
          
        </form>
      </div>
      <div class="button-container">
        <?php
          foreach ($_SESSION['produtos'] as $key => $produto) {
            $dadosProduto = explode(" | $", $produto);
            $idProduto = $key; // o el ID del producto, dependiendo de cómo lo estés almacenando
            $nomeProduto = $dadosProduto[0];
            $precoProduto = floatval($dadosProduto[1]);
            $quantidade = isset($dadosProduto[2]) ? floatval($dadosProduto[2]) : 0; // Verifica si la clave existe antes de acceder a ella
            if ($key > 0) {
                echo "\n";
            }
            
            echo "<form action='../../_PHP/_venda/rProd.php' method='post' class='remove-form'>";
            echo "<input type='hidden' name='idProduto' value='$idProduto'>";
            echo "<button type='submit' class='remove-button'>$nomeProduto</button>";
            echo "</form>";
          }                
        ?>
      </div>
    </section>
    <div class="payment-container">
        <div class="payment-discont">
          <form action="venda.php" method="get" class="payment-discont">
            <fieldset class="dicont">
              <legend class="legend-desc">Descuento</legend>
              <input type="text" name="disc" id="disc" class="payment-input">
            </fieldset>          
          </form>
        </div>    
        <div class="payment-pay">
          <form action="venda.php" method="get" class="payment-form">
            <input type="text" name="pago" id="pago" class="payment-input">
          </form>  
        </div>
    </div>  
    <footer class="footer">
      &copy; <?php echo date('Y'); ?> Sistema de Ventas de Supermercado
    </footer>
  </div>
  <script src="../../_js/_venda/data.js"></script>
  <script src="../../_js/_menu/menu.js"></script>
  <script>
    window.onload = function() {
      document.getElementById("busca").focus();
    };
    
    function validateForm(event) {
      var textarea = document.getElementById("pdV");
      var submitteButton = document.getElementById("submitte");

      if (event.submitter === submitteButton && textarea.value.trim() === "") {
        alert("El campo de productos no puede estar vacío.");
        return false;
      }
      return true;
    }
    
    history.replaceState({}, document.title, window.location.pathname);
  </script>
</body>
</html>
