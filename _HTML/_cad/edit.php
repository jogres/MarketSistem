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
        <div>
          
        </div>
        <form method="get" action="../../_PHP/_cad/edit.php">
          <fieldset>
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
                include('../../_PHP/_cad/edit.php');
              ?>
            </table>
            <p>
              <label for="Porcent">Aumento Porcentual: </label>
              <input type="number" name="Porcent" id="Porcent">
            </p>
            <input type="hidden" name="param" value="">
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