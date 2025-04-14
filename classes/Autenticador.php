<?php

require_once 'classes/Usuario.php'; // **Certifique-se de que esta linha está aqui**

class Autenticador {
    public function __construct() {
        // Inicializa os usuários da sessão se existirem, senão cria um array vazio
        $_SESSION['usuarios'] = $_SESSION['usuarios'] ?? [];
    }

    public function registrar(Usuario $usuario): void {
        $_SESSION['usuarios'][$usuario->getEmail()] = $usuario;
    }

    public function login(string $email, string $senha): ?Usuario {
        $emailSanitizado = filter_var($email, FILTER_SANITIZE_EMAIL);
        if (isset($_SESSION['usuarios'][$emailSanitizado]) && $_SESSION['usuarios'][$emailSanitizado]->verificarSenha($senha)) {
            return $_SESSION['usuarios'][$emailSanitizado];
        }
        return null;
    }
}

?>