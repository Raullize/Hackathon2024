<?php
class Usuario {
    private $nome;
    private $email;
    private $senha;
    private $cpf;

    // Construtor para inicializar os atributos
    public function __construct($nome, $email, $senha, $cpf) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_BCRYPT); // Criptografa a senha
        $this->cpf = $cpf;
    }

    // Método para validar o CPF (simples, sem validação de dígitos)
    public function validarCPF() {
        $cpf = preg_replace('/\D/', '', $this->cpf);
        return strlen($cpf) === 11;
    }

    // Método para salvar o usuário em um arquivo JSON
    public function salvar() {
        if (!$this->validarCPF()) {
            return false;
        }

        $usuarios = [];
        if (file_exists('../storage/usuarios.json')) {
            $json = file_get_contents('../storage/usuarios.json');
            $usuarios = json_decode($json, true);
        }

        $usuarioData = [
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'cpf' => $this->cpf
        ];
        $usuarios[] = $usuarioData;

        $jsonData = json_encode($usuarios, JSON_PRETTY_PRINT);
        return file_put_contents('../storage/usuarios.json', $jsonData);
    }

    // Método para autenticar o usuário
    public static function autenticar($email, $senha) {
        if (file_exists('../storage/usuarios.json')) {
            $json = file_get_contents('../storage/usuarios.json');
            $usuarios = json_decode($json, true);

            foreach ($usuarios as $usuario) {
                if ($usuario['email'] === $email && password_verify($senha, $usuario['senha'])) {
                    return true;
                }
            }
        }
        return false;
    }

    // Métodos getter para acessar os atributos
    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCpf() {
        return $this->cpf;
    }
}
?>
