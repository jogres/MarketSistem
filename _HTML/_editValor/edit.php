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
  <link rel="stylesheet" href="../../_CSS/_cad/editGeral.css"> <!-- Link para o arquivo CSS -->
</head>
<body>
  <div class="main-container">
    
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
    
    <div class="content-container">
      <div class="table-container">
        <table class="data-table" border="1">
          <thead>
            <tr>
              <th><strong>Nombre del producto</strong></th>
              <th><strong>Provedor</strong></th>
              <th><strong>Descripción del producto</strong></th>
              <th><strong>Cantidad</strong></th>
              <th><strong>Código de barras</strong></th>
              <th><strong>Precio</strong></th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('../../_PHP/_cad/_editiValor/edit.php');
            ?>
          </tbody>
        </table>
      </div>
      <form class="edit-form" method="post" action="../../_PHP/_cad/_editiValor/editValor.php">
        <fieldset class="form-fieldset">
          <p>
            <?php
              $id = $_GET['param'];
              echo '<input type="hidden" name="id" value="' . $id . '">';
            ?>
            <label class="form-label" for="Porcent">Aumento Porcentual: </label>
            <input class="form-input" type="number" name="Porcent" id="Porcent">
          </p>
        </fieldset>
        <div class="form-buttons">
          <button class="form-button" type="submit" name="add">Agregar</button>
          <button class="form-button" type="submit" name="sub">Subtrair</button>
        </div>
      </form>
    </div>
    <footer class="page-footer"></footer>
  </div>
  <script src="../../_js/_menu/menu.js"></script>  
</body>
</html>
