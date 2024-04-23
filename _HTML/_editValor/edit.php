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