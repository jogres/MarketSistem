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
          <li><a href="../_cad/cadProd.php">Registrar Produtos</a></li>
          <li><a href="../_cad/cadFun.php">Registrar Empleados</a></li>
          <li><a href="../_cad/cadFor.php">Registrar Provedores</a></li>
          <li><a href="../_stoc/stoc.php">Produtos</a></li>
          <li><a href="../_venda/venda.php">Vender</a></li>
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
        <form method="post" action="../../_PHP/_cad/_editiValor/editPenv.php">
          <fieldset>
            
            <?php
              include('../../_PHP/_cad/_editiValor/editProd.php');
            ?>
                        
          </fieldset>
          <div>
            <button type="submit" name="submit" >guardar</button>
            
          </div>
        </form>
      </div>
    </div>
    <div>
      <footer></footer>
    </div>
  </div>  
</body>
</html>