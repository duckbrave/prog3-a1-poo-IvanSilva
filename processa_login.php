<?php
// /processa_login.php

require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

Sessao::iniciar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'];

    // Criar uma instância do Autenticador
    $autenticador = new Autenticador();
    // Tentar fazer o login
    $usuario = $autenticador->login($email, $senha);

    if ($usuario) {
        Sessao::set('usuario_id', $usuario->getEmail());
        Sessao::set('usuario_nome', $usuario->getNome());

        if (isset($_POST['lembrar_email'])) {
            setcookie('lembrar_email', $email, time() + (86400 * 30), "/");
        } else {
            setcookie('lembrar_email', '', time() - 3600, "/");
        }

        header("Location: dashboard.php");
        exit();
    } else {
        header("Location: login.php?login_falha=1");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

?>