<?php 
  if (isset($_GET['param'])) {
    $param = $_GET['param'];
  }

  $conn = new mysqli("localhost", "root", "", "market");
  $edit = mysqli_query($conn, "SELECT cadprod.idFor, cadprod.NomeProd, cadfor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Custo, cadprod.Preco FROM cadfor INNER JOIN cadprod ON cadfor.idfor = CadProd.idfor WHERE CadProd.idProd = '$param'");
  
  while ($campo = mysqli_fetch_array($edit)) {
    echo "<p>";
    echo "<label for='NomeProd'>Nombre del producto: </label>";
    echo "<input type='text' id='NomeProd' name='NomeProd' class='search-input' value='".$campo["NomeProd"]."'>";
    echo "</p>";

    echo "<p>";
    echo "<label for='idFor'>Proveedor: </label>";
    echo "<select name='idFor' id='idFor' class='search-select'>";
    echo "<option value='".$campo["idFor"]."'>".$campo["NomeFor"]."</option>";
    echo "</select>";
    echo "</p>";

    echo "<p>";
    echo "<label for='DesProd'>Descripción del producto: </label>";
    echo "<textarea name='DesProd' id='DesProd' class='search-textarea' cols='20' rows='5'>".$campo["DesProd"]."</textarea>";
    echo "</p>";

    echo "<p>";
    echo "<label for='ContProd'>Cantidad: </label>";
    echo "<input type='number' id='ContProd' name='ContProd' class='search-input' value='".$campo["ContProd"]."' disabled>";
    echo "+";
    echo "<input type='number' id='ContProd' name='ContProd' class='search-input' value='0'>";
    echo "</p>";

    echo "<p>";
    echo "<label for='CodBar'>Código de barras: </label>";
    echo "<input type='text' id='CodBar' name='CodBar' class='search-input' value='".$campo["CodBar"]."'>";
    echo "</p>";

    echo "<p>";
    echo "<label for='Custo'>Costo: </label>";
    echo "<input type='number' min='0.00' step='0.01' id='Custo' name='Custo' class='search-input' value='".$campo["Custo"]."'>";
    echo "</p>";

    echo "<p>";
    echo "<label for='Preco'>Precio: </label>";
    echo "<input type='number' min='0.00' step='0.01' id='Preco' name='Preco' class='search-input' value='".$campo["Preco"]."'>";
    echo "</p>";

    echo '<input type="hidden" name="id" value="'.$param.'">';
  }
?>
