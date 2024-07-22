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
        }
      ?>
      <textarea name="view" id="view">
        <?php
          echo $produto. " | " .$preco;
        ?>
      </textarea>
      <input type="text" name="produto" id="produto" value="<?php echo $produto;?>">
      <input type="text" name="preco" id="preco" value="<?php echo $preco;?>">
      <input type="text" name="id" id="id" value="<?php echo $id;?>">
    </form>
    <script>
      // Obtenha a data e hora atuais
      const now = new Date();
          
      // Formate a data e hora para o formato adequado
      const year = now.getFullYear();
      const month = String(now.getMonth() + 1).padStart(2, '0'); // adiciona zero à esquerda, se necessário
      const day = String(now.getDate()).padStart(2, '0');
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const formattedDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
          
      // Defina a data e hora atual no campo de data
      document.getElementById('data').value = formattedDateTime; 
                  
                  
    </script>   
    
    <div>
      <footer></footer>
    </div>
  </div>
  
              
</body>
</html>