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
  <title>Documento</title>
  <link rel="stylesheet" href="../../_CSS/menu/menu.css">
  <link rel="stylesheet" href="../../_CSS/_resumo/resumoAnoMes.css">
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
    
    <div class="content-container">
      <ul class="data-list">
        <?php
          include('../../_PHP/_resumo/resumoMes.php');
        ?>
      </ul>
    </div>
    <footer class="footer"></footer>
    <script src="../../_js/_menu/menu.js"></script> 
  </div>
</body>
</html>
