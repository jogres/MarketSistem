<?php 
  session_start();
  
  $conn = new mysqli("localhost", "root", "", "market");

  $DataV = $_POST['data'];
  $ProdV = $_POST['pdV'];
  $NomeFun = $_POST['nome'];
  $Nome= $_POST['empresa'];
  $CredAcesV = $_POST['cred'];
  $Total = $_POST['total'];
  $Troco = $_POST['troco'];
  $nomeCli = $_POST['nomeCli'];
  $produtos = explode("\n", $ProdV);
  
  if (isset($_POST['submitted'])) {
    if(isset($_POST['Fim'])){
       $cont_ids = array_count_values($_SESSION['id_temp']);
       

       foreach($cont_ids as $id => $quantidade){
         echo $id . "<br>";
         $edit = mysqli_query($conn, "SELECT cadprod.idProd, cadprod.ContProd, cadprod.Preco, cadprod.NomeProd FROM cadprod WHERE cadprod.idProd = '$id'");
         if($campo = mysqli_fetch_array($edit)){
           $nome = $campo['NomeProd'];
           $preco = $campo['Preco'];
           $totalD = $preco * $quantidade;
           mysqli_query($conn,"insert into vendad (DataV, ProdV, qt, Preco, TotalD) value('$DataV','$nome','$quantidade','$preco','$totalD')");
         }
        
       }
       $_SESSION['id_temp'] = array();
    } 
    

    $printer = fopen("COM1", "w"); // Supondo que a impressora esteja na porta COM1

    if ($printer) {
        // Configurar impressora: Definir largura de impressão, alinhar e formatar
        fwrite($printer, "\x1B\x40"); // Inicializar impressora (ESC @)
        fwrite($printer, "\x1B\x61\x01"); // Alinhar centro (ESC a 1)

        // Imprimir cabeçalho com o nome da empresa
        fwrite($printer, $Nome . "\n");
        fwrite($printer, "Data: " . $DataV . "\n");
        fwrite($printer, "Cliente: " . $nomeCli . "\n");
        fwrite($printer, "------------------------------\n");

        // Imprimir produtos formatados
        fwrite($printer, "\x1B\x61\x00"); // Alinhar à esquerda (ESC a 0)
        foreach ($produtos as $produto) {
            // Exemplo de formatação: Qtd Nome Prod ..... Preço
            // Exemplo: 2x Produto A ........... R$ 10,00
            fwrite($printer, $produto . "\n");
        }

        // Imprimir total e troco
        fwrite($printer, "------------------------------\n");
        fwrite($printer, "Total: R$ " . $Total . "\n");
        fwrite($printer, "Troco: R$ " . $Troco . "\n");
        fwrite($printer, "------------------------------\n");

        // Finalizar impressão
        fwrite($printer, "\x1D\x56\x01"); // Cortar papel (GS V 1)
        fclose($printer);
    } else {
        echo "Erro ao conectar com a impressora.";
    }

    if(isset($_POST['submitte'])){
      foreach ($_SESSION['id'] as $id) {
        $edit = mysqli_query($conn, "SELECT cadprod.idProd, cadprod.ContProd, cadprod.Preco FROM cadprod WHERE cadprod.idProd= '$id'");
        $campo = mysqli_fetch_array($edit);
        $Cont = $campo['ContProd'] - 1;      
        $totalN = $Cont * $campo['Preco'];
        mysqli_query($conn, "UPDATE cadprod SET ContProd = '$Cont', total = '$totalN' WHERE  idProd = '$id'");

      }
    
      $_SESSION['id'] = array();
  
  


  
      mysqli_query($conn,"insert into venda (DataV, ProdV, CredAcesV, Nome, NomeFun, Total, Troco) value('$DataV','$ProdV','$CredAcesV','$Nome','$NomeFun','$Total', '$Troco')");
      
    }
    unset($_SESSION['produtos']);
    $_SESSION['total']=0;
    header('location: ../../_HTML/_venda/venda.php');
  }  
?>