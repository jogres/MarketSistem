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
  <link rel="stylesheet" href="../../_CSS/menu/menu.css"> <!-- Link para o arquivo CSS -->
  <link rel="stylesheet" href="../../_CSS/_cad/cad.css"> <!-- Link para o arquivo CSS -->
</head>
<body>
  <div class="container"> <!-- Adiciona a classe container -->

    <nav class="main-nav"> <!-- Adiciona a classe main-nav -->
      <button class="menu-toggle">☰</button> <!-- Botão para menu lateral em dispositivos pequenos -->
      <ul class="nav-links"> <!-- Adiciona a classe nav-links -->
        <?php
          foreach ($menu as $link => $nome) {
            echo "<li class='nav-item'><a href=\"$link\" class='nav-link'>$nome</a></li>";
          }
        ?>  
      </ul>
      <div class="nav-user-actions"> <!-- Adiciona a classe nav-user-actions -->
        <span class="user-name"><?php echo $nomeP; ?></span>
        <form action="../../_PHP/_valid/deslogar.php" method="post" class="logout-form"> <!-- Adiciona a classe logout-form -->
          <button type="submit" class="logout-button">Salir</button> <!-- Adiciona a classe logout-button -->
        </form>
      </div>
    </nav>

    <div class="search-container"> <!-- Adiciona a classe search-container -->
      <form method="post" action="../../_PHP/_cad/_editiValor/editFev.php" class="search-form"> <!-- Adiciona a classe search-form -->
        <fieldset>
          <?php
            include('../../_PHP/_cad/_editiValor/editFun.php');
          ?>
        </fieldset>
        <div class="subbt"> <!-- Adiciona a classe subbt -->
          <button type="submit" class="search-button">Guardar</button> <!-- Adiciona a classe search-button -->
        </div>
      </form>
    </div>

    <footer class="footer"> <!-- Adiciona a classe footer -->
      <!-- Conteúdo do rodapé -->
    </footer>

  </div>
  <script src="../../_js/_menu/menu.js"></script>  
</body>
</html>
