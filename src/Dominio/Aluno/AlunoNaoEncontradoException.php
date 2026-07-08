<?php

namespace CleanArchitecture\Dominio\Aluno;

use CleanArchitecture\Dominio\CPF;
use Override;
use Stringable;
use Throwable;

class AlunoNaoEncontradoException extends \DomainException
{
    public function __construct(CPF $cpf)
    {
        return parent::__construct("Aluno com CPF {$cpf} não encontrado!");
    }
}