<?php
  session_start();
  include('../../_PHP/_valid/logado.php');
  if($nivel == 'usuario'){
    header('location: ../_venda/venda.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div>
    <div>
    <nav>
        <ul>
          <li><a href="../_cad/cadProd.php">Registrar Produtos</a></li>
          <li><a href="../_cad/cadFun.php">Registrar Empleados</a></li>
          <li><a href="../_cad/cadFor.php">Registrar Provedores</a></li>
          <li><a href="../_stoc/stoc.php">Produtos</a></li>
          <li><a href="../_venda/venda.php">Vender</a></li>
          <li><a href="resumoAno.php">Resumo</a></li>
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
    <table border="1">
          <tr>
            <td><strong>Data</strong></td>
            <td><strong>Nombre Del Empleado</strong></td>
            <td><strong>Credenciales Del Empleado</strong></td>
            <td><strong>Produtos Vendidos</strong></td>
            <td><strong>Total</strong></td>            
          </tr>
          
            <?php 
              include('../../_PHP/_resumo/resumo.php');
            ?>            
          
        </table>
    </div>
  </div>
</body>
</html>