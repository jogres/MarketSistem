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
        <form method="post" action="../../_PHP/_cad/cadFun.php">
          <fieldset>
            <p>
              <label for="NomeFun">Apellido: </label>
              <input class="search-input" type="text" name="NomeFun" id="NomeFun" required>
            </p>
            <p>
              <label for="Dni">DNI: </label>
              <input class="search-input" type="text" name="Dni" id="Dni" required>
            </p>
            <p>
              <label for="EndFun">Dirección: </label>
              <input class="search-input" type="text" name="EndFun" id="EndFun" required>
            </p>
            <p>
              <label for="NumFun">Número del empleado: </label>
              <input class="search-input" type="text" name="NumFun" id="NumFun" required>
            </p>
            <p>
              <label for="EmailFun">E-MAIL del empleado: </label>
              <input class="search-input" type="email" name="EmailFun" id="EmailFun" required>
            </p>
            <p>
              <label for="CredAces">Clave de acceso: </label>
              <input class="search-input" type="number" name="CredAces" id="CredAces" required>
            </p>
            <p>
              <label for="CargoFun">Puesto: </label>
              <div class="radio-group">
                <label><input type="radio" name="CargoFun" value="admin" required> Gerente</label>
                <label><input type="radio" name="CargoFun" value="usuario" required> Empleado</label>
              </div>
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
