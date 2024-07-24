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
</head>
<body>
  <div>
    <div>
      <nav>
        <ul>
          <?php
            foreach ($menu as $link => $nome) {
              echo "<li><a href=\"$link\">$nome</a></li>";
            }
          ?>
        </ul>
        <div>
          <?php 
           echo $nomeP;
            
          ?>
          <form action="../../_PHP/_valid/deslogar.php" method="post">
            <button type="submit">Salir</button>
          </form>
        </div>
      </nav>
    </div>
    <div>
      <form action="../../_PHP/_buscar/busca.php" method="GET">
        <input type="number" id="busca" name="busca" placeholder="Busqueda...">
        <button type="submit" id="codD" name="codD">Encontar</button>
      </form>
      
    </div>
    <form action="../../_PHP/_venda/devo.php" method="post">
      <input type="datetime-local" id="data" name="data" readonly>

      <?php
        $produto = ""; 
        $preco = ""; 
        $id = ""; 
        if(isset($_GET['produto'],$_GET['preco'],$_GET['id'])){
          $produto = $_GET['produto'];
          $preco = $_GET['preco'];
          $id = $_GET['id'];
          $codB = $_GET['codbar'];
        }
      ?>
      <textarea name="view" id="view">
        <?php
          echo $produto. " | " .$preco;
        ?>
      </textarea>
      <input type="hidden" name="produto" id="produto" value="<?php echo $produto;?>">
      <input type="hidden" name="preco" id="preco" value="<?php echo $preco;?>">
      <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
      <input type="hidden" name="codb" id="codb" value="<?php echo $codB;?>">
      <button type="submit">Tiket</button>
    </form>
    <div>
      <footer></footer>
    </div>
    <script src="../../_js/_venda/data.js"></script>   
  </div>
  
              
</body>
</html>