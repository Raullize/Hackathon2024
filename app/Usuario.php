<?php
class Usuario {
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $cpf;
    private $telefone;
    private $ajudas = [];

    public function __construct($nome, $email, $senha, $telefone, $cpf) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_BCRYPT);
        $this->telefone = $telefone;
        $this->cpf = $cpf;
        $this->id = uniqid();
    }

    public function validarCPF() {
        $cpf = preg_replace('/\D/', '', $this->cpf);
        return strlen($cpf) === 11;
    }

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
            'id' => $this->id,
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'ajudas' => $this->ajudas
        ];

        $usuarios[] = $usuarioData;

        $jsonData = json_encode($usuarios, JSON_PRETTY_PRINT);
        return file_put_contents('../storage/usuarios.json', $jsonData);
    }

    public function adicionarAjuda($ajuda) {
        $this->ajudas[] = $ajuda;
    }

    public static function autenticar($email, $senha) {
        if (file_exists('../storage/usuarios.json')) {
            $json = file_get_contents('../storage/usuarios.json');
            $usuarios = json_decode($json, true);
    
            foreach ($usuarios as $usuario) {
                if ($usuario['email'] === $email && password_verify($senha, $usuario['senha'])) {
                    // Iniciar a sessão se ainda não estiver iniciada
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
    
                    $_SESSION['usuario'] = [
                        'nome' => $usuario['nome'],
                        'email' => $usuario['email'],
                        'telefone' => $usuario['telefone']
                    ];

                    $_SESSION['usuario']
    
                    return true;
                }
            }
        }
        return false;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getTelefone() {  
        return $this->telefone;
    }

    public function getAjudas() {
        return $this->ajudas;
    }
}
?>