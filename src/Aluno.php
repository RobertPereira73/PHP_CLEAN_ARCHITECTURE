<?php

namespace CleanArchitecture;

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

    public function __construct(
        private CPF $cpf,
        private Email $email,
        private string $nome
    )
    {}

    public function addTelefone(string $ddd, string $numero): void
    {
        $this->telefones[] = new Telefone($ddd, $numero);
    }
}