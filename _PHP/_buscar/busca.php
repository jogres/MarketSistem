<?php
  $conn = new mysqli("localhost", "root", "", "market");
  $termo = $_GET['busca'];
  
  $sql = mysqli_query($conn, "SELECT cadprod.*, cadfor.NomeFor FROM cadprod  INNER JOIN cadfor  ON cadprod.idFor = cadfor.idFor WHERE cadprod.NomeProd LIKE '%$termo%' OR cadprod.DesProd LIKE '%$termo%' OR cadprod.CodBar LIKE '%$termo%' OR cadfor.NomeFor LIKE '%$termo%'");

  if (!$sql) {
    die("Erro na consulta: " . mysqli_error($conn));
  }


    echo"<div>";
    echo"<nav>";
    echo"<ul>";
    echo"<li><a href='../../_HTML/_cad/cadProd.php'>Registro Produtos</a></li>";
    echo"<li><a href='../../_HTML/_cad/cadFun.php'>Registro Empleados</a></li>";
    echo"<li><a href='../../_HTML/_cad/cadFor.php'>Registro Provedores</a></li>";
    echo"<li><a href='../../_HTML/_stoc/stoc.php'>Produtos</a></li>";
    echo"<li><a href=''></a></li>";
    echo"</ul>";
    echo"</nav>";
    echo"</div>";
  while($linha=mysqli_fetch_assoc($sql)){
    echo "<div>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<td><a href='../../_HTML/_editValor/edit.php?param=". $linha["idFor"]."'>". $linha["NomeProd"]."</a></td>";
    echo "<td><a href='../../_HTML/_editValor/editProd.php?param=". $linha["idProd"]."'>". $linha["NomeFor"] ."</a></td>";
    echo "<td>". $linha["DesProd"] ."</td>";
    echo "<td>". $linha["ContProd"] ."</td>";
    echo "<td>". $linha["CodBar"] ."</td>";
    echo "<td>". $linha["Preco"] ."</td>";
    echo "<tr/>";
    echo "</table>";
    echo "</div>";
  }
?>