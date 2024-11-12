<?php

class Empresa {
    private $nome;
    private $email;
    private $senha;
    private $cnpj;
    private $queroAjudar;
    private $precisoAjuda;

    public function __construct($nome, $email, $senha, $cnpj, $queroAjudar, $precisoAjuda) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_BCRYPT);
        $this->cnpj = $cnpj;
        $this->queroAjudar = $queroAjudar;
        $this->precisoAjuda = $precisoAjuda;
    }

    public function validarCNPJ() {
        $cnpj = preg_replace('/\D/', '', $this->cnpj);
        return strlen($cnpj) === 14;
    }

    public function salvar() {
        if (!$this->validarCNPJ()) {
            return false;
        }

        $empresas = [];
        if (file_exists('../storage/empresas.json')) {
            $json = file_get_contents('../storage/empresas.json');
            $empresas = json_decode($json, true);
        }

        $empresaData = [
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'cnpj' => $this->cnpj,
            'queroAjudar' => $this->queroAjudar,
            'precisoAjuda' => $this->precisoAjuda
        ];
        $empresas[] = $empresaData;

        $jsonData = json_encode($empresas, JSON_PRETTY_PRINT);
        return file_put_contents('../storage/empresas.json', $jsonData);
    }

    public static function autenticar($email, $senha) {
        if (file_exists('../storage/empresas.json')) {
            $json = file_get_contents('../storage/empresas.json');
            $empresas = json_decode($json, true);

            foreach ($empresas as $empresa) {
                if ($empresa['email'] === $email && password_verify($senha, $empresa['senha'])) {
                    // Inicia a sessão para a empresa autenticada
                    $_SESSION['empresa'] = [
                        'nome' => $empresa['nome'],
                        'email' => $empresa['email'],
                        'cnpj' => $empresa['cnpj']
                    ];
                    return true;
                }
            }
        }
        return false;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCnpj() {
        return $this->cnpj;
    }
}
?>
