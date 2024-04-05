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
          <li><a href="cadProd.php">Registro Produtos</a></li>
          <li><a href="cadFun.php">Registro Empleados</a></li>
          <li><a href="cadFor.php">Registro Provedores</a></li>
          <li><a href="../_stoc/stoc.php">Produtos</a></li>
          <li><a href=""></a></li>
        </ul>
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