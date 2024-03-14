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
      <nav></nav>
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