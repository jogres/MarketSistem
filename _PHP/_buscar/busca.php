<?php
  session_start();
  include('../_valid/logado.php');
  $conn = new mysqli("localhost", "root", "", "market");
  $termo = $_GET['busca'];
  
  $sql = mysqli_query($conn, "SELECT cadprod.*, cadfor.NomeFor FROM cadprod INNER JOIN cadfor ON cadprod.idFor = cadfor.idFor WHERE cadprod.NomeProd LIKE '%$termo%' OR cadprod.DesProd LIKE '%$termo%' OR cadprod.CodBar LIKE '%$termo%' OR cadfor.NomeFor LIKE '%$termo%'");

  if (!$sql) {
    die("Error en la consulta: " . mysqli_error($conn));
  }

  // Comezo del HTML
  echo '<!DOCTYPE html>';
  echo '<html lang="es-ar">';
  echo '<head>';
  echo '  <meta charset="UTF-8">';
  echo '  <meta name="viewport" content="width=device-width, initial-scale=1.0">';
  echo '  <title>Registro</title>';
  echo '  <link rel="stylesheet" href="../../_CSS/menu/menu.css">'; // Vincule el CSS aquí
  echo '  <link rel="stylesheet" href="../../_CSS/_stoc/list.css">'; // Vincule el CSS aquí
  echo '</head>';
  echo '<body>';

  // Contenido del HTML generado dinámicamente
  if(isset($_GET['encontra']) && $nivel=='admin'){ 
    echo '<div class="container">';
    echo '  <nav class="main-nav">';
    echo '    <button class="menu-toggle">☰</button>';
    echo '    <ul class="nav-links">';
    echo '      <li><a href="../../_HTML/_cad/cadProd.php" class="nav-link">Registro de Productos</a></li>';
    echo '      <li><a href="../../_HTML/_cad/cadFun.php" class="nav-link">Registro de Empleados</a></li>';
    echo '      <li><a href="../../_HTML/_cad/cadFor.php" class="nav-link">Registro de Proveedores</a></li>';
    echo '      <li><a href="../../_HTML/_stoc/stoc.php" class="nav-link">Productos</a></li>';
    echo '      <li><a href="../../_HTML/_venda/venda.php" class="nav-link">Vender</a></li>';
    echo '    </ul>';
    echo '    <div class="nav-user-actions">';
    echo '      <span class="user-name">' . $nomeP . '</span>';
    echo '      <form class="logout-form" action="../../_PHP/_valid/deslogar.php" method="post">';
    echo '        <button class="logout-button" type="submit">Salir</button>';
    echo '      </form>';
    echo '    </div>';
    echo '  </nav>';

    echo '  <div class="content">';
    echo '    <table class="data-table" border="1">';
    echo '      <thead>';
    echo '        <tr>';
    echo '          <th><strong>Nombre del producto</strong></th>';
    echo '          <th><strong>Proveedor</strong></th>';
    echo '          <th><strong>Descripción del producto</strong></th>';
    echo '          <th><strong>Cantidad</strong></th>';
    echo '          <th><strong>Código de barras</strong></th>';
    echo '          <th><strong>Costo</strong></th>';
    echo '          <th><strong>Precio</strong></th>';
    echo '          <th><strong>Total</strong></th>';
    echo '        </tr>';
    echo '      </thead>';
    echo '      <tbody>';

    while($linha=mysqli_fetch_assoc($sql)){
      echo '        <tr>';
      echo '          <td><a href="../../_HTML/_editValor/editProd.php?param='. $linha["idProd"].'">' . $linha["NomeProd"] . '</a></td>';
      echo '          <td><a href="../../_HTML/_editValor/edit.php?param='. $linha["idFor"].'">' . $linha["NomeFor"] . '</a></td>';
      echo '          <td>' . $linha["DesProd"] . '</td>';
      echo '          <td>' . $linha["ContProd"] . '</td>';
      echo '          <td>' . $linha["CodBar"] . '</td>';
      echo '          <td>$ ' . number_format($linha["Custo"], 2) . '</td>';
      echo '          <td>$ ' . number_format($linha["Preco"], 2) . '</td>';
      echo '          <td>$ ' . number_format($linha["Total"], 2) . '</td>';
      echo '        </tr>';
    }

    echo '      </tbody>';
    echo '    </table>';
    echo '  </div>';
    echo ' <footer class="footer">';
    echo ' </footer>';
    echo ' <script src="../../_js/_menu/menu.js"></script> ';
    echo '</div>';
  }

  if(isset($_GET['encontra']) && $nivel=='usuario'){ 
    echo '<div class="container">';
    echo '  <nav class="main-nav">';
    echo '    <button class="menu-toggle">☰</button>';
    echo '    <ul class="nav-links">';
    echo '      <li><a href="../../_HTML/_stoc/stoc.php" class="nav-link">Productos</a></li>';
    echo '      <li><a href="../../_HTML/_venda/venda.php" class="nav-link">Vender</a></li>';
    echo '    </ul>';
    echo '    <div class="nav-user-actions">';
    echo '      <span class="user-name">' . $nomeP . '</span>';
    echo '      <form class="logout-form" action="../../_PHP/_valid/deslogar.php" method="post">';
    echo '        <button class="logout-button" type="submit">Salir</button>';
    echo '      </form>';
    echo '    </div>';
    echo '  </nav>';

    echo '  <div class="content">';
    echo '    <table class="data-table" border="1">';
    echo '      <thead>';
    echo '        <tr>';
    echo '          <th><strong>Nombre del producto</strong></th>';
    echo '          <th><strong>Proveedor</strong></th>';
    echo '          <th><strong>Descripción del producto</strong></th>';
    echo '          <th><strong>Cantidad</strong></th>';
    echo '          <th><strong>Código de barras</strong></th>';
    echo '          <th><strong>Precio</strong></th>';
    echo '        </tr>';
    echo '      </thead>';
    echo '      <tbody>';

    while($linha=mysqli_fetch_assoc($sql)){
      echo '        <tr>';
      echo '          <td>' . $linha["NomeProd"] . '</td>';
      echo '          <td>' . $linha["NomeFor"] . '</td>';
      echo '          <td>' . $linha["DesProd"] . '</td>';
      echo '          <td>' . $linha["ContProd"] . '</td>';
      echo '          <td>' . $linha["CodBar"] . '</td>';
      echo '          <td>$ ' . number_format($linha["Preco"], 2) . '</td>';
      echo '        </tr>';
    }

    echo '      </tbody>';
    echo '    </table>';
    echo '  </div>';
    echo ' <footer class="footer">';
    echo ' </footer>';
    echo ' <script src="../../_js/_menu/menu.js"></script> ';
  }
  
  
  

    if(isset($_GET['codV'])){
      while($linha=mysqli_fetch_assoc($sql)){
        $idProd = $linha['idProd'];        
        $NomeProd = $linha["NomeProd"];
        $preco = $linha["Preco"];
        $qtd = 01;             
      }
    
      $list = mysqli_query($conn, "select cadprod.idFor, cadprod.idProd,cadprod.NomeProd, CadFor.NomeFor, cadprod.DesProd, cadprod.ContProd, cadprod.CodBar, cadprod.Custo, cadprod.Preco, cadprod.total FROM CadFor INNER JOIN CadProd ON CadFor.idfor = CadProd.idfor WHERE CadProd.idProd = $idProd;");
      $cont = mysqli_fetch_assoc($list);
      if($cont['ContProd'] > 0){
         $url ="../../_HTML/_venda/venda.php?produto=". urlencode($NomeProd)."&preco=".urlencode($preco)."&quantidade=".urldecode($qtd)."&id=".urldecode($idProd);
         header("location:". $url);
      }else{
        $url ="../../_HTML/_venda/venda.php?"."&cont=".urldecode($cont['ContProd']);
        header("location:". $url);
      }   
    }

    if(isset($_GET['codD'])){
      while($linha=mysqli_fetch_assoc($sql)){
        $idProd = $linha['idProd'];        
        $NomeProd = $linha["NomeProd"];
        $preco = $linha["Preco"];
        $codB = $linha['CodBar'];
      }
      $url ="../../_HTML/_venda/devo.php?produto=". urlencode($NomeProd)."&preco=".urlencode($preco)."&id=".urldecode($idProd)."&codbar=".urldecode($codB);
      header("location:". $url);
    }

  // Cierre del HTML
  echo '</body>';
  echo '</html>';
?>
