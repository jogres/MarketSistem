<?php 
  if(isset($_GET['param'])){
    $param = $_GET['param'];
  }
  $conn = new mysqli("localhost", "root", "", "market");
  $edit = mysqli_query($conn, "SELECT cadprod.idFor, cadprod.NomeProd, cadfor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Preco FROM cadfor INNER JOIN cadprod ON cadfor.idfor = CadProd.idfor WHERE CadProd.idProd = '$param'");
  
  while($campo=mysqli_fetch_array($edit)){
    echo "<p>";
    echo "<label for='NomeProd'>Nombre del producto: </label> ";
    echo "<input type='text' id='NomeProd' name='NomeProd' value='".$campo["NomeProd"]."'>";
    echo "</p>";
    echo "<p>";
    echo "<label for='idFor'>Proveedor: </label>";
    echo "<select name='idFor' id='idFor'>";
    echo "<option value='".$campo["idFor"]."'>".$campo["NomeFor"]."</option>";
    echo "</select>";
    echo "</p>";
    echo "<p>";
    echo "<label for='DesProd'>Descripción del producto: </label>";
    echo "<textarea name='DesProd' id='DesProd' cols='20' rows='5' value='".$campo["DesProd"]."'>".$campo["DesProd"]."</textarea>";
    echo "</p>";
    echo "<p>";
    echo "<label for='ContProd'>Cantidad: </label>";
    echo "<input type='number' id='ContProd' name='ContProd' value='".$campo["ContProd"]."'disabled>";
    echo "+";
    echo "<input type='number' id='ContProd' name='ContProd' value='0'>";
    echo "</p> ";
    echo "<p>";
    echo "<label for='CodBar'>Código de barras: </label> ";
    echo "<input type='text' id='CodBar' name='CodBar' value='".$campo["CodBar"]."'>";
    echo "</p>";
    echo "<p>";
    echo "<label for='Preco'>Precio: </label>";
    echo "<input type='number' min='0.00' step='0.01' id='Preco' name='Preco' value='".number_format($campo["Preco"],2)."'>";
    echo "</p>";
    echo'<input type="hidden" name="id" value='.$param.'>';
  }
?>