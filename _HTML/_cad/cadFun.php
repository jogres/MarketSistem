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
          <li><a href="cadProd.php">Registrar Produtos</a></li>
          <li><a href="cadFun.php">Registrar Empleados</a></li>
          <li><a href="cadFor.php">Registrar Provedores</a></li>
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
        <form method="post" action="../../_PHP/_cad/cadFun.php">
          <fieldset>
            <p>
              <label for="NomeFun">Apelido: </label>
              <input type="text" name="NomeFun" id="NomeFun">
            </p>
            <p>
              <label for="Dni"> DNI: </label>
              <input type="text" name="Dni" id="Dni">
            </p>
            <p>
              <label for="EndFun">Dirección: </label>
              <input type="text" name="EndFun" id="EndFun">
            </p>
            <p>
              <label for="NumFun">Número del empleado: </label>
              <input type="text" name="NumFun" id="NumFun">
            </p>
            <p>
              <label for="EmailFun">E-MAIL del empleado: </label>
              <input type="text" name="EmailFun" id="EmailFun">
            </p>
            <p>
              <label for="CredAces">Clave de acceso: </label>
              <input type="number" name="CredAces" id="CredAces">
            </p>
            <p>
              <label for="CargoFun">Puesto: </label>
              <input type="text" name="CargoFun" id="CargoFun">
            </p>
             
          </fieldset>
          <div>
            <button type="submit" name="submit">guardar</button>
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