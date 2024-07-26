<?php
  session_start();
  include('../../_PHP/_valid/logado.php');
  if($nivel == 'usuario'){
    header('location: ../_venda/venda.php');
  }
?>
<!DOCTYPE html>
<html lang="es-ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../../_CSS/menu/menu.css">
  <link rel="stylesheet" href="../../_CSS/_cad/cad.css">
</head>
<body>
  <div >
      <nav class="main-nav">
        <button class="menu-toggle">☰</button>
        <ul class="nav-links">
          <?php
            foreach ($menu as $link => $nome) {
              echo "<li class='nav-item'><a class='nav-link' href=\"$link\">$nome</a></li>";
            }
          ?>
        </ul>
        <div class="nav-user-actions">
          <span class="user-name"><?php echo $nomeP; ?></span>
          <form class="logout-form" action="../../_PHP/_valid/deslogar.php" method="post">
            <button class="logout-button" type="submit">Salir</button>
          </form>
        </div>
      </nav>
    
    <div class="search-container">
      <div class="search-form">
        <form method="post" action="../../_PHP/_cad/_cadProd/cadProd.php">
          <fieldset>
            <p>
              <label for="NomeProd">Nombre del producto: </label> 
              <input class="search-input" type="text" id="NomeProd" name="NomeProd" required>
            </p>
            <p>
              <label for="idFor">Proveedor: </label> 
              <select class="search-select" name="idFor" id="idFor" required>
                <?php
                  include ('../../_PHP/_cad/_cadProd/busca.php');
                ?>
              </select>
            </p>
            <p>
              <label for="DesProd">Descripción del producto: </label> 
              <textarea class="search-textarea" name="DesProd" id="DesProd" cols="20" rows="5" required></textarea>
            </p>
            <p>
              <label for="ContProd">Cantidad: </label>
              <input class="search-input" type="number" id="ContProd" name="ContProd" required>
            </p>    
            <p>
              <label for="CodBar">Código de barras: </label> 
              <input class="search-input" type="text" id="CodBar" name="CodBar" required>
            </p>
            <p>
              <label for="Costo">Costo: </label>
              <input class="search-input" type="number" min="0.00" step="0.01" id="Costo" name="Costo" required>
            </p>
            <p>
              <label for="Preco">Precio: </label>
              <input class="search-input" type="number" min="0.00" step="0.01" id="Preco" name="Preco" required>
            </p>
          </fieldset>
          <div class="subbt">
            <button class="search-button" type="submit" name="submit">guardar</button>
          </div>
        </form>
      </div>
    </div>
    <div>
      <footer class="footer"></footer>
    </div>
  </div>
  <script src="../../_js/_menu/menu.js"></script>  
</body>
</html>
