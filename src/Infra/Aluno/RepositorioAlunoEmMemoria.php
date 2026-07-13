<?php

namespace CleanArchitecture\Infra\Aluno;

use CleanArchitecture\Dominio\Aluno\{Aluno, AlunoNaoEncontradoException, Telefone};
use CleanArchitecture\Dominio\Aluno\RepositorioAluno;
use CleanArchitecture\Dominio\CPF;

class RepositorioAlunoEmMemoria implements RepositorioAluno
{
    /** @var Aluno[] $alunos */
    private array $alunos = [];

    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCPF(CPF $cpf): Aluno
    {
        $alunosFiltrados = array_filter(
            $this->alunos,
            fn (Aluno $aluno) => $aluno->getCPF() == $cpf
        );

        if (!count($alunosFiltrados)) {
            throw new AlunoNaoEncontradoException($cpf);
        }

        if (count($alunosFiltrados) > 1) {
            throw new \Exception("Foram encontrados alunos com o CPF {$cpf} duplicado!");
        }

        return $alunosFiltrados[0];
    }

    public function buscarTodos(): array
    {
        return $this->alunos;
    }
}