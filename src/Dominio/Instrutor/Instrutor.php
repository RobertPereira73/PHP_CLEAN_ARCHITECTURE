<?php

namespace CleanArchitecture\Dominio\Instrutor;

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
class Instrutor
{
    /**
     * NAMED CONSTRUCTOR
     * Utilizado para facilitar a criacao de objetos
     */
    public static function comCPFEmailENome(string $cpf, string $email, string $nome): self
    {
        $cpf = new CPF($cpf);
        $email = new Email($email);

        return new Instrutor($cpf, $email, $nome);
    } 

    public function __construct(
        private CPF $cpf,
        private Email $email,
        private string $nome
    )
    {}
}