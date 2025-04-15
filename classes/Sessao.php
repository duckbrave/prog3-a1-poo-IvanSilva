<?php


class Sessao {
    public static function iniciar(): void {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set(string $chave, mixed $valor): void {
        $_SESSION[$chave] = $valor;
    }

    public static function get(string $chave): mixed {
        return $_SESSION[$chave] ?? null;
    }

    public static function destruir(): void {
        session_start(); // Ensure session is started before destroying
        session_unset();
        session_destroy();
        // Clear the session cookie as well
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    }
}

?>