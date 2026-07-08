<?php

namespace CleanArchitecture\Dominio\Aluno;

use CleanArchitecture\Dominio\CPF;

interface RepositorioAluno
{
    public function adicionar(Aluno $aluno): void;

    public function buscarPorCPF(CPF $cpf): Aluno;

    /**
     * @return Aluno[]
     */
    public function buscarTodos(): array;
}