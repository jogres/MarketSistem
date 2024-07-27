<?php
  session_start();
  include('../../_PHP/_valid/logado.php');
?>
<!DOCTYPE html>
<html lang="es-ar">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro</title>
  <link rel="stylesheet" href="../../_CSS/menu/menu.css">
  <link rel="stylesheet" href="../../_CSS/_stoc/list.css">
</head>
<body>
  <div class="container">
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
        <span class="user-name">
          <?php echo $nomeP; ?>
        </span>
        <form class="logout-form" action="../../_PHP/_valid/deslogar.php" method="post">
          <button class="logout-button" type="submit">Salir</button>
        </form>
      </div>
    </nav>

    <div class="search-container">
      <form class="search-form" action="../../_PHP/_buscar/busca.php" method="GET">
        <input class="search-input" type="text" id="busca" name="busca" placeholder="Buscar...">
        <button class="search-button" type="submit" id="encontra" name="encontra">Encontrar</button>
      </form>
    </div>

    <div class="content">
      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th><strong>Nombre del producto</strong></th>
              <th><strong>Proveedor</strong></th>
              <th><strong>Descripción del producto</strong></th>
              <th><strong>Cantidad</strong></th>
              <th><strong>Código de barras</strong></th>
              <?php
                if($nivel == 'admin'){
                  echo "<th><strong>Costo</strong></th>";
                }
              ?>
              <th><strong>Precio</strong></th>
              <?php
                if($nivel == 'admin'){
                  echo "<th><strong>Total</strong></th>";
                }
              ?>
            </tr>
          </thead>
          <tbody>
            <?php 
              include('../../_PHP/_stoc/stoc.php');
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <footer class="footer"></footer>
    <script src="../../_js/_menu/menu.js"></script> 
  </div>
</body>
</html>
