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
      <div>
        <table border="1">
          <tr>
            <td><strong>Nombre del Fornecedor</strong></td>
            <td><strong>CUIT</strong></td>
            <td><strong>Telefono</strong></td>
            <td><strong>Email del Fornecedor</strong></td>
            
            
          </tr>
          
            <?php 
              include('../../_PHP/_stoc/listFor.php');
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