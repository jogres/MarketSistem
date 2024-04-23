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
            <td><strong>Nombre del Empledao</strong></td>
            <td><strong>DNI del Empleado</strong></td>
            <td><strong>Dirección</strong></td>
            <td><strong>Telefono</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Credenciales de Acceso</strong></td>
            <td><strong>Cargo</strong></td>
            
          </tr>
          
            <?php 
              include('../../_PHP/_stoc/listFun.php');
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