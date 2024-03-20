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
          <li><a href="stoc.php">Produtos</a></li>
          <li><a href=""></a></li>
        </ul>
      </nav>
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