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
        <form method="post" action="../../_PHP/_cad/cadFor.php">
          <fieldset>
            <p>
              <label for="NomeFor">Nombre de la Empresa: </label>
              <input type="text" id="NomeFor" name="NomeFor">
            </p>
            <p>
              <label for="Cuit">CUIT de la empresa: </label>
              <input type="text" id="Cuit" name="Cuit">
            </p>
            <p>
              <label for="NumFor">Número de la empresa: </label>
              <input type="text" id="NumFor" name="NumFor">
            </p>
            <p>
              <label for="EmailFor">E-MAIL de la empresa: </label>
              <input type="text" id="EmailFor" name="EmailFor">
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