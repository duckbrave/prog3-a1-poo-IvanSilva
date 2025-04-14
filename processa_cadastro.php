<?php
// /processa_cadastro.php

require_once 'classes/Usuario.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Sessao.php';

Sessao::iniciar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha']; // Não sanitizar a senha aqui

    // Validações básicas
    if (empty($nome) || empty($email) || empty($senha)) {
        die("Todos os campos são obrigatórios.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("E-mail inválido.");
    }

    // Criar uma instância do Autenticador
    $autenticador = new Autenticador();
    // Criar um novo usuário
    $novoUsuario = new Usuario($nome, $email, $senha);
    // Registrar o novo usuário (salvar na sessão)
    $autenticador->registrar($novoUsuario);

    // Redirecionar para a página de login após o cadastro
    header("Location: login.php?cadastro_sucesso=1");
    exit();
} else {
    // Se tentar acessar diretamente este arquivo sem ser por POST
    header("Location: cadastro.php");
    exit();
}

?>