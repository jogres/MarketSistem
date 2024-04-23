<?php
  include('../../_PHP/_venda/buscaPreenche.php');
  include('../../_PHP/_valid/logado.php');
  include('../../_PHP/_venda/remover.php');
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
        <button type="submit" id="codV" name="codV">Encontar</button>
      </form>
      
    </div>
    <div>
      <form action="../../_PHP/_venda/envVenda.php" method="post">
        
        <fieldset>
          <fieldset>  
        
            <input type="datetime-local" id="data" name="data" readonly><br/>
            <textarea name="pdV" id="pdV" cols="100" rows="10" readonly><?php
                 // Exibir produtos armazenados na variável de sessão
                foreach ($_SESSION['produtos'] as $key => $produto) {
                  if($key > 0){
                    echo "\n";
                  }
                  echo $produto ;
                }             
            ?></textarea>
          </fieldset>
          <input type="hidden" name="nome" id="nome" value="<?php echo $nome;?>">
          <input type="hidden" name="empresa" id="empresa" value="text">
          <input type="hidden" name="cred" id="cred" value="<?php echo $cred;?>">
          <fieldset>

            <input type="text"  name="total" id="total" value="<?php echo $total; ?>" readonly>
            <input type="text"  name="troco" id="troco" value="<?php echo $troco; ?>" readonly>
          </fieldset>
          <input type="hidden" name="submitted" value="1">
          <button type="submit">Imprimir</button>
        </fieldset>
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
      </form>
      
      <div>
        <form action="venda.php" method="get">
          <input type="text" name="pago" id="pago">
          <?php
             
          ?>
        </form>  
      </div>
    </div>
    <div>
      <footer></footer>
    </div>
  </div>
  <script>
      window.onload = function() {
            document.getElementById("busca").focus();
        };
     history.replaceState({}, document.title, window.location.pathname);
  </script>
              
</body>
</html>