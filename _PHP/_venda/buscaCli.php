<?php
    session_start(); 
    $conn = new mysqli("localhost", "root", "", "market");
    $codCli = $_GET['cli'];
    $sql = mysqli_query($conn, "SELECT cadcli.* FROM cadcli WHERE cadcli.Dni = '$codCli'");
    $list = mysqli_fetch_assoc($sql);
    
    
    $_SESSION['cliname'] = $list['NomeCli'];
    header('location: ../../_HTML/_venda/venda.php');
?>    