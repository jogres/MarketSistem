<?php
  session_start();
  include('../_valid/logado.php');
  $conn = new mysqli("localhost", "root", "", "market");
  $termo = $_GET['busca'];
  
  $sql = mysqli_query($conn, "SELECT cadprod.*, cadfor.NomeFor FROM cadprod  INNER JOIN cadfor  ON cadprod.idFor = cadfor.idFor WHERE cadprod.NomeProd LIKE '%$termo%' OR cadprod.DesProd LIKE '%$termo%' OR cadprod.CodBar LIKE '%$termo%' OR cadfor.NomeFor LIKE '%$termo%'");

  if (!$sql) {
    die("Erro na consulta: " . mysqli_error($conn));
  }
  
  if(isset($_GET['encontra']) && $nivel=='admin'){ 
    
    echo"<div>";
    echo"<nav>";
    echo"<ul>";
    echo"<li><a href='../../_HTML/_cad/cadProd.php'>Registro Produtos</a></li>";
    echo"<li><a href='../../_HTML/_cad/cadFun.php'>Registro Empleados</a></li>";
    echo"<li><a href='../../_HTML/_cad/cadFor.php'>Registro Provedores</a></li>";
    echo"<li><a href='../../_HTML/_stoc/stoc.php'>Produtos</a></li>";
    echo"<li><a href='../../_HTML/_venda/venda.php'>Vender</a></li>";
    echo"</ul>";
    echo"<div>";
    echo $nomeP;
    echo"<form action='../../_PHP/_valid/deslogar.php' method='post'>";
    echo"<button type='submit'>Salir</button>";
    echo"</form>";
    echo"</div>";
    echo"</nav>";
    echo"</div>";

    echo "<div>";
    echo "<table border='1'>";
    echo"<tr>";
    echo"<td><strong>Nombre del producto</strong></td>";
    echo"<td><strong>Provedor</strong></td>";
    echo"<td><strong>Descripción del producto</strong></td>";
    echo"<td><strong>Cantidad</strong></td>";
    echo"<td><strong>Código de barras</strong></td>";
    echo"<td><strong>Costo Unitario</strong></td>";
    echo"<td><strong>Costo</strong></td>";
    echo"<td><strong>Precio Unitario</strong></td>";
    echo"<td><strong>Precio</strong></td>";
    echo"<td><strong>Total</strong></td>";
    
    echo"</tr>";

    while($linha=mysqli_fetch_assoc($sql)){
      
      
      echo "<tr>";
      echo "<td><a href='../../_HTML/_editValor/editProd.php?param=". $linha["idProd"]."'>". $linha["NomeProd"]."</a></td>";
      echo "<td><a href='../../_HTML/_editValor/edit.php?param=". $linha["idFor"]."'>". $linha["NomeFor"] ."</a></td>";
      echo "<td>". $linha["DesProd"] ."</td>";
      echo "<td>". $linha["ContProd"] ."</td>";
      echo "<td>". $linha["CodBar"] ."</td>";
      echo "<td>$ ". number_format($linha["Cuni"],2) ."</td>";
      echo "<td>$ ". number_format($linha["Custo"],2) ."</td>";
      echo "<td>$ ". number_format($linha["Puni"],2) ."</td>";
      echo "<td>$ ". number_format($linha["Preco"],2) ."</td>";
      echo "<td>$ ". number_format($linha["Total"],2) ."</td>";
      echo "<tr/>";
      
     
    }
    echo "</table>";
    echo "</div>";
  }
  if(isset($_GET['encontra']) && $nivel=='usuario'){ 
    
    echo"<div>";
    echo"<nav>";
    echo"<ul>";
    echo"<li><a href='../../_HTML/_stoc/stoc.php'>Produtos</a></li>";
    echo"<li><a href='../../_HTML/_venda/venda.php'>Vender</a></li>";
    echo"</ul>";
    echo"<div>";
    echo $nomeP;
    echo"<form action='../../_PHP/_valid/deslogar.php' method='post'>";
    echo"<button type='submit'>Salir</button>";
    echo"</form>";
    echo"</div>";
    echo"</nav>";
    echo"</div>";

    echo "<div>";
    echo "<table border='1'>";
    echo"<tr>";
    echo"<td><strong>Nombre del producto</strong></td>";
    echo"<td><strong>Provedor</strong></td>";
    echo"<td><strong>Descripción del producto</strong></td>";
    echo"<td><strong>Cantidad</strong></td>";
    echo"<td><strong>Código de barras</strong></td>";
    echo"<td><strong>Precio</strong></td>";
    echo"</tr>";
   
    while($linha=mysqli_fetch_assoc($sql)){
      
      echo "<tr>";
      echo "<td>". $linha["NomeProd"]."</td>";
      echo "<td>". $linha["NomeFor"] ."</td>";
      echo "<td>". $linha["DesProd"] ."</td>";
      echo "<td>". $linha["ContProd"] ."</td>";
      echo "<td>". $linha["CodBar"] ."</td>";
      echo "<td>$ ". number_format($linha["Preco"],2) ."</td>";
      echo "<tr/>";
     
    }
    echo "</table>";
    echo "</div>";
  }
  if(isset($_GET['codV'])){
    while($linha=mysqli_fetch_assoc($sql)){
      $idProd = $linha['idProd'];        
      $NomeProd = $linha["NomeProd"];
      $preco = $linha["Preco"];
      $qtd = 01;             
    }
    $url ="../../_HTML/_venda/venda.php?produto=". urlencode($NomeProd)."&preco=".urlencode($preco)."&quantidade=".urldecode($qtd)."&id=".urldecode($idProd);
    header("location:". $url);
  }
?>