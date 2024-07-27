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
  <link rel="stylesheet" href="../../_CSS/menu/menu.css"> <!-- Link para el archivo CSS -->
  <link rel="stylesheet" href="../../_CSS/_cad/cad.css"> <!-- Link para el archivo CSS -->
</head>
<body>
  <div class="container"> <!-- Adiciona la clase container -->

    <nav class="main-nav"> <!-- Adiciona la clase main-nav -->
      <button class="menu-toggle">☰</button> <!-- Botón para menú lateral en dispositivos pequeños -->
      <ul class="nav-links"> <!-- Adiciona la clase nav-links -->
        <?php
          foreach ($menu as $link => $nome) {
            echo "<li class='nav-item'><a href=\"$link\" class='nav-link'>$nome</a></li>";
          }
        ?>  
      </ul>
      <div class="nav-user-actions"> <!-- Adiciona la clase nav-user-actions -->
        <span class="user-name"><?php echo $nomeP; ?></span>
        <form action="../../_PHP/_valid/deslogar.php" method="post" class="logout-form"> <!-- Adiciona la clase logout-form -->
          <button type="submit" class="logout-button">Salir</button> <!-- Adiciona la clase logout-button -->
        </form>
      </div>
    </nav>

    <div class="search-container"> <!-- Adiciona la clase search-container -->
      <form method="post" action="../../_PHP/_cad/_editiValor/editFev.php" class="search-form"> <!-- Adiciona la clase search-form -->
        <fieldset>
          <?php
            include('../../_PHP/_cad/_editiValor/editFun.php');
          ?>
        </fieldset>
        <div class="subbt"> <!-- Adiciona la clase subbt -->
          <button type="submit" class="search-button">Guardar</button> <!-- Adiciona la clase search-button -->
        </div>
      </form>
    </div>

    <footer class="footer"> <!-- Adiciona la clase footer -->
      <!-- Contenido del pie de página -->
    </footer>

  </div>
  <script src="../../_js/_menu/menu.js"></script>  
</body>
</html>
