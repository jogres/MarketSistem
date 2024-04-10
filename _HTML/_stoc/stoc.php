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
            foreach($permis[$nivel] as $link){
              echo "<li><a href=\"$link\">".basename($link, ".php")."</a></li>";
            }
          ?>
        </ul>
      </nav>
    </div>
    <div>
      <form action="../../_PHP/_buscar/busca.php" method="GET">
        <input type="text" id="busca" name="busca" placeholder="Busqueda...">
        <button type="submit" id="encontra" name="encontra">Encontar</button>
      </form>
    </div>
    <div>
      <div>
        <table border="1">
          <tr>
            <td><strong>Nombre del producto</strong></td>
            <td><strong>Provedor</strong></td>
            <td><strong>Descripción del producto</strong></td>
            <td><strong>Cantidad</strong></td>
            <td><strong>Código de barras</strong></td>
            <td><strong>Precio</strong></td>
          </tr>
          
            <?php 
              include('../../_PHP/_stoc/stoc.php');
            ?>            
          
        </table>
        
      </div>
    </div>
    <div>
      <footer></footer>
    </div>
  </div>  
</body>
</html>