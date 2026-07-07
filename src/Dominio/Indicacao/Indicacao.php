<?php

namespace CleanArchitecture\Dominio\Indicacao;

use CleanArchitecture\Dominio\Aluno\Aluno;

/**
 * ENTIDADE
 * Uma entidade representa um dominio da aplicacao onde se faz necessario a diferenciacao de instancias
 * atraves de uma chave. 
 * 
 */
class Indicacao
{
    private \DateTimeImmutable $data;

    public function __construct(
        private Aluno $indicante,
        private Aluno $indicado
    )
    {
        $this->data = new \DateTimeImmutable();
    }
}