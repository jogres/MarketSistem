<?php
session_start();

// Adicione essa parte para exibir mensagens de erro
$error = $_SESSION['error'] ?? '';
unset($_SESSION['error']); // Limpa a mensagem após exibi-la
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../../_CSS/_valid/login.css"> <!-- Atualize com o caminho correto -->
</head>
<body>
  <div class="login-container">
    <?php if ($error): ?>
      <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form action="../../_PHP/_valid/checklogin.php" method="post" class="login-form">
      <fieldset class="login-fieldset">
        <legend class="login-legend">Clave de Acesso</legend>
        <input type="text" id="ident" name="ident" class="login-input">
      </fieldset>
      <button type="submit" id="verifca" name="verifica" class="login-button">Enviar</button>
    </form>
  </div>
</body>
</html>
