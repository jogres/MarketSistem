<?php
session_start();

// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "", "market");

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recuperar o identificador de acesso do formulário
$ident = $_POST['ident'];

// Preparar e executar a consulta
$sql = mysqli_query($conn, "SELECT CredAces, CargoFun, 
    SUBSTRING_INDEX(NomeFun,' ',1) AS primeiroNome, NomeFun 
    FROM cadfun WHERE CredAces = '$ident'");

// Verificar se algum usuário foi encontrado
if (mysqli_num_rows($sql) > 0) {
    // Definir as variáveis de sessão com os dados do usuário
    while ($linha = mysqli_fetch_assoc($sql)) {
        $_SESSION['nomeFunP'] = $linha['primeiroNome'];
        $_SESSION['nomeFun'] = $linha['NomeFun'];
        $_SESSION['cred'] = $linha['CredAces'];
        $_SESSION['nivel'] = $linha['CargoFun'];
    }
    // Redirecionar para a página de venda
    header('Location: ../../_HTML/_venda/venda.php');
    exit;
} else {
    // Definir uma mensagem de erro na sessão
    $_SESSION['error'] = 'Nenhum usuário encontrado com o identificador fornecido';
    // Redirecionar de volta para a página de login
    header('Location: ../../_HTML/_valid/login.php'); // Atualize com o caminho correto
    exit;
}

// Fechar a conexão
$conn->close();
?>
