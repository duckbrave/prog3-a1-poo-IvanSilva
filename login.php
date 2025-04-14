<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <p class="brazino-text">É o brazino, o jogo da galera!</p>
        <h1>Login</h1>
        <?php if (isset($_GET['cadastro_sucesso'])): ?>
            <p class="success-message">Cadastro realizado com sucesso! Faça login.</p>
        <?php endif; ?>
        <?php if (isset($_GET['login_falha'])): ?>
            <p class="error-message">E-mail ou senha incorretos.</p>
        <?php endif; ?>
        <form action="processa_login.php" method="post">
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($_COOKIE['lembrar_email']) ? $_COOKIE['lembrar_email'] : ''; ?>" required>
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div>
                <input type="checkbox" id="lembrar_email" name="lembrar_email">
                <label for="lembrar_email">Lembrar e-mail</label>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <p><a href="cadastro.php">Não possui uma conta? Cadastre-se.</a></p>
    </div>
</body>
</html>