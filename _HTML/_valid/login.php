<?php
  // Verifica se a sessão está ativa
  session_start();
  if (isset($_SESSION['nivel'])) {
      // Sessão está ativa, redireciona para outra página
      header('Location: ../_venda/venda.php');
      exit; // Certifique-se de sair para evitar a execução de mais código
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
    <form action="../../_PHP/_valid/checklogin.php" method="post">
      <div>
        <fieldset>
          <label for="ident">Clave de Acesso</label><br>
          <input type="text" id="ident" name="ident">
        </fieldset>
        <button type="submit" id="verifca" name="verifica">Enviar</button>
      </div>
    </form>
</body>
</html>