<?php

namespace CleanArchitecture\Dominio\Aluno;

use CleanArchitecture\Dominio\CPF;
use CleanArchitecture\Dominio\Email;

/**
 * ENTIDADE
 * Uma entidade representa um dominio da aplicacao onde se faz necessario a diferenciacao de instancias
 * atraves de uma chave. 
 * 
 * Exemplo:
 * Alunos com o mesmo nome, em uma aplicacao de escola, precisam ser diferenciados pelo CPF.
 */
class Aluno
{
    /** @var Telefone[] */
    private array $telefones = [];

    /**
     * NAMED CONSTRUCTOR
     * Utilizado para facilitar a criacao de objetos
     */
    public static function comCPFEmailENome(string $cpf, string $email, string $nome): self
    {
        $cpf = new CPF($cpf);
        $email = new Email($email);

        return new Aluno($cpf, $email, $nome);
    } 

    public function __construct(
        private CPF $cpf,
        private Email $email,
        private string $nome
    )
    {}

    public function addTelefone(string $ddd, string $numero): self
    {
        $this->telefones[] = new Telefone($ddd, $numero);

        return $this;
    }

    public function getCPF(): string
    {
        return $this->cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return Telefone[]
     */
    public function getTelefones(): array
    {
        return $this->telefones;
    }
}