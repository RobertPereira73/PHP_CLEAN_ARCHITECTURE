<?php

namespace CleanArchitecture\Aplicacao\Aluno\MatricularAluno;

use CleanArchitecture\Dominio\Aluno\Aluno;
use CleanArchitecture\Dominio\Aluno\RepositorioAluno;

/**
 * USE CASE / Application Services
 * 
 * Use cases's buscam agrupar logicas de uma determinada acao ou fluxo da aplicacao.
 * Por exemplo matricular alunos, para matricular os alunos e necessario um repositorio para saber 
 * como os dados vao ser persistidos, e ainda um DTO para garantir que os dados necessarios para a matricula
 * vao estar todos presentes. Tendo assim todas as dependencias necessarias para realizar a acao de matricula
 * da aplicacao.
 * A ideia e isolar a logica da aplicacao em uma classe especifica.
 */
class MatricularAluno
{
    public function __construct(
        private RepositorioAluno $repositorioDeAluno
    )
    {}

    public function executa(MatricularAlunoDTO $dadosAluno): void
    {
        $aluno = Aluno::comCPFEmailENome($dadosAluno->cpf, $dadosAluno->email, $dadosAluno->nome);
        $this->repositorioDeAluno->adicionar($aluno);
    }
}