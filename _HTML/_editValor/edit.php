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
                include('../../_PHP/_cad/_editiValor/edit.php');
              ?>
            </table>
        </div>
        <form method="post" action="../../_PHP/_cad/_editiValor/editValor.php">
          <fieldset>
            
            <p>
              <?php
                
                $id = $_GET['param'];
                echo'<input type="hidden" name="id" value='.$id.'>';
              ?>
              <label for="Porcent">Aumento Porcentual: </label>
              <input type="number" name="Porcent" id="Porcent">
            </p>
            
          </fieldset>
          <div>
            <button type="submit" name="add" >agregar</button>
            <button type="submit" name="sub">subtrair</button>
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