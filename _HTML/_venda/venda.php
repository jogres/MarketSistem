<?php
  // Iniciar ou resumir a sessão
  session_start(); // Destruir a sessão

  // Verificar se há uma variável de sessão para os produtos
  if (!isset($_SESSION['produtos'])) {
      $_SESSION['produtos'] = array();
  }
  $total = isset($_SESSION['total']) ? $_SESSION['total'] : 0;

  if (isset($_GET['produto'], $_GET['preco'], $_GET['quantidade'])) {
    $produto = $_GET['produto'];
    $preco = $_GET['preco'];
    $quantidade = $_GET['quantidade'];

    // Adicionar novo produto à variável de sessão
    $_SESSION['produtos'][] = "$produto | $" . number_format($preco, 2) . " | $quantidade";
    $total += $preco;
    $_SESSION['total']=$total;
  }

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
          <li><a href="../_cad/cadProd.php">Registro Produtos</a></li>
          <li><a href="../_cad/cadFun.php">Registro Empleados</a></li>
          <li><a href="../_cad/cadFor.php">Registro Provedores</a></li>
          <li><a href="../_stoc/stoc.php">Produtos</a></li>
          <li><a href=""></a></li>
        </ul>
      </nav>
    </div>
    <div>
      <form action="../../_PHP/_buscar/busca.php" method="GET">
        <input type="number" id="busca" name="busca" placeholder="Busqueda...">
        <button type="submit" id="codV" name="codV">Encontar</button>
      </form>
    </div>
    <div>
      <form action="" method="post">
        
        <fieldset>
          <fieldset>  
        
            <input type="datetime-local" id="data" name="data" readonly><br/>
            <textarea name="pdV" id="pdV" cols="100" rows="100" readonly><?php
                 // Exibir produtos armazenados na variável de sessão
                foreach ($_SESSION['produtos'] as $key => $produto) {
                  if($key > 0){
                    echo "\n";
                  }
                  echo $produto ;
                }             
            ?></textarea>
          </fieldset>
          <fieldset>

            <input type="number" min="0.00" step="0.01" name="total" id="total" value="<?php echo $total; 
            ?>" readonly>
          </fieldset>
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
      
      
    </div>
    <div>
      <footer></footer>
    </div>
  </div>
  <script>
     // Limpar a URL removendo os parâmetros
     history.replaceState({}, document.title, window.location.pathname);
  </script>
              
</body>
</html>