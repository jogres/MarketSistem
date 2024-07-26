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
  <link rel="stylesheet" href="../../_CSS/_stoc/list.css">
</head>
<body>
  <div class="container">
      <nav class="main-nav">
        <button class="menu-toggle">☰</button>
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
    <div class="content">
      <div class="table-container">
        <table class="data-table">
          <thead>
            <tr>
              <th>Nombre del Empleado</th>
              <th>DNI del Empleado</th>
              <th>Dirección</th>
              <th>Telefono</th>
              <th>Email</th>
              <th>Credenciales de Acceso</th>
              <th>Cargo</th>
            </tr>
          </thead>
          <tbody>
            <?php 
              include('../../_PHP/_stoc/listFun.php');
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <footer class="footer">
      <!-- Conteúdo do rodapé -->
    </footer>
    <script src="../../_js/_menu/menu.js"></script> 
  </div>  
</body>
</html>
