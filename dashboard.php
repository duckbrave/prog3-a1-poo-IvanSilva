<?php
// /dashboard.php

require_once 'classes/Usuario.php';
require_once 'classes/Sessao.php';

Sessao::iniciar();

// Proteção de rota: verificar se o usuário está logado
if (!Sessao::get('usuario_id')) {
    header("Location: login.php");
    exit();
}

$nomeUsuario = Sessao::get('usuario_nome');
$emailCookie = $_COOKIE['lembrar_email'] ?? 'Nenhum e-mail lembrado.';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Painel do Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Painel do Usuário</h1>
        <div class="dashboard-info">
            <p><strong>Bem-vindo(a):</strong> <?php echo htmlspecialchars($nomeUsuario); ?></p>
            <p><strong>Seu e-mail:</strong> <?php echo htmlspecialchars(Sessao::get('usuario_id')); ?></p>
            <?php if (isset($_COOKIE['lembrar_email'])): ?>
                <p><strong>E-mail lembrado:</strong> <?php echo htmlspecialchars($emailCookie); ?></p>
            <?php endif; ?>
        </div>
        <form action="logout.php" method="post">
            <button type="submit">Sair</button>
        </form>
    </div>
</body>
</html>