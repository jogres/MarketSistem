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
  <link rel="stylesheet" href="../../_CSS/_venda/devo.css">
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
        <input class="search-input" type="number" id="busca" name="busca" placeholder="Búsqueda...">
        <button class="search-button" type="submit" id="codD" name="codD">Buscar</button>
      </form>
    </div>

    <form class="product-form" action="../../_PHP/_venda/devo.php" method="post">
      <input class="datetime-input" type="datetime-local" id="data" name="data" readonly>

      <?php
         $produto = ""; 
         $preco = ""; 
         $id = ""; 
         $codB = ""; 
        if(isset($_GET['produto'],$_GET['preco'],$_GET['id'],$_GET['codbar'])){
          $produto = $_GET['produto'];
          $preco = $_GET['preco'];
          $id = $_GET['id'];
          $codB = $_GET['codbar'];
        }
        
      ?>
      <textarea class="view-textarea" name="view" id="view">
        <?php echo $produto . "  " . $preco; ?>
      </textarea>
      <input type="hidden" name="produto" id="produto" value="<?php echo $produto; ?>">
      <input type="hidden" name="preco" id="preco" value="<?php echo $preco; ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
      <input type="hidden" name="codb" id="codb" value="<?php echo $codB; ?>">
      <button class="submit-button" type="submit">Ticket</button>
    </form>
    
    <footer class="footer"></footer>
    <script src="../../_js/_venda/data.js"></script>  
    <script src="../../_js/_menu/menu.js"></script> 
   
  </div>
</body>
</html>
