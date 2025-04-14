<?php

/**
 * /classes/Usuario.php
 */
class Usuario {
    private string $nome;
    private string $email;
    private string $senhaHash;

    public function __construct(string $nome, string $email, string $senha) {
        $this->nome = $nome;
        $this->email = $this->sanitizarEmail($email);
        $this->senhaHash = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function verificarSenha(string $senha): bool {
        return password_verify($senha, $this->senhaHash);
    }

    private function sanitizarEmail(string $email): string {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
}

?>