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
        <form method="post" action="../../_PHP/_cad/_cadProd/cadProd.php">
          <fieldset>
            <p>
              <label for="NomeProd">Nombre del producto: </label> 
              <input type="text" id="NomeProd" name="NomeProd">
            </p>
            <p>
              <label for="idFor">Proveedor: </label> 
              <select name="idFor" id="idFor">
                <?php

                  include ('../../_PHP/_cad/_cadProd/busca.php');

                ?>
               
                
              </select>
                
            </p>
            <p>
              <label for="DesProd">Descripción del producto: </label> 
              <textarea name="DesProd" id="DesProd" cols="20" rows="5"></textarea>
            </p>
            <p>
              <label for="ContProd">Cantidad: </label>
               <input type="number" id="ContProd" name="ContProd">
              </p>    
            <p>
              <label for="CodBar">Código de barras: </label> 
              <input type="text" id="CodBar" name="CodBar">
            </p>
            <p>
              <label for="Preco">Precio: </label>
              <input type="number" min="0.00" step="0.01" id="Preco" name="Preco">
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