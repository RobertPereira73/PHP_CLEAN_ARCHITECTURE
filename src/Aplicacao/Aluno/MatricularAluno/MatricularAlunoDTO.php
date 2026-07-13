<?php

namespace CleanArchitecture\Aplicacao\Aluno\MatricularAluno;

/**
 * DTO
 * 
 * DTO's sao formas de padronizar a entrada de dados para determinado caso de uso.
 * Por exemplo matricular um aluno na plataforma, para realizar tal tarefa e necessario no minimo o CPF, email e nome
 * do aluno. Por isso criamos uma classe MatricularAlunoDTO que vai conter somente os dados necessarios para
 * realizar a acao de Matricula.
 */
class MatricularAlunoDTO
{
    public function __construct(
        public string $cpf,
        public string $email,
        public string $nome
    )
    {}
}