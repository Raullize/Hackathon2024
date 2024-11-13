<?php

class Empresa
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $telefone;
    private $cnpj;
    private $endereco;
    private $queroAjudar;
    private $precisoAjuda;

    public function __construct($nome, $email, $senha, $telefone, $cnpj, $endereco, $queroAjudar, $precisoAjuda)
    {
        $this->id = uniqid(); // Gera um ID único para a empresa
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_BCRYPT);
        $this->telefone = $telefone;
        $this->cnpj = $cnpj;
        $this->endereco = $endereco;
        $this->queroAjudar = $queroAjudar;
        $this->precisoAjuda = $precisoAjuda;
    }

    public function validarCNPJ()
    {
        $cnpj = preg_replace('/\D/', '', $this->cnpj);
        return strlen($cnpj) === 14;
    }

    public function salvar()
    {
        if (!$this->validarCNPJ()) {
            return false;
        }

        $empresas = [];
        if (file_exists('../storage/empresas.json')) {
            $json = file_get_contents('../storage/empresas.json');
            $empresas = json_decode($json, true);
        }

        $empresaData = [
            'id' => $this->id, // Inclui o ID ao salvar
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha,
            'telefone' => $this->telefone,
            'cnpj' => $this->cnpj,
            'endereco' => $this->endereco,
            'queroAjudar' => $this->queroAjudar,
            'precisoAjuda' => $this->precisoAjuda
        ];
        $empresas[] = $empresaData;

        $jsonData = json_encode($empresas, JSON_PRETTY_PRINT);
        return file_put_contents('../storage/empresas.json', $jsonData);
    }
    public static function autenticar($email, $senha)
    {
        if (file_exists('../storage/empresas.json')) {
            $json = file_get_contents('../storage/empresas.json');
            $empresas = json_decode($json, true);

            foreach ($empresas as $empresa) {
                if ($empresa['email'] === $email && password_verify($senha, $empresa['senha'])) {
                    // Inicia a sessão se ainda não estiver iniciada
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    // Atribui a sessão com os dados da empresa, incluindo o ID
                    $_SESSION['empresa'] = [
                        'id' => $empresa['id'],
                        'nome' => $empresa['nome'],
                        'email' => $empresa['email'],
                        'telefone' => $empresa['telefone'],
                        'cnpj' => $empresa['cnpj'],
                        'endereco' => $empresa['endereco']
                    ];

                    // Retorna o array $empresa para confirmação de autenticação bem-sucedida
                    return $empresa;
                }
            }
        }
        return false;  // Se a empresa não foi encontrada ou a senha está incorreta
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }
}
