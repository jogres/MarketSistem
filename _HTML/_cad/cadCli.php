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
  <link rel="stylesheet" href="../../_CSS/_cad/cad.css"> <!-- Link para o arquivo CSS -->
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
          <span class="user-name"><?php echo $nomeP; ?></span>
          <form class="logout-form" action="../../_PHP/_valid/deslogar.php" method="post">
            <button class="logout-button" type="submit">Salir</button>
          </form>
        </div>
      </nav>
    
    <div class="search-container">
      <div class="search-form">
        <form method="post" action="../../_PHP/_cad/cadCli.php">
          <fieldset>
            <p>
              <label for="NomeCli">Nombre del Cliente: </label>
              <input class="search-input" type="text" id="NomeCli" name="NomeCli" required>
            </p>
            <p>
              <label for="Dni">DNI: </label>
              <input class="search-input" type="text" id="Dni" name="Dni" required>
            </p>
            <p>
              <label for="NumCli">Número del Cliente: </label>
              <input class="search-input" type="text" id="NumCli" name="NumCli" required>
            </p>
          </fieldset>
          <div class="subbt">
            <button class="search-button" type="submit" name="submit">Guardar</button>
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
